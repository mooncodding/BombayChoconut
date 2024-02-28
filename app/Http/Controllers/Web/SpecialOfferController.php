<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function index()
    {
        $parentCategories = ProductCategory::parentCategories()->has('categoryProducts')->get();
        return view('web.specialoffers')->with('parentCategories',$parentCategories);
    }
}
