<?php

use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\GeneralController;
use App\Http\Controllers\API\PaymentMethodController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TaxController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\ExpenseController;
use App\Http\Controllers\API\GeneralPushNotificationController;
use App\Http\Controllers\API\HomeSliderController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderPaymentController;
use App\Http\Controllers\API\OrderStatusController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\StockAdjustmentController;
use App\Http\Controllers\API\StockEntryController;
use App\Http\Controllers\API\SystemUserController;
use App\Http\Controllers\API\ProductFlavourController;
use App\Models\StockAdjustment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//***********************************************************************************
//****************************Forgot Password Routes*********************************
//***********************************************************************************
Route::post('/verify/code', [UserAuthController::class, 'verifyCode']);
Route::post('/forgot/password', [UserAuthController::class, 'sendPasswordResetToken']);
Route::post('/reset/password', [UserAuthController::class, 'resetPassword']);
//***********************************************************************************
//**********************Application login and register routes************************
//***********************************************************************************
// Public Auth Routes
Route::post('/customerRegister', [UserAuthController::class, 'customerRegister']);
Route::post('/updateProfile', [UserAuthController::class, 'updateProfile']);
Route::post('/login', [UserAuthController::class, 'login']);
//***********************************************************************************
//***************************General Controller Routes*******************************
//***********************************************************************************
// Get All Permissions
Route::get('/getAllPermissions', [GeneralController::class, 'getAllPermissions']);
// Get All Roles
Route::get('/getAllRoles', [GeneralController::class, 'getAllRoles']);
// Get Settings Data
Route::get('/getSetting', [GeneralController::class, 'getSetting']);
// Get All Cities
Route::get('/getAllCities', [GeneralController::class, 'getAllCities']);
// Get All ParentCategories
Route::get('/getAllParentCategories', [GeneralController::class, 'getAllParentCategories']);
// Get All ProductCategories
Route::get('/getAllProductCategories', [GeneralController::class, 'getAllProductCategories']);
// Get All Taxes
Route::get('/getAllTaxes', [GeneralController::class, 'getAllTaxes']);
// Get All Units
Route::get('/getAllUnits', [GeneralController::class, 'getAllUnits']);
// Get All Brands
Route::get('/getAllBrands', [GeneralController::class, 'getAllBrands']);
// Get Child Categories
Route::get('/getChildCategories', [GeneralController::class, 'getChildCategories']);
// Get All Products
Route::get('/getAllProducts', [GeneralController::class, 'getAllProducts']);
// Get All Payment Methods
Route::get('/getAllPaymentMethods', [GeneralController::class, 'getAllPaymentMethods']);
// Get All Child Categories
Route::get('/getAllChildCategories', [GeneralController::class, 'getAllChildCategories']);
// Get All Customers
Route::get('/getAllCustomers', [GeneralController::class, 'getAllCustomers']);
// Get All Statuses
Route::get('/getAllOrderStatuses', [GeneralController::class, 'getAllOrderStatuses']);
// Get All Customers
Route::get('/getOrdersByCustomerId/{id}', [GeneralController::class, 'getOrdersByCustomerId']);
// Get Product By Id
Route::get('/getProductById/{id}', [GeneralController::class, 'getProductById']);
// Get order By Customer Id
Route::get('/getOrderByCustomerId/{customer_id}', [GeneralController::class, 'getOrderByCustomerId']);
// Get All orders
Route::get('/getAllOrders', [GeneralController::class, 'getAllOrders']);
// Get Product By Id
Route::get('/getOrderPaymentByOrderId/{order_id}', [GeneralController::class, 'getOrderPaymentByOrderId']);
// Get Order By Id
Route::get('/getOrdersById/{id}', [GeneralController::class, 'getOrdersById']);
// Get All Slider Images
Route::get('/getAllSliderImages', [GeneralController::class, 'getAllSliderImages']);
// Get All Categories
Route::get('/getAllCategoriesWithChild', [GeneralController::class, 'getAllCategoriesWithChild']);
// Get product category by id
Route::get('/getProductCategoryById/{id}', [GeneralController::class, 'getProductCategoryById']);
// Get all categories
Route::get('/getAllCategories', [GeneralController::class, 'getAllCategories']);
// Get best selling products
Route::get('/getBestSellingProducts', [GeneralController::class, 'getBestSellingProducts']);
// Get all campaigns
Route::get('/getAllCampaigns', [GeneralController::class, 'getAllCampaigns']);
// Post Contact Form
Route::post('/postContactForm', [GeneralController::class, 'postContactForm']);
// All Product Categories
Route::get('/allProductCategories', [GeneralController::class, 'allProductCategories']);
// All Products By Id
Route::get('/getProductsByBrandId/{brand_id}', [GeneralController::class, 'getProductsByBrandId']);
// All discounted products
Route::get('/getDiscountedProducts', [GeneralController::class, 'getDiscountedProducts']);
// General Push Notification api cronjob
Route::get('/pushNotifications', [GeneralController::class, 'pushNotifications']);
// Testing Api
Route::get('/testingApi', [GeneralController::class, 'testingApi']);
// Get Categories
Route::get('/getCategories', [GeneralController::class, 'getCategories']);
// Get Product Flavours
Route::get('/getProductFlavours', [GeneralController::class, 'getProductFlavours']);

