<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Home Page 
    public function index()
    {
    
        $parentCategories = ProductCategory::parentCategories()->get();
        $products = Product::with(['productVariants'])->get();
        return view('web.home')->with(['parentCategories'=>$parentCategories,'products'=>$products]);
    }


    public function filterByCategory($id)
    {
        if ($id =='all') {
            // Implement your logic to fetch products based on the selected id
            $products = Product::with(['productVariants'])->get();
        }else{
            // Implement your logic to fetch products based on the selected id
            $products = Product::where('product_category_id', $id)->with(['productVariants'])->get();
        }
    
        return response()->json(['products' => $products]);
    }
}
