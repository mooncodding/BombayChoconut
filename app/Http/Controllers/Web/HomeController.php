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
    
        $parentCategories = ProductCategory::parentCategories()->has('categoryProducts')->get();
        $products = Product::with(['productVariants'])->get();
        return view('web.home')->with(['parentCategories'=>$parentCategories,'products'=>$products]);
    }


    public function filterByCategory($id)
    {
        if ($id =='all') {
            // Implement your logic to fetch products based on the selected id
            $products = Product::with(['productVariants'])->get();
        }else{
            $data = ProductCategory::where('parent_id',$id)->get();
            if (count($data) > 0) {
                $categoryId = ProductCategory::where('parent_id',$id)->pluck('id');
            }else{
                $categoryId = ProductCategory::where('id',$id)->pluck('id');
            }
            // Implement your logic to fetch products based on the selected id
            $products = Product::whereIn('product_category_id', $categoryId)->with(['productVariants'])->get();
        }
    
        return response()->json(['products' => $products]);
    }


    public function searchByProduct(Request $request){

        if ($request->category_id !="all") {
            $data = ProductCategory::where('parent_id',$request->category_id)->get();
            if (count($data) > 0) {
                $categoryId = ProductCategory::where('parent_id',$request->category_id)->pluck('id');
            }else{
                $categoryId = ProductCategory::where('id',$request->category_id)->pluck('id');
            }
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->whereIn('product_category_id',$categoryId)->with(['productVariants'])->get();
        }else{
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->with(['productVariants'])->get();
        }
        return view('web.searchByProduct')->with(['products'=>$products, 'searchValue'=>$request->name]);        
    }
}
