<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    // Home Page 
    public function index()
    {
    
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);

        $parentCategories = ProductCategory::parentCategories()->has('categoryProducts')->get();
        $products = Product::with(['productVariants','productCategory'])->get();
        return view('web.home')->with(['parentCategories'=>$parentCategories,'products'=>$products]);
    }


    public function filterByCategory($id)
    {
        if ($id =='all') {
            // Implement your logic to fetch products based on the selected id
            $products = Product::with(['productVariants','productCategory'])->get();
        }else{
            $data = ProductCategory::where('parent_id',$id)->get();
            if (count($data) > 0) {
                $categoryId = ProductCategory::where('parent_id',$id)->pluck('id');
            }else{
                $categoryId = ProductCategory::where('id',$id)->pluck('id');
            }
            // Implement your logic to fetch products based on the selected id
            $products = Product::whereIn('product_category_id', $categoryId)->with(['productVariants','productCategory'])->get();
        }
    
        return response()->json(['products' => $products]);
    }


    public function searchByProduct(Request $request)
    {

        if ($request->category_id !="all") {
            $data = ProductCategory::where('parent_id',$request->category_id)->get();
            if (count($data) > 0) {
                $categoryId = ProductCategory::where('parent_id',$request->category_id)->pluck('id');
            }else{
                $categoryId = ProductCategory::where('id',$request->category_id)->pluck('id');
            }
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->whereIn('product_category_id',$categoryId)->with(['productVariants','productCategory'])->get();
        }else{
            $products = Product::where('title','LIKE', '%' . $request->name . '%')->with(['productVariants','productCategory'])->get();
        }
        return view('web.searchByProduct')->with(['products'=>$products, 'searchValue'=>$request->name]);        
    }

    // Set API 
    public function fetchDataFromApi()
    {
        $url = 'http://137.59.226.195:8085/myapi/locationwiseproductinventory';

        try {
            $response = Http::get($url);

            // You can handle the response as needed
            $data = $response->json();

            foreach ($data[0]['locationWiseProductInventoryDetail'] as $key => $value) {
                ProductVariant::where('bar_code',$value['ProductBarcode'])->update([
                    'quantity' => $value['LocationStock'],
                    'sale_price' => $value['ProductSalePrice']
                ]);
            }

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
