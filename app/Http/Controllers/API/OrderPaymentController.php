<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPaymentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:order_payments']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderPayment::with(['order','customer','paymentMethod','createdBy','updatedBy'])->get();
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
        if (auth()->user()->can('create_order_payment')) {
            $this->validate($request,[
                "order_id"=>"required",
                "customer_id"=>"required",
                "payment_method_id"=>"required",
                "payment_date"=>"required",
                "amount"=>"required",
                "notes"=>"nullable",
            ]);
            $orderPayments = OrderPayment::create([
                'reference' => 'PAYMENT/'.(OrderPayment::max('id')+001).'/'.date('y'),
                'order_id'=>$request->order_id,
                'customer_id'=>$request->customer_id,
                'payment_method_id'=>$request->payment_method_id,
                'payment_date'=> Carbon::parse($request->payment_date)->toDateString(),
                'amount'=> $request->amount,
                'notes'=> $request->notes,
                'created_by'=> Auth::user()->id,
                'created_at'=> Carbon::now(),
            ]);
            // Get Order 
            $order = Order::where('id',$request->order_id)->first();
            // Get all Order Payment for this order
            $orderPayments = OrderPayment::where('order_id',$request->order_id)->sum('amount');
                if ($order->grand_total == $orderPayments) {
                   // update order payment status
                    $order->update([
                        'payment_status'=>'paid',
                    ]);
                } else {
                   // update order payment status
                    $order->update([
                        'payment_status'=>'Partial Paid',
                    ]);
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
        if (auth()->user()->can('update_order_payment')) {
            $orderPayments = OrderPayment::findOrfail($id);
            $this->validate($request,[
                "order_id"=>"required",
                "customer_id"=>"required",
                "payment_method_id"=>"required",
                "payment_date"=>"required",
                "amount"=>"required",
                "notes"=>"nullable",
            ]);
            // update the order date
            if($request->payment_date!=$orderPayments->payment_date){
                $request->merge(['payment_date'=>Carbon::parse($request['payment_date'])->toDateString()]);
            }
            $orderPayments->update([
                'order_id'=>$request->order_id,
                'customer_id'=>$request->customer_id,
                'payment_method_id'=>$request->payment_method_id,
                'payment_date'=> Carbon::parse($request->payment_date)->toDateString(),
                'amount'=> $request->amount,
                'notes'=> $request->notes,
                'updated_by'=> Auth::user()->id,
                'updated_at'=> Carbon::now(),
            ]);
            // Get Order 
            $order = Order::where('id',$request->order_id)->first();
            // Get all Order Payment for this order
            $orderPayments = OrderPayment::where('order_id',$request->order_id)->sum('amount');
                if ($order->grand_total == $orderPayments) {
                   // update order payment status
                    $order->update([
                        'payment_status'=>'paid',
                    ]);
                } else {
                   // update order payment status
                    $order->update([
                        'payment_status'=>'Partial Paid',
                    ]);
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
        if (auth()->user()->can('delete_order_payment')) {
            $orderPayments = OrderPayment::findOrFail($id);
            $orderPayments->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
