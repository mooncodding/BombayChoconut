<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
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
        
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);
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
    public function getCategoryByProduct($slug)
    {
        // $data = ProductCategory::where('parent_id',$category_id)->get();
        // if (count($data) > 0) {
        //     $categoryId = ProductCategory::where('parent_id',$category_id)->pluck('id');
        // }else{
        //     dd(3);
        //     $categoryId = ProductCategory::where('id',$category_id)->pluck('id');
        // }
        $category = ProductCategory::where('slug',$slug)->with(['categoryProducts'])->first();
            

        if ($category) {
            SEOMeta::setTitle($category->meta_title);
            SEOMeta::setDescription($category->meta_description);
            $currentUrl = url()->current();
            SEOMeta::setCanonical($currentUrl);
            
            return view('web.categoryByProducts')->with('category', $category);
        }
        
    }
}
