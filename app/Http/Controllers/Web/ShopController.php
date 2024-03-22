<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $productCategory = ProductCategory::with('parentCategory')->get();
        return view('web.shop-1')->with('productCategory',$productCategory);
        
    }

    public function productDetails($categorySlug,$productSlug)
    {
        $category = ProductCategory::where('slug', $categorySlug)->firstOrFail();
        $data = Product::where('slug', $productSlug)->where('product_category_id', $category->id)->firstOrFail();
        
        SEOMeta::setTitle($data->meta_title);
        SEOMeta::setDescription($data->meta_description);
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);

        return view('web.shop-single-rightsidebar',compact('data'));
    }
}
