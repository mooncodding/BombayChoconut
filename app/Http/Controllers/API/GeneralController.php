<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\City;
use App\Models\GeneralPushNotification;
use App\Models\HomeSlider;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFlavour;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\User;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Traits\HandleProductDiscountTrait; // Trait
use App\Traits\PushNotification; // Trait
use DateTime;
use Illuminate\Support\Facades\Mail;

class GeneralController extends Controller
{
    use HandleProductDiscountTrait; // Trait
    use PushNotification; // Trait
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

    // Get All Cities
    public function getAllCities()
    {
        $cities = City::all();
        return response()->json($cities, 200);
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
        $childCategories = ProductCategory::whereNotNull('parent_id')->where('is_display_on_home', 1)
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
    // Get All Taxes
    public function getAllTaxes(Request $request)
    {
        $taxes = Tax::all();

        return response()->json($taxes, 200);
    }
    // Get All Units
    public function getAllUnits(Request $request)
    {
        $units = Unit::all();

        return response()->json($units, 200);
    }
    // Get All Brands
    public function getAllBrands(Request $request)
    {
        $brands = Brand::with('products')->get();

        return response()->json($brands, 200);
    }
    // Get  Products By Brand Id
    public function getProductsByBrandId($brand_id)
    {
        $products = Product::where('brand_id',$brand_id)->get();
        foreach($products as $product){
            $product->discount_detail = $this->calculateDiscount($product->id);
        }
        return response()->json($products, 200);
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
    // Get All Products
    public function getAllProducts(Request $request)
    {
        $products = Product::where('is_disabled', 0)->get();
        foreach($products as $product)
        {
            $product->discount_detail = $this->calculateDiscount($product->id);
        }

        return response()->json($products);
    }
    // Get All Payment Methods
    public function getAllPaymentMethods(Request $request)
    {
        $paymentMethods = PaymentMethod::all();

        return response()->json($paymentMethods);
    }
    // Get All Customer
    public function getAllCustomers(Request $request)
    {
        $customers = User::where('is_disabled', 0)->where('approval_status', 'approved')->where('verification_status', 'verified')->whereHas('roles', function ($q) {
            $q->where('roles.id', 2);
        })->get();

        return response()->json($customers);
    }
    // Get All Order Statuses for portal
    public function getAllOrderStatuses(Request $request)
    {
        // change order status condition 
        if ($request->order_status_id) {
            $orderStatuses = OrderStatus::where('id', '>', $request->order_status_id)->get();
        } else {
            $orderStatuses = OrderStatus::all();
        }


        return $orderStatuses;
    }
    // Get Orders By User Id for mobile app
    public  function getOrdersByCustomerId(Request $request, $id)
    {
        return Order::where('customer_id', $id)->with(['orderDetails.product', 'orderStatus', 'paymentMethod'])->orderBy('id', 'desc')->get();
    }
    // Get Product By Id
    public function getProductById(Request $request, $id)
    {
        $product = Product::where('id', $id)->with(['productImages', 'productCategory', 'brand'])->first();
        $product->discount_detail = $this->calculateDiscount($product->id);
        return response()->json($product);
    }
    // Get Order By Customer Id for portal
    public function getOrderByCustomerId(Request $request, $customer_id)
    {
        $orders = Order::where('customer_id', $customer_id)
            ->where('payment_status', '!=', 'paid')
            ->whereHas('orderStatus', function ($q) {
                $q->where('name', '!=', 'Order Cancelled');
            })->get();

        return $orders;
    }
    // Get All Orders
    public function getAllOrders(Request $request)
    {
        $orders = Order::get();

        return $orders;
    }
    // Get Order Payment By Order Id
    public function getOrderPaymentByOrderId(Request $request, $order_id)
    {
        if ($order_id != "") {
            $paidAmount = OrderPayment::where('order_id', $order_id)->orderBy('order_id', 'desc')->get();
            $totalAmount = Order::where('id', $order_id)->get();
            $paymentDetail['paidAmount'] = 0;
            $paymentDetail['orderTotalAmount'] = 0;
            foreach ($paidAmount as $row) {
                $paymentDetail['paidAmount'] += $row->amount;
            }
            foreach ($totalAmount as $row) {
                $paymentDetail['orderTotalAmount'] += $row->grand_total;
            }
            $paymentDetail['remainingBalance'] = $paymentDetail['orderTotalAmount'] - $paymentDetail['paidAmount'];
            return $paymentDetail;
        }
    }
    // Get Orders By Id For Portal
    public  function getOrdersById($id)
    {
        return Order::where('id', $id)->with(['orderDetails.product', 'orderStatus', 'paymentMethod'])->first();
    }

    // Get All Sliders Images for mobile app
    public  function getAllSliderImages()
    {
        return HomeSlider::all();
    }

    public function getAllCategoriesWithChild()
    {
        $productCategories = ProductCategory::with(['children'])->parentCategories()->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'label' => $category->name,
                    'children' => $category->children->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'label' => $category->name,
                            'children' => $category->children,
                        ];
                    })->toArray()
                ];
            })->toArray();

        return response()->json($productCategories, 200);
    }

    public function getAllCategories()
    {
        return ProductCategory::with('categoryProducts')->get();
    }

    public function getProductCategoryById($id)
    {
        return ProductCategory::where('id', $id)->first();
    }

    public function getBestSellingProducts()
    {
        $products = QueryBuilder::for(Product::class)
            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->selectRaw('products.*, COALESCE(sum(order_details.quantity),0) total')
            ->with('productImages')
            ->whereBetween(
                'order_details.created_at',
                [Carbon::now()->subWeek(3)->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )
            ->groupBy('products.id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

            foreach($products as $product)
            {
                $product->discount_detail = $this->calculateDiscount($product->id);
            }

            return $products;
    }

    public function getAllCampaigns()
    {
        return Campaign::get();
    }

    // Post Contact  Form
    public function postContactForm(Request $request)
    {
        // send the email
       $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message_detail' => $request->message,
      );
        Mail::send('email.contactForm', $data ,function ($message) use($request){
            $message->to('a.amjad@thewebsquare.com','')
            ->subject("Centre d'aide" .' - '. $request->subject);
            $message->from('greenline@thewebsquare.com', 'K2');
        });
        return response()->json([
            'message' => 'Email sent successfully'
        ], 200);
    }
    // All Product Categories
    public function allProductCategories(Request $request)
    {
        return ProductCategory::all();
    }

    public function getDiscountedProducts()
    {
        $discountedProducts = [];
        $products = Product::with('productImages')->get();
        foreach($products as $product){
            $discount_detail = $this->calculateDiscount($product->id);
            if($discount_detail['is_eligible_for_discount'] == 1)
            {
                $product->discount_detail = $discount_detail;
                array_push($discountedProducts, $product);
            }
        }
        return $discountedProducts;

    }
    // Push Notification CronJob
    public function pushNotifications(Request $request)
    { 
        //Get After 5 Minutes 
        $afterDateTime = new DateTime('Africa/Nairobi');
        $afterDateTime->modify('+5 minutes');
        $after = $afterDateTime->format('Y-m-d H:i');
        //Get Before 5 Minutes Data 
        $beforeDateTime = new DateTime('Africa/Nairobi');
        $beforeDateTime->modify('-5 minutes');
        $before = $beforeDateTime->format('Y-m-d H:i');
        //Get General Push Notification
        $generalPushNotifications =  GeneralPushNotification::where('flag', 0);
        $generalPushNotifications = $generalPushNotifications->whereBetween('date_time', [$before, $after])
        ->get();
        //Check All Notification Data
        if ($generalPushNotifications->count() > 0) {
            //General Push Notification
            if ($generalPushNotifications->count() > 0) {
                foreach ($generalPushNotifications as  $item) {
                    // Send Push Notification
                    $this->sendPushNotifications($item['title'],$item['content'],'allUsers');
                    //Update The Flag
                    $item->update([
                        'flag' => 1,
                    ]);
                }
            }
        } else {
            return response([
                'message' => "Sorry! There are no Push Notification(s) available to send"
            ]);
        }
        
    }
    // Test Api
    public function testingApi(Request $request)
    { 
        
    }
}
