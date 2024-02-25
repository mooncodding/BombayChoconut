<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{

    public function index(Request $request)
    {  
        $order = Order::where('reference',$request->reference)->with(['orderDetails','customer'])->first();
        return view('web.tracking')->with('order',$order);
    }

}
