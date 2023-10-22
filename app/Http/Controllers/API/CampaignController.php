<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Models\CategoryDiscount;
use App\Models\ProductDiscount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'permission:campaigns']);
    }

    public function index(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $campaign =  Campaign::with(['categoryDiscounts', 'categoryDiscounts.category', 'productDiscounts', 'productDiscounts.product', 'createdBy', 'updatedBy']);
        //Check if there is any search value
        if ($request->search != "") {
            if ($request->search == 'Dans tout le magasin') {
                $campaign->where('applicable_on','Storewide');
            }else if ($request->search == '	Catégories'){
                $campaign->where('applicable_on','Categories');
            }else if ($request->search == 'Des produits' ){
                $campaign->where('applicable_on','Products');
            }else{
                $campaign->where('name', 'LIKE', '%' . $request->search . '%');
                $campaign->orWhere('start_datetime', 'LIKE', '%' . $request->search . '%');
                $campaign->orWhere('end_datetime', 'LIKE', '%' . $request->search . '%');
                $campaign->orWhere('applicable_on', 'LIKE', '%' . $request->search . '%');
            }
        }
        //Check in any type of sorting
        if ($request->sortBy != "") {
            //If the sorting is not related to Relations
            $campaign = $campaign->orderBy($request->sortBy, ($request->sortDesc == "true") ? "desc" : "asc");
        } else {
            //Default Sorting
            $campaign = $campaign->orderBy("id", "desc");
        }
        //Pagination
        if (isset($request->numRows) && $request->numRows > 0) {
            return $campaign->paginate($request->numRows);
        } else {
            return $campaign->get();
        }
    }

    public function create()
    {
        //
    }

    public function store(CampaignRequest $request)
    {
        if (auth()->user()->can('create_campaign')) {
            $request->merge([
                'start_datetime' => Carbon::parse($request->start_datetime)->toDateTimeString(),
                'end_datetime' => Carbon::parse($request->end_datetime)->toDateTimeString(),
                'created_by' => auth()->user()->id, 'status' => Campaign::UPCOMING]);
            Campaign::create($request->all());
            return response()->json("Record created successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function show(Campaign $campaign)
    {
        //
    }

    public function edit(Campaign $campaign)
    {
        //

    }

    public function update(CampaignRequest $request, $id)
    {
        if (auth()->user()->can('edit_campaign')) {
            $campaigns = Campaign::findOrfail($id);
            $request->merge([
                'start_datetime' => Carbon::parse($request->start_datetime)->toDateTimeString(),
                'end_datetime' => Carbon::parse($request->end_datetime)->toDateTimeString(),
                'updated_by' => auth()->user()->id, 'status' => Campaign::UPCOMING]);
            $campaigns->update($request->all());
            return response()->json("Record updated successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    public function destroy($id)
    {
        //
        if (auth()->user()->can('delete_campaign')) {
            $campaigns = Campaign::findOrFail($id);
            $campaigns->delete();
            return response()->json("Record deleted successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    // Save or update category discount
    public function saveOrUpdateCategoryDiscount(Request $request)
    {
        if (auth()->user()->can('create_campaign') || auth()->user()->can('edit_campaign')) {

            $this->validate($request, [
                'categories' => 'required|array',
                'categories.*.category_id' => 'required',
                'categories.*.type' => 'required',
                'categories.*.discount_price' => 'required_if:categories.*.type,flat',
                'categories.*.discount_percentage' => 'required_if:categories.*.type,percentage',
            ]);

            $ids = [];
            foreach ($request->categories as $category) {
                array_push($ids, $category['id']);
                $discount = CategoryDiscount::where('campaign_id', $category['campaign_id'])
                    ->where('category_id', $category['category_id']);
                if ($discount->get()->count() > 0) {
                    $discount->update([
                        "campaign_id" => $category['campaign_id'],
                        "category_id" => $category['category_id'],
                        "type" => $category['type'],
                        "discount_percentage" => $category['discount_percentage'] ?? 0,
                        "discount_price" => $category['discount_price'] ?? 0,
                        "updated_by" => auth()->user()->id,
                    ]);
                } else {
                    $categoryDiscount = new CategoryDiscount();
                    $categoryDiscount->campaign_id = $category['campaign_id'];
                    $categoryDiscount->category_id  = $category['category_id'];
                    $categoryDiscount->type = $category['type'];
                    $categoryDiscount->discount_percentage  = $category['discount_percentage'] ?? 0;
                    $categoryDiscount->discount_price  = $category['discount_price'] ?? 0;
                    $categoryDiscount->created_by = auth()->user()->id;
                    $categoryDiscount->save();
                    array_push($ids, $categoryDiscount->id);
                }
            }
            $campaign = Campaign::where('id', $request->categories[0]['campaign_id'])->first();
            if ($campaign) {
                $campaign->categoryDiscounts()->whereNotIn('id', $ids)->delete();
            }
            return response()->json("Record updated successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    // Delete category discount
    public function deleteCategoryDiscount($id)
    {
        $categoryDiscount = CategoryDiscount::findOrfail($id);
        $categoryDiscount->delete();
        return response()->json("Record deleted successfully", 200);
    }

    // Save or update product discount
    public function saveOrUpdateProductDiscount(Request $request)
    {
        if (auth()->user()->can('create_campaign') || auth()->user()->can('edit_campaign')) {

            $this->validate($request, [
                'product_discounts' => 'required|array',
                'product_discounts.*.product_id' => 'required',
                'product_discounts.*.type' => 'required',
                'product_discounts.*.before_price' => 'required',
                'product_discounts.*.after_price' => 'required_if:product_discounts.*.type,flat',
                'product_discounts.*.discount_percentage' => 'required_if:product_discounts.*.type,percentage',
            ]);

            $ids = [];
            foreach ($request->product_discounts as $productDiscount) {
                $discount = CategoryDiscount::where('campaign_id', $productDiscount['campaign_id'])
                    ->where('category_id', $productDiscount['product']);
                if ($discount->get()->count() > 0) {
                    $productDiscountDB = [];
                    $productDiscountDB['campaign_id'] = $productDiscount['campaign_id'];
                    $productDiscountDB['product_id']  = $productDiscount['product_id'];
                    $productDiscountDB['type'] = $productDiscount['type'];
                    $productDiscountDB['before_price'] = $productDiscount['before_price'] ?? 0;
                    if ($productDiscount['type'] == 'percentage') {
                        $productDiscountDB['discount_percentage']  = $productDiscount['discount_percentage'] ?? 0;
                        $productDiscountDB['after_price'] = ($productDiscount['before_price'] - ($productDiscount['before_price'] * $productDiscount['discount_percentage'] / 100));
                    }
                    if ($productDiscount['type'] == 'flat') {
                        $productDiscountDB['after_price'] = $productDiscount['after_price'];
                        $productDiscountDB['discount_percentage'] =  (100 - ($productDiscount['after_price'] / $productDiscount['before_price'] * 100));
                    }
                    $productDiscountDB['updated_by'] = auth()->user()->id;
                    $discount->update($productDiscountDB);
                    array_push($ids, $productDiscount['id']);
                } else {
                    $productDiscountDB = new ProductDiscount();
                    $productDiscountDB->campaign_id = $productDiscount['campaign_id'];
                    $productDiscountDB->product_id  = $productDiscount['product_id'];
                    $productDiscountDB->type = $productDiscount['type'];
                    $productDiscountDB->before_price = $productDiscount['before_price'] ?? 0;
                    if ($productDiscount['type'] == 'percentage') {
                        $productDiscountDB->discount_percentage  = $productDiscount['discount_percentage'] ?? 0;
                        $productDiscountDB->after_price = ($productDiscount['before_price'] - ($productDiscount['before_price'] * $productDiscount['discount_percentage'] / 100));
                    }
                    if ($productDiscount['type'] == 'flat') {
                        $productDiscountDB->after_price = $productDiscount['after_price'];
                        $productDiscountDB->discount_percentage =  (100 - ($productDiscount['after_price'] / $productDiscount['before_price'] * 100));
                    }
                    $productDiscountDB->created_by = auth()->user()->id;
                    $productDiscountDB->save();
                    array_push($ids, $productDiscountDB->id);
                }
            }
            $campaign = Campaign::where('id', $request->product_discounts[0]['campaign_id'])->first();
            if ($campaign) {
                $campaign->productDiscounts()->whereNotIn('id', $ids)->delete();
            }
            return response()->json("Record updated successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }

    // Delete product discount
    public function deleteProductDiscount($id)
    {
        $productDiscount = ProductDiscount::findOrfail($id);
        $productDiscount->delete();
        return response()->json("Record deleted successfully", 200);
    }
}
