<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;
use App\Models\ProductCategory;
use App\Models\ProductFlavour;

class GeneralController extends Controller
{
    // get all permissions
    public function getAllPermissions(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $permission = Permission::whereNotNull('name');
        //Check if there is any search value
        if ($request->search != "") {
            $permission->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('label', 'LIKE', '%' . $request->search . '%')
                ->orWhere('french_label', 'LIKE', '%' . $request->search . '%');
        }
        //Check in any type of sorting
        if ($request->sortBy != "") {
            //If the sorting is not related to Relations
            $permission = $permission->orderBy($request->sortBy, ($request->sortDesc == "true") ? "desc" : "asc");
        } else {
            //Default Sorting
            $permission = $permission->orderBy("id", "asc");
        }
        //Pagination
        if (isset($request->numRows) && $request->numRows > 0) {
            return $permission->paginate($request->numRows);
        } else {
            return $permission->get();
        }
    }

    //  get all roles
    public function getAllRoles(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $role = Role::with('permissions')->where('id', '!=', 1)->where('id', '!=', 2);
        //Check if there is any search value
        if ($request->search != "") {
            $role->where('name', 'LIKE', '%' . $request->search . '%');
        }
        //Check in any type of sorting
        if ($request->sortBy != "") {
            //If the sorting is not related to Relations
            $role = $role->orderBy($request->sortBy, ($request->sortDesc == "true") ? "desc" : "asc");
        } else {
            //Default Sorting
            $role = $role->orderBy("id", "desc");
        }
        //Pagination
        if (isset($request->numRows) && $request->numRows > 0) {
            return $role->paginate($request->numRows);
        } else {
            return $role->get();
        }
    }

    //    Get Settings Data
    public function getSetting(Request $request)
    {
        //
        return Setting::first();
    }
    //    Get Product Categories Data
    public function getCategories(Request $request)
    {
        //
        return ProductCategory::all();
    }
    //    Get Product Flavours Data
    public function getProductFlavours(Request $request)
    {
        //
        return ProductFlavour::all();
    }
    //    Get Brands Data
    public function getBrands(Request $request)
    {
        //
        return Brand::all();
    }

    // Get All Parent Categories
    public function getAllParentCategories()
    {
        $parentCategories = ProductCategory::parentCategories()->get();

        return response()->json($parentCategories, 200);
    }
    // Get All Child Categories for mobile app
    public function getAllChildCategories()
    {
        $childCategories = ProductCategory::whereNotNull('parent_id')
            ->with(['categoryProducts.productImages'])->get();

        foreach($childCategories as $category){
            foreach($category->categoryProducts as $product){
                $discount_detail = $this->calculateDiscount($product->id);
                $product->discount_detail = $discount_detail;
            };
        }

        return response()->json($childCategories, 200);
    }

    // Get All Product Categories
    public function getAllProductCategories()
    {
        $productCategories = ProductCategory::with(['childCategories'])->parentCategories()->get();

        return response()->json($productCategories, 200);
    }
    // Get Chid Categories via Parent For portal
    public function getChildCategories(Request $request)
    {
        if ($request->parent_id) {
            $parentCategories = ProductCategory::where('parent_id', $request->parent_id)->get();

            return response()->json($parentCategories, 200);
        } else {
            return response()->json('Something Went Wrong', 401);
        }
    }
}
