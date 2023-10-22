<?php

namespace App\Traits;

use App\Models\Campaign;
use App\Models\CategoryDiscount;
use App\Models\Product;
use App\Models\ProductDiscount;
use Carbon\Carbon;

trait HandleProductDiscountTrait
{
    
    public function calculateDiscount($productId)
    {
        // Calculate if product has the storewide discount
        $campaign = Campaign::where('start_datetime', '<=', Carbon::now()->toDateTimeString())
            ->where('end_datetime', '>=', Carbon::now()->toDateTimeString())
        ->where('applicable_on', Campaign::STOREWIDE)->orderBy('id', 'DESC')->first();
        $product = Product::where('id', $productId)->first();
        if($campaign)
        {
            $salePrice = 0;
            $discountPercentage = 0;
            $discountPrice = 0;
            if($campaign->discount_type == 'percentage')
            {
                $salePrice = ($product->wholesale_price * (100 - ($campaign->discount_value ?? 0))) / 100;
                $discountPercentage = $campaign->discount_value;
                $discountPrice = $product->wholesale_price - $salePrice;
            }
            if($campaign->discount_type == 'flat')
            {
                $salePrice = $product->wholesale_price - ($campaign->discount_value ?? 0);
                $discountPercentage = ($campaign->discount_value / $product->wholesale_price) * 100;
                $discountPrice = $campaign->discount_value ?? 0;
            }

            return [
                "is_eligible_for_discount" => 1,
                "sale_price" => $salePrice,
                "discount_percentage" => $discountPercentage,
                "discount_price" => $discountPrice,
                "discount_type" => $campaign->discount_type,
                "applicable_on" => $campaign->applicable_on,
                "campaign" => $campaign,
                "campaign_id" => $campaign->id,
            ];
        }
        // else check for another discounts
        else{
            $productDiscount = $this->calculateProductDiscount($productId);
            $categoryDiscount = $this->calculateCategoryDiscount($productId);
            if ($productDiscount->is_eligible_for_discount == 1 && $categoryDiscount->is_eligible_for_discount == 1) {
                if ($productDiscount->campaign->created_at > $categoryDiscount->campaign->created_at) {
                    return $productDiscount;
                } else {
                    return $categoryDiscount;
                }
            }
            else if($productDiscount->is_eligible_for_discount == 1)
            {
                return $productDiscount;
            }
            else if($categoryDiscount->is_eligible_for_discount == 1)
            {
                return $categoryDiscount;
            }
            else{
                return $productDiscount;
            }
        }
        
    }

    // This function will verify the product level discount of the given product
    public function calculateProductDiscount($productId)
    {
        $discount_detail = new ProductDiscount();
        $product = Product::where('id', $productId)->first();
        $productDiscount = ProductDiscount::whereHas('campaign', function ($query) {
            // $query->whereRaw('(now() between start_datetime and end_datetime)');
            $query->where('start_datetime', '<=', Carbon::now()->toDateTimeString())
            ->where('end_datetime', '>=', Carbon::now()->toDateTimeString());
        })->where('product_id', $productId)
            ->with('campaign')
            ->orderBy(
                Campaign::select('id')
                    ->whereColumn('id', 'product_discounts.campaign_id')
                    ->orderByDesc('id')
                    ->limit(1),
                "desc"
            )->first();

        if ($productDiscount) {
            if ($productDiscount->type == 'flat') {
                $productDiscount->sale_price = $productDiscount->after_price ?? 0;
                $productDiscount->discount_price = $productDiscount->before_price - $productDiscount->sale_price;
            }
            if ($productDiscount->type == 'percentage') {
                $productDiscount->discount_percentage = number_format(($productDiscount->discount_percentage ?? 0), 2);
                $productDiscount->sale_price = ($productDiscount->before_price - ($productDiscount->before_price * $productDiscount->discount_percentage / 100));
                $productDiscount->discount_price = $productDiscount->before_price - $productDiscount->sale_price;
                
            }
            $discount_detail = $productDiscount ?? '';
            $discount_detail->is_eligible_for_discount = 1;
            $discount_detail->discount_type = $productDiscount->type ?? '';
            $discount_detail->applicable_on = 'products';
        } else {
            $discount_detail->is_eligible_for_discount = 0;
            $discount_detail->sale_price = $product->wholesale_price ?? 0;
            $discount_detail->discount_percentage = 0;
            $discount_detail->discount_price = 0;
            $discount_detail->discount_type = null;
            $discount_detail->applicable_on = null;
        }
        return $discount_detail;
    }

