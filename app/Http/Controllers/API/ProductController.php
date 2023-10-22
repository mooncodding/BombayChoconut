<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\ImportProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductView;
use App\Models\Tax;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HandleProductDiscountTrait;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use HandleProductDiscountTrait;
    public function __construct(){
        $this->middleware(['auth', 'permission:products']);
    }

    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $product=Product::with(['createdBy', 'updatedBy','productCategory'=>function($query) use ($request) {
            if($request->sortBy=="product_categories.name"){
              $query->orderBy('name', ($request->sortDesc=="true")?"desc":"asc");
            }
          }, 'productCategory', 'productFlavour','productImages']);
        
        //Check if there is any search value
        if($request->search!=""){
            if ($request->search == "No" || $request->search == "Non") {
                $product->where('is_disabled',0);
            }
            else if ($request->search == "Yes" || $request->search == "Oui") {
                $product->where('is_disabled',1);
            }
            else
            {
                $product->where(function($query) use($request) {
                    $query->where( 'title', 'LIKE', '%' . $request->search . '%' )
                    ->orWhere('code', 'LIKE', '%' . $request->search . '%' )
                    ->orWhere('price_1', 'LIKE', '%' . $request->search . '%' )
                    ->orWhereHas('productCategory', function($query) use ($request){
                        $query->where('name', 'LIKE', '%' . $request->search . '%'  );
                    });
                });
            }
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            if ($request->sortBy != "product_category.name") {
                $product=$product->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
            }
        }else{
            //Default Sorting
            $product=$product->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $product->paginate($request->numRows);
        }else{
            return $product->get();
        }
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
        if(auth()->user()->can('create_product')){
            $this->validate($request, [
                'title' => 'required|string|max:64',
                'description' => 'required|string',
                'price_1'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:64',
                'product_category_id' => 'required',
                'product_flavour_id' => 'required',
                'code' => 'required',
                'photo'=>'required',
                'image'=>'nullable'
            ]);
            // Featured Image Work
            if($request['photo']){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                \Image::make($request->photo)->save(public_path('images/product-images/'.$name));
            }else{
                $name= null;
            } 
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price_1 = $request->price_1;
            $product->price_2 = $request->price_1;
            $product->price_3 = $request->price_1;
            $product->is_disabled = $request->is_disabled;
            $product->product_category_id = $request->product_category_id;
            $product->product_flavour_id = $request->product_flavour_id;
            $product->code = $request->code;
            $product->photo = $name;
            $product->created_by = Auth::user()->id;
            $product->created_at = Carbon::now();
            $product->save();
            if (isset($request->image) && $request->image !="") {
                $images = $request->image;
                foreach($images as $index => $image) {
                    $name=$index.time().'.'.explode('/', explode(':', substr($image['path'],0,strpos($image['path'], ';')))[1])[1];
                    \Image::make($image['path'])->save(public_path('images/product-images/'.$name));
                    $productImage= new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $name;
                    $productImage->save();
                }
            }
            return response()->json("Record created successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
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
        if(auth()->user()->can('edit_product')){
            $product = Product::findOrfail($id);
                $this->validate($request, [
                    'title' => 'required|string|max:64',
                    'description' => 'required|string',
                    'price_1'=>'required|regex:/^\d+(\.\d{1,2})?$/|max:64',
                    'product_category_id' => 'required',
                    'product_flavour_id' => 'required',
                    'code' => 'required',
                    'photo'=>'required',
                    'image'=>'nullable'
                ]);
            // Update the featured image
            if($request['photo']!=$product->photo){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                $publicPath=public_path('images/product-images/'.$name);
                \Image::make($request->photo)->save($publicPath);
                if((file_exists(public_path('images/product-images/'.$product->photo)))){
                    @unlink(public_path('images/product-images/'.$product->photo));
                }
                $request->merge(['photo'=>$name]);
            }
            else {
                 $name = $product->photo;
            }

            $product->update([
                "title" => $request->title,
                "description" => $request->description,
                "photo" => $name,
                "price_1" => $request->price_1,
                "is_disabled" => $request->is_disabled,
                "product_category_id" => $request->product_category_id,
                "product_flavour_id" => $request->product_flavour_id,
                "code" => $request->code,
                'updated_by' => Auth::user()->id,
            ]);

            // Product Image update work
            if (count($request->image_copy) > 0){
                $images = $request->image_copy;
                foreach($images as $index => $image) {
                    $name=$index.time().'.'.explode('/', explode(':', substr($image['path'],0,strpos($image['path'], ';')))[1])[1];
                    \Image::make($image['path'])->save(public_path('images/product-images/'.$name));
                    $productImage= new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $name;
                    $productImage->save();
                }
            }

            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_product')){
            $product = Product::findOrFail($id);
            $productImages = ProductImage::where('product_id',$id)->get();
            // Product images deleted
            foreach ($productImages as $key => $value) {
                if((file_exists(public_path('images/products-images/'.$value['image'])))){
                    @unlink(public_path('images/products-images/'.$value['image']));
                }
            }
            $product->productImages()->delete();
            $product->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
    //Remove Product Images 
    public function removeProductImages($id)
    {
        // delete the Product Images 
        $file = ProductImage::findOrfail($id);
        $file->delete();
        return response()->json("Record deleted successfully", 200);
    }
    // Product views
    public function productViews(Request $request)
    {
        if(auth()->user()->can('products')){
            $product = Product::where('id',$request->product_id)->first();
            if ($product) {
                $productView = new ProductView();
                $productView->product_id = $request->product_id;
                $productView->customer_id = Auth::user()->id;
                $productView->view_date_time = Carbon::now();
                $productView->save();

                return response([
                    'message'=>'Views Has been updated successfully'
                ]);
            }else{
                return response([
                    'message'=>'Something Went Wrong'
                ]);
            }
        }else{
            return response()->json("Unauthorized", 401);
          }
    }
    // Search Api For Mobile app
    public function productSearch(Request $request)
    {
        if($request->search !=""){
            // Declare a global variable with relation orders!
            $product=Product::with(['createdBy', 'updatedBy', 'productCategory.parentCategory', 'unit','brand', 'tax','productImages']);
            // Check if there is any search value
            $product->where(function($query) use($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%' )
                ->orWhere('name_mg', 'LIKE', '%' . $request->search . '%' )
                ->orWhereHas('productCategory', function($query) use ($request){
                    $query->where('name', 'LIKE', '%' . $request->search . '%'  )
                    ->orWhere('name_mg', 'LIKE', '%' . $request->search . '%'  );
                })
                ->orWhereHas('brand', function($query) use ($request){
                    $query->where('name', 'LIKE', '%' . $request->search . '%'  );
                });
            });
            // Get the products
            $products = $product->get();

            foreach($products as $product)
            {
                $product->discount_detail = $this->calculateDiscount($product->id);
            }

            return $products;
        }
    }
    public function import(Request $request)
    {
        $this->validate($request,[
            "excel_file"=>"required|mimes:xls,xlsx",
        ]);
        
        Excel::import(new ImportProduct,
        $request->file('excel_file')->store('files'));

        return response()->json('Record Updated Successfully'); 
    }
}
