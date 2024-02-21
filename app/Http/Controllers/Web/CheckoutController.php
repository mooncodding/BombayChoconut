<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   public function index(Request $request)
   {
        $cartItems = \Cart::getContent();
        return view('web.checkout', compact('cartItems'));
   }
}
