<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::parentCategories();
        // searching
        if (asset($request->search) && $request->search !=null && !empty($request->search)) {
            $categories->where( 'name', 'LIKE', '%' . $request->search . '%');
        }
        $categories = $categories->get();
        return view('web.category')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // Get Category By Products
    public function getCategoryByProduct($category_id)
    {
        $data = ProductCategory::where('parent_id',$category_id)->get();
        if (count($data) > 0) {
            $categoryId = ProductCategory::where('parent_id',$category_id)->pluck('id');
        }else{
            $categoryId = ProductCategory::where('id',$category_id)->pluck('id');
        }
        $category = ProductCategory::whereIn('id',$categoryId)->with(['categoryProducts'])->first();
        return view('web.categoryByProducts')->with('category', $category);
    }
}