    // This function will calculate the category level discount of the given product
    public function calculateCategoryDiscount($productId)
    {
        $discount_detail = new CategoryDiscount();
        $product = Product::where('id', $productId)->first();
        $productCategoryDiscountIds = [];
        $categoryDiscounts = CategoryDiscount::with('campaign', 'category', 'category.children');
        $allCategoryDiscounts = $categoryDiscounts->get();
        foreach ($allCategoryDiscounts as $categoryDiscount) {
            $qualified = $this->isDiscountedProduct($categoryDiscount->category, $product);
            if ($qualified == true) {
                array_push($productCategoryDiscountIds, $categoryDiscount->id);
            }
        }
        $categoryDiscount = $categoryDiscounts->whereIn('id', $productCategoryDiscountIds)
            ->whereHas('campaign', function ($query) {
                // $query->whereRaw('(now() between start_datetime and end_datetime)');
                $query->where('start_datetime', '<=', Carbon::now()->toDateTimeString())
                ->where('end_datetime', '>=', Carbon::now()->toDateTimeString());
            })->orderBy(
                Campaign::select('id')
                    ->whereColumn('id', 'category_discounts.campaign_id')
                    ->orderByDesc('id')
                    ->limit(1),
                "desc"
            )->first();
        if ($categoryDiscount) {
            if ($categoryDiscount->type == 'flat') {
                $categoryDiscount->sale_price = ($product->wholesale_price - $categoryDiscount->discount_price) ?? 0;
                $categoryDiscount->discount_percentage = ($categoryDiscount->discount_price / $product->wholesale_price) * 100;
            }
            if ($categoryDiscount->type == 'percentage') {
                $categoryDiscount->sale_price = ($product->wholesale_price - ($product->wholesale_price * $categoryDiscount->discount_percentage / 100));
                $categoryDiscount->discount_price = $product->wholesale_price - $categoryDiscount->sale_price;  
            }
            $discount_detail = $categoryDiscount ?? '';
            $discount_detail->is_eligible_for_discount = 1;
            $discount_detail->discount_type = $categoryDiscount->type ?? '';
            $discount_detail->applicable_on = 'categories';
        } else {
            $discount_detail->is_eligible_for_discount = 0;
            $discount_detail->sale_price = $product->wholesale_price ?? 0;
            $discount_detail->discount_percentage = 0;
            $discount_detail->discount_price = 0;
            $discount_detail->discount_type = null;
            $discount_detail->applicable_on = null;
        }
        return $discount_detail;
    }

    // This function will check if the product contain in any category
    public function isDiscountedProduct($category, $product)
    {
        $all_ids = $this->allChildCategories($category);
        return in_array($product->category_id, $all_ids) ? true : false;
    }

    // This function will place the all the nested child categories at the root
    // Recursive function to find all the nested / super nested child
    public function allChildCategories($category)
    {
        $all_ids = [];
        array_push($all_ids, $category->id);
        if ($category->children->count() > 0) {
            foreach ($category->children as $child) {
                $all_ids[] = $child->id;
                // If more child then recall the function
                $all_ids = array_merge($all_ids, is_array($this->allChildCategories($child)) ? $this->allChildCategories($child) : []);
            }
        }
        return $all_ids;
    }
}