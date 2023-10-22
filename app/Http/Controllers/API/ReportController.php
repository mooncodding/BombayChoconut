<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\StockAdjustment;
use App\Models\StockAdjustmentDetail;
use App\Models\StockEntryDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    //Customer Report
    public function customerReport(Request $request)
    {
        if (auth()->user()->can("customer_report")) {
            $customers = User::with(['orders','orders.orderDetails','orders.orderPayments','orders.orderStatus'])->whereHas('roles',function($q){
                $q->where('roles.id', 2);
            })->withCount([
                'orders AS total_sales' => function ($query) {
                    $query->select(DB::raw("SUM(grand_total) as grand_total"));
                }
            ])
            ->withCount([
                'orderPayments As total_paid_amount' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as paid_amount"));
                }
            ])->get();
            // Calculate Remaining Amount
            if (count($customers) > 0) {
                foreach ($customers as $data) {
                    $data['remaining_amount'] = $data['total_sales'] - $data['total_paid_amount'];
                }
            }
            return $customers;
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Adjustment Report
    public function stockAdjustmentReport(Request $request)
    {
        if (Auth()->user()->can('stock_adjustment_report')) {
            $query = StockAdjustment::select(
                'stock_adjustments.date',
                DB::raw('COUNT(stock_adjustments.id) AS stock_adjustments')
            );
            // Search via dates
            if (isset($request->from_date) || isset($request->to_date)) {
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date") {
                    $query->whereBetween(DB::raw('DATE(stock_adjustments.date)'), [$request->from_date, $request->to_date]);
                }
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {
                    $query->whereDate(DB::raw('DATE(stock_adjustments.date)'), '>=', $request->from_date);
                }
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {
                    $query->whereDate(DB::raw('DATE(stock_adjustments.date)'), '<=', $request->to_date);
                }
            }
            return $query->groupBy('stock_adjustments.date')->get();
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Adjustment Details
    public function stockAdjustmentDetail(Request $request)
    {
        if (Auth()->user()->can('stock_adjustment_report')) {
            $date = $request->date;
            $query = StockAdjustmentDetail::select(
                'products.name as productName',
                'stock_adjustment_details.product_quantity',
                'stock_adjustment_details.created_at',
                'stock_adjustment_details.type',
                'stock_adjustments.reference',
                'stock_adjustments.date',
                'users.name',
                'units.symbol'
            )->join('stock_adjustments', 'stock_adjustments.id', 'stock_adjustment_details.stock_adjustment_id')
            ->join('products', 'products.id', 'stock_adjustment_details.product_id')
            ->join('units', 'units.id', 'products.unit_id')
            ->join('users', 'users.id', 'stock_adjustments.created_by')
            ->where('stock_adjustments.date', $date);
            
            $query = $query->get();

            return $query;
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Orders Report
    public function ordersReport(Request $request)
    {
        if (auth()->user()->can('orders_report')) {
            // Get the Sale
            $sale = Order::select("orders.order_date", DB::raw("SUM(grand_total) as grand_total"));

            // search via from date and to date
            if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                $sale = $sale->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
            }

            // search via from date
            if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                $sale = $sale->whereDate('order_date', '>=', $request->from_date);
            }

            // search via to date
            if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                $sale = $sale->whereDate('order_date', '<=', $request->to_date);
            }
            
          
            // Group by order date
            $sale = $sale->groupBy(DB::raw("DATE(order_date)"));

            $sale = $sale->orderBy('id', 'desc')->get();

            if (count($sale) > 0) {
                foreach($sale as $index => $order)
                {
                    $newSales = Order::whereDate('order_date', $order->order_date)->with('orderPayments')
                    ->withCount([
                        'orderPayments AS total_amount_paid' => function ($query) {
                            $query->select(DB::raw("SUM(amount) as sale_payment_total"));
                        }
                    ])
                    ->get();
                    $totalAmountPaid = 0;
                    foreach($newSales as $newSale)
                    {
                        if(count($newSale->orderPayments) > 0)
                        {
                            $totalAmountPaid += $newSale->total_amount_paid;
                        }
                    }
                    
                    $sale[$index]->total_amount_paid = $totalAmountPaid;
                    // Calculate Remaining Amount
                    $sale[$index]->remaining_amount = $order['grand_total']-$sale[$index]->total_amount_paid;
                }
            }
            return $sale;
        } else {
            return response()->json("Unauthorized", 401);
        }
        
    }
    // Order Detail Report
    public function orderDetailReport(Request $request)
    {
        if (auth()->user()->can('orders_report')) {
            // Get the Order
            $sale = Order::with(['paymentMethod', 'createdBy', 'customer','orderPayments','orderPayments.customer','orderPayments.paymentMethod','orderStatus'])
            ->whereDate('order_date', $request->order_date);
            // Get Data with Order Payment Amount Paid
            $sale->withCount([
                'orderPayments AS total_amount_paid' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as sale_payment_total"));
                }
            ]);
            
            $sale = $sale->orderBy('id', 'desc')->get();
            return $sale;
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Report
    public function stockReport(Request $request)
    {
        if (auth()->user()->can('stock_report')) {
            $products = Product::all();
            $result = [];
            foreach ($products as $product) {
                $product_id = $product->id;
                $pName = $product->name;
                $stock = $product->stock_quantity;
                //Order
                $orders = OrderDetail::where('product_id', $product_id)->with(['order']);
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
                    })->get();
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {
                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '>=', $request->from_date);
                    })->get();
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '<=', $request->to_date);
                    })->get();
                }
                $orders = $orders->sum('quantity');

                $sold = $orders;

                $available = ($stock - $sold);

                array_push($result,[
                    "id" => $product_id,
                    "product" => $pName,
                    "entry"=>$stock,
                    "sold"=> $sold,
                    "available"=>$available,
                ]);
            }
            return $result;
        }else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Report Old
    public function stockReportCopy(Request $request)
    {
        if (auth()->user()->can('stock_report')) {
            $products = Product::all();
            $result = [];
            foreach ($products as $product) {
                $product_id = $product->id;
                $pName = $product->name;
                //Stock Entry
                $stockEntries = StockEntryDetail::where('product_id', $product_id)->with(['entry']);
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(stock_entry_date)'), [$request->from_date, $request->to_date]);
                    });
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                    $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                        $q->whereDate('stock_entry_date', '>=', $request->from_date);
                    });
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                        $q->whereDate('stock_entry_date', '<=', $request->to_date);
                    });
                }
                $stockEntries = $stockEntries->sum('total_quantity');
                //Order
                $orders = OrderDetail::where('product_id', $product_id)->with(['order']);
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
                    });
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '>=', $request->from_date);
                    });
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '<=', $request->to_date);
                    });
                }
                $orders = $orders->sum('quantity');

                //Adjustments +
                $stockAdjustmentAddition = StockAdjustmentDetail::where(['product_id' => $product_id, 'type' => 1])->with(['stockAdjustment']);
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $stockAdjustmentAddition = $stockAdjustmentAddition->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(date)'), [$request->from_date, $request->to_date]);
                    });
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                    $stockAdjustmentAddition = $stockAdjustmentAddition->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereDate('date', '>=', $request->from_date);
                    });
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $stockAdjustmentAddition = $stockAdjustmentAddition->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereDate('date', '<=', $request->to_date);
                    });
                }
                $stockAdjustmentAddition = $stockAdjustmentAddition->sum('product_quantity');
                //Adjustments
                $stockAdjustmentSubtraction = StockAdjustmentDetail::where(['product_id' => $product_id, 'type' => 0])->with('stockAdjustment');
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $stockAdjustmentSubtraction = $stockAdjustmentSubtraction->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(date)'), [$request->from_date, $request->to_date]);
                    });
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                    $stockAdjustmentSubtraction = $stockAdjustmentSubtraction->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereDate('date', '>=', $request->from_date);
                    });
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $stockAdjustmentSubtraction = $stockAdjustmentSubtraction->whereHas("stockAdjustment",function ($q) use ($request){
                        $q->whereDate('date', '<=', $request->to_date);
                    });
                }
                $stockAdjustmentSubtraction = $stockAdjustmentSubtraction->sum('product_quantity');

                //Return
                if ($orders != 0) {
                    if ($orders > $stockEntries) {
                        $sold = ($orders);
                    }else{
                        $sold = $orders;
                    }
                }else{
                    $sold = $orders;
                }
                if ($stockAdjustmentAddition > 0 ) {
                    $adjustment = (($stockAdjustmentAddition) - ($stockAdjustmentSubtraction));
                }else if ($stockAdjustmentSubtraction > 0){
                    $adjustment = (($stockEntries - $sold - ($stockAdjustmentSubtraction)) + ($stockAdjustmentAddition));
                }else{
                    $adjustment = 0;
                }
                
                $available = (($stockEntries - $sold - ($stockAdjustmentSubtraction)) + ($stockAdjustmentAddition));

                array_push($result,[
                    "id" => $product_id,
                    "product" => $pName,
                    "entry"=>$stockEntries,
                    "sold"=> $sold,
                    "adjustment"=>$adjustment,
                    "available"=>$available,
                ]);
            }
            return $result;
        }else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Detail Report
    public function stockDetailReport(Request $request)
    {
        //Stock Entry
        $stockEntries = StockEntryDetail::where('product_id', $request->product_id)->with(['entry']);
        // search via from date and to date
        if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
            $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                $q->whereBetween(DB::raw('DATE(stock_entry_date)'), [$request->from_date, $request->to_date]);
            });
        }

        // search via from date
        if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

            $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                $q->whereDate('stock_entry_date', '>=', $request->from_date);
            });
        }

        // search via to date
        if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

            $stockEntries = $stockEntries->whereHas("entry",function ($q) use ($request){
                $q->whereDate('stock_entry_date', '<=', $request->to_date);
            });
        }
        
        $stockEntries = $stockEntries->get();
        //Order
        $orders = OrderDetail::where('product_id', $request->product_id)->with(['order']);
        // search via from date and to date
        if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
            $orders = $orders->whereHas("order",function ($q) use ($request){
                $q->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
            });
        }

        // search via from date
        if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

            $orders = $orders->whereHas("order",function ($q) use ($request){
                $q->whereDate('order_date', '>=', $request->from_date);
            });
        }

        // search via to date
        if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

            $orders = $orders->whereHas("order",function ($q) use ($request){
                $q->whereDate('order_date', '<=', $request->to_date);
            });
        }
        $orders = $orders->get();
        //Adjustments
        $stockAdjustments = StockAdjustmentDetail::where('product_id' ,$request->product_id)->with(['stockAdjustment']);
        // search via from date and to date
        if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
            $stockAdjustments = $stockAdjustments->whereHas("stockAdjustment",function ($q) use ($request){
                $q->whereBetween(DB::raw('DATE(date)'), [$request->from_date, $request->to_date]);
            });
        }

        // search via from date
        if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

            $stockAdjustments = $stockAdjustments->whereHas("stockAdjustment",function ($q) use ($request){
                $q->whereDate('date', '>=', $request->from_date);
            });
        }

        // search via to date
        if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

            $stockAdjustments = $stockAdjustments->whereHas("stockAdjustment",function ($q) use ($request){
                $q->whereDate('date', '<=', $request->to_date);
            });
        }
        $stockAdjustments = $stockAdjustments->get();
        
        $result = Arr::collapse([$stockEntries, $orders, $stockAdjustments]);
        // $result = [...$stockEntries, ...$orders, ...$stockAdjustments];
        
        return $result;
    }
}
