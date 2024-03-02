<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderHistory;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Tax;
use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Traits\HandleReferenceNumberTrait; // Trait
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    use HandleReferenceNumberTrait; // Trait
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'permission:orders']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with(['orderDetails.product','paymentMethod', 'customer', 'orderStatus', 'createdBy', 'updatedBy'])->orderBy('id', 'desc')->get();
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
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);

        $orderSubtotal = 0;
        $user = User::where('email',$request->email)->first();
        if ($user == null) {
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=Hash::make('bombay123');
            $user->photo='profile.png';
            $user->assignRole(4);
            $user->save();
        }
        
        $order =  new Order();
        $order->reference =  'BOMBAY/ORDER/'.(Order::max('id')+001).'/'.date('y');
        $order->customer_id = $user->id;
        $order->bill_no = 'C/BILL/NUMBER/'.(Order::max('id')+001).'/'.date('y');
        $order->order_status_id = 1;
        $order->payment_method_id = $request->payment_method_id;
        $order->payment_status = "unpaid";
        $order->order_date = Carbon::now();
        $order->notes = "testing";
        $order->sub_total = \Cart::getTotal();
        $order->created_by = $user->id;
        $order->created_at = Carbon::now();
        $order->save();
        // Orders details
        if ($order) {
            $cartItems = \Cart::getContent();
            foreach ($cartItems as  $item) {
                // Save Order Detail 
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item->id;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->sale_price = $item->price;
                $orderDetail->weight = $item->weight;
                $orderDetail->sub_total = ($item->quantity * $item->price);
                $orderSubtotal += $orderDetail->sub_total;
                $orderDetail->save();
            }
            $order->sub_total = $orderSubtotal;
            $order->save();
        }
        \Cart::clear();
        return redirect('/thankyou')->with(['data' => $order, 'cart' => $cartItems]);
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
        if (auth()->user()->can('edit_order')) {
            $order = Order::findOrfail($id);
            $this->validate($request, [
                'order_date' => 'required',
                'customer_id' => 'required',
                'order_status_id' => 'required',
                'payment_method_id' => 'required',
                'notes' => 'nullable',
                'order_details.*.product_id' => 'required',
                'order_details.*.quantity' => 'required',
            ]);

            // update the order date
            if ($request->order_date != $order->order_date) {
                $request->merge(['order_date' => Carbon::parse($request['order_date'])->toDateString()]);
            }
            // Declare the variable
            $orderSubtotal = 0;
            $orderDiscount = 0;
            $orderGrandtotal = 0;
            $totalTaxAmount = 0;
            $totalDiscount = 0;

            // update the order
            $order->update([
                'customer_id' => $request->customer_id,
                'order_status_id' => $request->order_status_id,
                'payment_method_id' => $request->payment_method_id,
                'order_date' => Carbon::parse($request->order_date)->toDateString(),
                'notes' => $request->notes,
                'sub_total' => $order->sub_total,
                'discount' => $order->discount,
                'total_product_tax' => $order->total_product_tax,
                'grand_total' => $order->grand_total,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
            // update the Orders details
            if ($order) {
                foreach ($request->order_details as  $data) {
                    // Get product detail
                    $product = Product::where('id', $data['product_id'])->first();
                    // Get tax tax
                    if ($product->is_apply_tax != 0) {
                        $tax = Tax::where('id', $product->tax_id)->first();
                    }
                    $orderDetails =  OrderDetail::where('id', $data['id']);
                    if ($orderDetails->get()->count() > 0) {
                        // Save Order Detail 
                        $orderDetail = [];
                        $orderDetail['order_id'] = $order->id;
                        $orderDetail['product_id'] = $data['product_id'];
                        $orderDetail['quantity'] = $data['quantity'];
                        $orderDetail['price'] = $data['price'];
                        if ($product->is_apply_tax != 0) {
                            $orderDetail['tax_id'] = $product->tax_id;
                            $orderDetail['tax_rate'] = $tax->rate;
                        }
                        // Product base calculation
                        $orderDetail['tax_amount'] = $product->wholesale_tax_amount;
                        $orderDetail['sub_total'] = ($data['quantity'] * $data['price']);
                        $orderDetail['grand_total'] = ($orderDetail['sub_total'] + ($product->wholesale_tax_amount * $data['quantity']));
                        // Order base Calculation
                        $orderSubtotal += $orderDetail['sub_total'];
                        $totalTaxAmount += $orderDetail['tax_amount'] * $data['quantity'];
                        //    return $data['product'];
                        if (isset($data['product']['discount_detail']) && $data['product']['discount_detail']['is_eligible_for_discount'] == 1) {
                            $orderDetail['price_after_discount'] = $data['product']['discount_detail']['sale_price'] ?? 0;
                            $orderDetail['discount_percentage'] = $data['product']['discount_detail']['discount_percentage'] ?? 0;
                            $orderDetail['discount_type'] = $data['product']['discount_detail']['discount_type'] ?? '';
                            $totalDiscount += ($data['price'] - $data['product']['discount_detail']['sale_price']);
                            $orderDetail['discount'] = ($data['price'] - $data['product']['discount_detail']['sale_price']);
                            $orderDetail['grand_total'] = $orderDetail['grand_total'] - (($orderDetail['discount'] * $data['quantity']) ?? 0);
                            $orderDetail['campaign_id'] = $data['product']['discount_detail']['campaign_id'] ?? '';
                            $orderDiscount += ($orderDetail['discount'] * $data['quantity']);
                        } else {
                            $orderDetail['discount'] = 0;
                        }
                        $orderGrandtotal += $orderDetail['grand_total'];
                        // End Calculation
                        $orderDetails->update($orderDetail);
                        // return $data;
                        // End
                    } else {
                        // Save Order Detail 
                        $orderDetail = new OrderDetail();
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $data['product_id'];
                        $orderDetail->quantity = $data['quantity'];
                        $orderDetail->price = $data['price'];
                        if ($product->is_apply_tax != 0) {
                            $orderDetail->tax_id = $product->tax_id;
                            $orderDetail->tax_rate = $tax->rate;
                        }
                        // Product base calculation
                        $orderDetail->tax_amount = $product->wholesale_tax_amount;
                        $orderDetail->sub_total = ($data['quantity'] * $data['price']);
                        $orderDetail->grand_total = ($orderDetail->sub_total + ($product->wholesale_tax_amount * $data['quantity']));
                        // Order base Calculation
                        $orderSubtotal += $orderDetail->sub_total;
                        $totalTaxAmount += $orderDetail->tax_amount * $data['quantity'];
                        if ($data['product']['discount_detail'] && $data['product']['discount_detail']['is_eligible_for_discount'] == 1) {
                            $orderDetail->price_after_discount = $data['product']['discount_detail']['sale_price'] ?? 0;
                            $orderDetail->discount_percentage = $data['product']['discount_detail']['discount_percentage'] ?? 0;
                            $orderDetail->discount_type = $data['product']['discount_detail']['discount_type'] ?? '';
                            $totalDiscount += ($data['price'] - $data['product']['discount_detail']['sale_price']);
                            $orderDetail->discount = ($data['price'] - $data['product']['discount_detail']['sale_price']);
                            $orderDetail->grand_total = $orderDetail->grand_total - (($orderDetail->discount * $data['quantity']) ?? 0);
                            $orderDetail->campaign_id = $data['product']['discount_detail']['campaign_id'] ?? '';
                            $orderDiscount += ($orderDetail->discount * $data['quantity']);
                        } else {
                            $orderDetail->discount = 0;
                        }
                        $orderGrandtotal += $orderDetail->grand_total;
                        // End Calculation
                        $orderDetail->save();
                    }
                }

                // update the order calculation
                $order->update([
                    'discount' => $orderDiscount,
                    'grand_total' => $orderGrandtotal,
                    'sub_total' => $orderSubtotal,
                    'total_product_tax' => $totalTaxAmount,
                ]);
            }

            return response()->json("Record updated successfully", 200);
        } else {
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
        if (auth()->user()->can('delete_order')) {
            $orders = Order::findOrFail($id);
            $orders->orderDetails()->delete();
            $orders->orderHistories()->delete();
            $orders->delete();
            return response()->json("Record deleted successfully", 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    //Remove OrderDetail  
    public function removeOrderDetail($id)
    {
        // delete the OrderDetail  
        $orderDetail = OrderDetail::findOrfail($id);
        $orderDetail->delete();
        return response()->json("Record deleted successfully", 200);
    }
    // Update Order Status
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::where('id', $id)->with(['orderDetails','orderStatus'])->first();
        // Order History
        // $orderHistories = new OrderHistory();
        // $orderHistories->order_id = $order->id;
        // $orderHistories->customer = $order->customer_id;
        // $orderHistories->order_status_id = $request->order_status_id;
        // $orderHistories->order_status_updated_at = Carbon::now();
        // $orderHistories->order_status_updated_by = Auth::user()->id;
        // $orderHistories->save();
        // update order status
        $order->update([
            "order_status_id" => $request->order_status_id,
        ]);
        $user = User::where('id',$order->customer_id)->first();
        if ($user->email !=null) {
            // Current Order Status
            // $currentStatus = OrderStatus::where('id',$request->order_status_id)->first();
           // Send Email for User
            // Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user'=> $user,'order_status_id'=>$request->order_status_id,'order_status'=>$currentStatus,'role'=>'user'],  function ($message) use ($order,$user,$currentStatus) {
            //     $message->to($user->email,'')
            //     ->subject('Update regarding Order No. ' . $order->order_number.' '. $currentStatus->name);
            //     $message->from('bombayweb@hosting.com', 'Bombay');
            // });
        }
        return response()->json("successfully updated order status", 200);
        
    }

    // Store orders from mobile 
    public function storeOrder(Request $request)
    {
        if (auth()->user()->can('create_order')) {
            $this->validate($request, [
                'order_date' => 'required',
                'customer_id' => 'required',
                'order_status_id' => 'required',
                'payment_method_id' => 'required',
                'notes' => 'nullable',
                'order_details.*.product_id' => 'required',
                'order_details.*.quantity' => 'required',
            ]);
            $orderSubtotal = 0;
            $orderDiscount = 0;
            $orderGrandtotal = 0;
            $totalTaxAmount = 0;
            $totalDiscount = 0;

            // Verify the discount details
            foreach ($request->order_details as  $data) {
                $discount_detail = $this->calculateDiscount($data['product_id']);
                    if (($discount_detail && $data['discount_detail'] && $discount_detail->is_eligible_for_discount != $data['discount_detail']['is_eligible_for_discount']) || $discount_detail->sale_price != $data['discount_detail']['sale_price'] || (isset($discount_detail->campaign_id) && isset($data['discount_detail']['campaign_id']) ? $discount_detail->campaign_id != $data['discount_detail']['campaign_id'] : false)) {
                        return response()->json([
                            "en" => "Few discounts are no more available. Please recheck your cart.",
                            "fr" => "Quelques remises ne sont plus disponibles. Veuillez revérifier votre panier.",
                            "mg" => "Vitsy ny fihenam-bidy tsy misy intsony. Avereno jerena ny saretynao azafady.",
                        ], 409);
                    }
            }

            $order =  new Order();
            $order->order_number = $this->generateUniqueReference('order', 'order_number', 100000000, 999999999);
            // check the user login role?
            if (auth()->user()->hasRole('User')) {
                $order->customer_id = Auth::user()->id;
            } else {
                $order->customer_id = $request->customer_id;
            }
            $order->bill_no = $this->generateUniqueReference('order', 'bill_no', 100000000, 999999999);
            $order->order_status_id = 1;
            $order->payment_method_id = $request->payment_method_id;
            $order->order_date = Carbon::parse($request->order_date)->toDateString();
            $order->payment_status = 'unpaid';
            $order->notes = $request->notes;
            $order->sub_total = 0;
            $order->grand_total = 0;
            $order->created_by = Auth::user()->id;
            $order->created_at = Carbon::now();
            $order->save();
            // Orders details
            if ($order) {
                foreach ($request->order_details as  $data) {
                    // Get product detail
                    $product = Product::where('id', $data['product_id'])->first();
                    // Get tax tax
                    if ($product->is_apply_tax != 0) {
                        $tax = Tax::where('id', $product->tax_id)->first();
                    }
                    // Save Order Detail 
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $data['product_id'];
                    $orderDetail->quantity = $data['quantity'];
                    $orderDetail->price = $data['price'];
                    if ($product->is_apply_tax != 0) {
                        $orderDetail->tax_id = $product->tax_id;
                        $orderDetail->tax_rate = $tax->rate;
                    }
                    // Product base calculation
                    $orderDetail->tax_amount = $product->wholesale_tax_amount;
                    $orderDetail->sub_total = ($data['quantity'] * $data['price']);
                    $orderDetail->grand_total = ($orderDetail->sub_total + ($product->wholesale_tax_amount * $data['quantity']));
                    // Order base Calculation
                    $orderSubtotal += $orderDetail->sub_total;
                    $totalTaxAmount += $orderDetail->tax_amount * $data['quantity'];
                    $data['discount_detail'] = $this->calculateDiscount($product->id);
                    if ($data['discount_detail'] && $data['discount_detail']['is_eligible_for_discount'] == 1) {
                        $orderDetail->price_after_discount = $data['discount_detail']['sale_price'] ?? 0;
                        $orderDetail->discount_percentage = $data['discount_detail']['discount_percentage'] ?? 0;
                        $orderDetail->discount_type = $data['discount_detail']['discount_type'] ?? 0;
                        $totalDiscount += ($data['price'] - $data['discount_detail']['sale_price']);
                        $orderDetail->discount = ($data['price'] - $data['discount_detail']['sale_price']);
                        $orderDetail->grand_total = $orderDetail->grand_total - (($orderDetail->discount * $data['quantity']) ?? 0);
                        $orderDetail->campaign_id = $data['discount_detail']['campaign_id'] ?? '';
                        $orderDiscount += ($orderDetail->discount * $data['quantity']);
                    } else {
                        $orderDetail->discount = 0;
                    }
                    $orderGrandtotal += $orderDetail->grand_total;
                    // End Calculation
                    $orderDetail->save();
                }
                $order->discount = $orderDiscount;
                $order->grand_total = $orderGrandtotal;
                $order->sub_total = $orderSubtotal;
                $order->total_product_tax = $totalTaxAmount;
                $order->save();
                // ----------------------------------------------------
                // ------------------Order histories-------------------
                // ----------------------------------------------------
                $orderHistories = new OrderHistory();
                $orderHistories->order_id = $order->id;
                // Check the login User
                if (auth()->user()->hasRole('User')) {
                    $orderHistories->customer =  Auth::user()->id;
                } else {
                    $orderHistories->customer = $request->customer_id;
                }
                $orderHistories->order_status_id = $request->order_status_id;
                $orderHistories->order_status_updated_at = Carbon::now();
                $orderHistories->order_status_updated_by = Auth::user()->id;
                $orderHistories->created_at = Carbon::now();
                $orderHistories->save();
                // Get Settings Emails
                $settings = Setting::first();
                if ($settings->email != null) {
                    $allEmails = explode(', ', $settings->email);
                    // Send Email For Admin's
                    foreach ($allEmails as $data) {
                        Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user' => $order->customer,'order_status_id'=>1,'role'=>'Admin'],  function ($message) use ($order,$data) {
                            $message->to($data,'')
                            ->subject('Order no. ' . $order->order_number.' confirmation');
                            $message->from('greenline@thewebsquare.com', 'K2');
                        }); 
                    }
                } 
                // Send Email for User
                Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user' => $order->customer,'order_status_id'=>1,'role'=>'user'],  function ($message) use ($order) {
                    $message->to(Auth::user()->email,'')
                    ->subject('Order no. ' . $order->order_number.' confirmation');
                    $message->from('greenline@thewebsquare.com', 'K2');
                });
            }

            return response()->json([
                'message' => "Record created successfully",
                'order' => $order,
            ], 200);
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    //Display Order Status History 
    public function orderStatusHistory($id)
    {
        return  OrderHistory::where('order_id',$id)->with(['order','customer','orderStatus','updatedBy'])->get();
    }

    // 
    public function orderHistory(Request $request)
    {
        $orderHistory = Order::where('customer_id',Auth::user()->id)->with(['orderDetails'])->get();

        return view('web.order-history')->with('orderHistory',$orderHistory);
    }
}
