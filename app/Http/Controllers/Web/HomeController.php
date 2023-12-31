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


    public function searchByProduct(Request $request){

        if ($request->category_id !="all") {
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->where('product_category_id',$request->category_id)->with(['productVariants'])->get();
        }else{
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->with(['productVariants'])->get();
        }
        return view('web.searchByProduct')->with('products',$products);        
    }
}
