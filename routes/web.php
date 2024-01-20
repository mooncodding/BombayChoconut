<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/products/filter/{category}', [HomeController::class, 'filterByCategory']);
Route::get('/searchByProduct', [HomeController::class, 'searchByProduct'])->name('searchByProduct');
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/404', function () {
    return view('web.404');
});
Route::get('/about-us', function () {
    return view('web.about-us');
});
Route::get('/account-information', function () {
    return view('web.account-information');
});
Route::get('/address-book', function () {
    return view('web.address-book');
});
Route::get('/blog-rightsidebar', function () {
    return view('web.blog-rightsidebar');
});
Route::get('/blog-single-fullwidth', function () {
    return view('web.blog-single-fullwidth');
});
Route::get('/blog-single-rightsidebar', function () {
    return view('web.blog-single-rightsidebar');
});
Route::get('/blog-single', function () {
    return view('web.blog-single');
});
Route::get('/blog', function () {
    return view('web.blog');
});
Route::get('/checkout', function () {
    return view('web.checkout');
});
Route::get('/cng-pw', function () {
    return view('web.cng-pw');
});
Route::get('/coming-soon', function () {
    return view('web.coming-soon');
});
Route::get('/contact', function () {
    return view('web.contact');
});
Route::get('/forgot-password', function () {
    return view('web.forgot-password');
});
Route::get('/login', function () {
    return view('web.login');
});
Route::get('/my-account', function () {
    return view('web.my-account');
});
Route::get('/myaccount-leftsidebar', function () {
    return view('web.myaccount-leftsidebar');
});
Route::get('/newsletter', function () {
    return view('web.newsletter');
});
Route::get('/order-history', function () {
    return view('web.order-history');
});
Route::get('/return', function () {
    return view('web.return');
});
Route::get('/review-rating', function () {
    return view('web.review-rating');
});
Route::get('/shop-1', function () {
    return view('web.shop-1');
});
Route::get('/shop-2', function () {
    return view('web.shop-2');
});
Route::get('/shop-rightsidebar-2', function () {
    return view('web.shop-rightsidebar-2');
});
Route::get('/shop-single-fullwidth', function () {
    return view('web.shop-single-fullwidth');
});
Route::get('/shop-single-rightsidebar', function () {
    return view('web.shop-single-rightsidebar');
});
Route::get('/shop-single', function () {
    return view('web.shop-single');
});
Route::get('/giftbundle', function () {
    return view('web.giftbundle');
});
Route::get('/specialoffers', function () {
    return view('web.specialoffers');
});
Route::get('/thankyou', function () {
    return view('web.thankyou');
});
Route::get('/tracking', function () {
    return view('web.tracking');
});
Route::get('/wishlist', function () {
    return view('web.wishlist');
});
Route::get('/wishlist-product', function () {
    return view('web.wishlist-product');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/orders/store', [OrderController::class, 'store'])->name('order.store');
Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('language/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/email', [App\Http\Controllers\HomeController::class, 'email'])->name('email');
Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '([A-z\d\-\/_.]+)?');

