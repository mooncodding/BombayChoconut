<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $productCategory = ProductCategory::with('parentCategory')->get();
        return view('web.shop-1')->with('productCategory',$productCategory);
        
    }
}