// All Sanctum Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //***********************************************************************************
    //**********************************Resource Routes**********************************
    //***********************************************************************************
    Route::apiResources(['users' => UserController::class]);
    Route::apiResources(['productFlavours' => ProductFlavourController::class]);
    Route::apiResources(['systemUsers' => SystemUserController::class]);
    Route::apiResources(['customers' => CustomerController::class]);
    Route::apiResources(['roles' => RoleController::class]);
    Route::apiResources(['permissions' => PermissionController::class]);
    Route::apiResources(['settings' => SettingController::class]);
    Route::apiResources(['profiles' => ProfileController::class]);
    Route::apiResources(['productCategories' => ProductCategoryController::class]);
    Route::apiResources(['units' => UnitController::class]);
    Route::apiResources(['taxes' => TaxController::class]);
    Route::apiResources(['products' => ProductController::class]);
    Route::apiResources(['paymentMethods' => PaymentMethodController::class]);
    Route::apiResources(['expenses' => ExpenseController::class]);
    Route::apiResources(['orders' => OrderController::class]);
    Route::apiResources(['orderStatuses' => OrderStatusController::class]);
    Route::apiResources(['cities' => CityController::class]);
    Route::apiResources(['brands' => BrandController::class]);
    Route::apiResources(['homeSliders' => HomeSliderController::class]);
    Route::apiResources(['stockEntries' => StockEntryController::class]);
    Route::apiResources(['stockAdjustments' => StockAdjustmentController::class]);
    Route::apiResources(['orderPayments' => OrderPaymentController::class]);
    Route::apiResources(['campaigns' => CampaignController::class]);
    Route::apiResources(['generalPushNotifications' => GeneralPushNotificationController::class]);
    //Delete Product Images
    Route::delete('/removeProductImages/{id}', [ProductController::class, 'removeProductImages']);
    //Product Views Route
    Route::post('/productViews', [ProductController::class, 'productViews']);
    //Product Search Api For Mobile App
    Route::get('/productSearch', [ProductController::class, 'productSearch']);
    //Delete Order Detail
    Route::delete('/removeOrderDetail/{id}', [OrderController::class, 'removeOrderDetail']);
    //Delete Stock Detail
    Route::delete('/removeStockEntryDetail/{id}', [StockEntryController::class, 'removeStockEntryDetail']);
    //Delete Stock Detail
    Route::delete('/removeStockAdjustmentDetail/{id}', [StockAdjustmentController::class, 'removeStockAdjustmentDetail']);
    //Delete Stock Detail
    Route::delete('/deleteCategoryDiscount/{id}', [CampaignController::class, 'deleteCategoryDiscount']);
    //Save or update category discount
    Route::post('/saveOrUpdateCategoryDiscount', [CampaignController::class, 'saveOrUpdateCategoryDiscount']);
    //Update Order Status
    Route::post('/updateOrderStatus/{id}', [OrderController::class, 'updateOrderStatus']);
    //Save or update product discount
    Route::post('/saveOrUpdateProductDiscount', [CampaignController::class, 'saveOrUpdateProductDiscount']);
    //Save or update product discount
    Route::post('/storeOrder', [OrderController::class, 'storeOrder']);
    //Delete product discount
    Route::delete('/deleteProductDiscount/{id}', [CampaignController::class, 'deleteProductDiscount']);
    //Order Status History 
    Route::get('/orderStatusHistory/{id}', [OrderController::class, 'orderStatusHistory']);
    // Import Excel File
    Route::post('/import',[ProductController::class,'import']);
    //***********************************************************************************
    //***************************** Dashboard Screen Routes *****************************
    //***********************************************************************************
    //Get Monthly sale charts
    Route::get('/monthlySalesChart', [DashboardController::class, 'monthlySalesChart']);
    //Get Quarterly sale charts
    Route::get('/quarterlySaleGraph', [DashboardController::class, 'quarterlySaleGraph']);
    // Dashboard Summary
    Route::get('/dashboard', [DashboardController::class, 'dashboardSummary']);
    // Sale Amount Summary
    Route::get('/saleAmountSummary', [DashboardController::class, 'saleAmountSummary']);
    // Sale Payment Amount Summary
    Route::get('/salePaymentAmountSummary', [DashboardController::class, 'salePaymentAmountSummary']);
    // Expense Amount Summary
    Route::get('/expenseAmountSummary', [DashboardController::class, 'expenseAmountSummary']);
    // Get Latest Orders
    Route::get('/getLatestOrders', [DashboardController::class, 'getLatestOrders']);
    //***********************************************************************************
    //******************************Report Controller Routes*****************************
    //***********************************************************************************
    // Customer Report
    Route::get('/customerReport', [ReportController::class, 'customerReport']);
    // Stock Adjustment Report
    Route::get('/stockAdjustmentReport', [ReportController::class, 'stockAdjustmentReport']);
    // Stock Adjustment Detail 
    Route::get('/stockAdjustmentDetail', [ReportController::class, 'stockAdjustmentDetail']);
    // Orders Report
    Route::get('/ordersReport', [ReportController::class, 'ordersReport']);
    // Order Detail Report
    Route::get('/orderDetailReport', [ReportController::class, 'orderDetailReport']);
    // Order Payment Detail Report
    Route::get('/orderPaymentDetailReport', [ReportController::class, 'orderPaymentDetailReport']);
    // Stock Report
    Route::get('/stockReport', [ReportController::class, 'stockReport']);
    // Stock Detail Report
    Route::get('/stockDetailReport', [ReportController::class, 'stockDetailReport']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
