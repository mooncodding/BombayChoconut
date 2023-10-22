<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return [];
    }
    // Monthly Sales Graph
    public function monthlySalesChart(Request $request)
    {
        if (auth()->user()->can('dashboard')) {
            $salesData = [];
            // Get the total sales as per the organization & outlets
            $totalSales = Order::sum('grand_total');
            $salesData['totalSales'] = $totalSales;

            // Get the current year sales
            $currentYearSales = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                DB::raw("(DATE_FORMAT(order_date, '%m')) as month"),
                DB::raw("(DATE_FORMAT(order_date, '%M %Y')) as month_year"),
                DB::raw("(DATE_FORMAT(order_date, '%Y')) as year")
            )
                ->whereYear('order_date', Carbon::now()->format('Y'))
                ->groupBy('month_year')
                ->orderBy('month', 'asc')
                ->get();
            $collectedCurrentYearSales = collect(range(1, 12))->map(
                function ($month) use ($currentYearSales) {
                    $match = $currentYearSales->firstWhere('month', $month);
                    return $match ? $match['sales_total'] : 0;
                }
            );
            $salesData['currentYearSales'] = $collectedCurrentYearSales;

            // Get the last year sales
            $lastYearSales = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                DB::raw("(DATE_FORMAT(order_date, '%m')) as month"),
                DB::raw("(DATE_FORMAT(order_date, '%M %Y')) as month_year"),
                DB::raw("(DATE_FORMAT(order_date, '%Y')) as year")
            )
                ->whereYear('order_date', Carbon::now()->format('Y') - 1)
                ->groupBy('month_year')
                ->orderBy('month', 'asc')
                ->get();

            $collectedLastYearSales = collect(range(1, 12))->map(
                function ($month) use ($lastYearSales) {
                    $match = $lastYearSales->firstWhere('month', $month);
                    return $match ? $match['sales_total'] : 0;
                }
            );
            $salesData['lastYearSales'] = $collectedLastYearSales;

            // Get the all sales
            $allSales = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                DB::raw("(DATE_FORMAT(order_date, '%m')) as month"),
                DB::raw("(DATE_FORMAT(order_date, '%M %Y')) as month_year"),
                DB::raw("(DATE_FORMAT(order_date, '%Y')) as year")
            )
                ->groupBy('month_year')
                ->orderBy('month', 'asc')
                ->get();

            $lastMonthSales = collect($allSales)->where('month', Carbon::now()->subMonth(1)->format('m'))->sum('sales_total');
            
            $currentMonthSales = collect($allSales)->where('month', Carbon::now()->format('m'))->sum('sales_total');
            $salesData['lastMonthSales'] = $lastMonthSales;
            $salesData['currentMonthSales'] = $currentMonthSales;

            $balance = $currentMonthSales - $lastMonthSales;
            if($lastMonthSales < 1)
            {
                $salesData['isMonthlyGrowth'] = false;
                $salesData['monthlyGrowth'] = 0;
            }
            else
            {
                $salesData['isMonthlyGrowth'] = true;
                $salesData['monthlyGrowth'] = ($balance/$lastMonthSales)*100;
            }
            return $salesData;
        }
    }
    //Dashboard summary
    public function dashboardSummary()
    {
        if (auth()->user()->can('dashboard')) {

            $dashboardSummary = [];
            $dashboardSummary['customers'] = User::whereHas('roles', function ($q) {
                $q->where('roles.id', 2);
            })->count();
            $dashboardSummary['systemUsers'] = User::whereHas('roles', function ($q) {
                $q->where('roles.id', 3);
            })->count();
            $dashboardSummary['orders'] = Order::count();
            $dashboardSummary['products'] = Product::count();
            $dashboardSummary['brands'] = Brand::count();
            $dashboardSummary['productCategories'] = ProductCategory::count();
            
            return $dashboardSummary;
        }
    }
    // Sale Amount Summary
    public function saleAmountSummary(Request $request)
    {
        if (auth()->user()->can('dashboard')) {
            $totalSales = Order::sum('grand_total');
                $salesData['totalSales'] = $totalSales;
                // Get the current year sales
                $currentMonthSales = Order::select(
                    DB::raw('sum(grand_total) AS orders_total'),
                    DB::raw("(DATE_FORMAT(orders.order_date, '%m')) as month"),
                )
                    ->whereMonth('order_date', Carbon::now()->format('m'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
                // Get the last year sales
                $lastMonthSales = Order::select(
                    DB::raw('sum(grand_total) AS orders_total'),
                    DB::raw("(DATE_FORMAT(order_date, '%m')) as month"),
                )
                    ->whereMonth('order_date', Carbon::now()->format('m') - 1)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                // Get the all sales
                $allSales = Order::select(
                    DB::raw('sum(grand_total) AS orders_total'),
                    DB::raw("(DATE_FORMAT(order_date, '%m')) as month"),
                )
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                $lastMonthSales = collect($allSales)->where('month', Carbon::now()->subMonth(1)->format('m'))->sum('orders_total');
                
                $currentMonthSales = collect($allSales)->where('month', Carbon::now()->format('m'))->sum('orders_total');
                $salesData['lastMonthSales'] = $lastMonthSales;
                $salesData['currentMonthSales'] = $currentMonthSales;
                $balance = $currentMonthSales - $lastMonthSales;
                if($lastMonthSales < 1)
                {
                    $salesData['isMonthlyGrowth'] = false;
                    $salesData['monthlyGrowth'] = 100;
                }
                else
                {
                    $salesData['isMonthlyGrowth'] = true;
                    $salesData['monthlyGrowth'] = ($balance/$lastMonthSales)*100;
                }
                return $salesData;
        }
    }
    // Sale Payment Amount Summary
    public function salePaymentAmountSummary(Request $request)
    {
        if (auth()->user()->can('dashboard')) {
            $totalSales = OrderPayment::sum('amount');
                $salesData['totalSales'] = $totalSales;
                // Get the current year sales
                $currentMonthSales = OrderPayment::select(
                    DB::raw('sum(amount) AS total_amount'),
                    DB::raw("(DATE_FORMAT(payment_date, '%m')) as month"),
                )
                    ->whereMonth('payment_date', Carbon::now()->format('m'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
                // Get the last year sales
                $lastMonthSales = OrderPayment::select(
                    DB::raw('sum(amount) AS total_amount'),
                    DB::raw("(DATE_FORMAT(payment_date, '%m')) as month"),
                )
                    ->whereMonth('payment_date', Carbon::now()->format('m') - 1)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                // Get the all sales
                $allSales = OrderPayment::select(
                    DB::raw('sum(amount) AS total_amount'),
                    DB::raw("(DATE_FORMAT(payment_date, '%m')) as month"),
                )
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                $lastMonthSales = collect($allSales)->where('month', Carbon::now()->subMonth(1)->format('m'))->sum('total_amount');
                
                $currentMonthSales = collect($allSales)->where('month', Carbon::now()->format('m'))->sum('total_amount');
                $salesData['lastMonthSales'] = $lastMonthSales;
                $salesData['currentMonthSales'] = $currentMonthSales;
                $balance = $currentMonthSales - $lastMonthSales;
                if($lastMonthSales < 1)
                {
                    $salesData['isMonthlyGrowth'] = false;
                    $salesData['monthlyGrowth'] = 100;
                }
                else
                {
                    $salesData['isMonthlyGrowth'] = true;
                    $salesData['monthlyGrowth'] = ($balance/$lastMonthSales)*100;
                }
                return $salesData;
        }
    }
    // Expense Amount Summary
    public function expenseAmountSummary()
    {
        if (auth()->user()->can('dashboard')) {
            $totalExpense = Expense::sum('amount');
                $expensesData['totalExpense'] = $totalExpense;
                // Get the current year sales
                $currentMonthExpenses = Expense::select(
                    DB::raw('sum(amount) AS expense_total'),
                    DB::raw("(DATE_FORMAT(date, '%m')) as month"),
                )
                    ->whereMonth('date', Carbon::now()->format('m'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
                // Get the last year sales
                $lastMonthExpenses = Expense::select(
                    DB::raw('sum(amount) AS expense_total'),
                    DB::raw("(DATE_FORMAT(date, '%m')) as month"),
                )
                    ->whereMonth('date', Carbon::now()->format('m') - 1)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                // Get the all sales
                $allExpenses = Expense::select(
                    DB::raw('sum(amount) AS expense_total'),
                    DB::raw("(DATE_FORMAT(date, '%m')) as month"),
                )
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();

                $lastMonthExpenses = collect($allExpenses)->where('month', Carbon::now()->subMonth(1)->format('m'))->sum('expense_total');
                
                $currentMonthExpenses = collect($allExpenses)->where('month', Carbon::now()->format('m'))->sum('expense_total');
                $expensesData['lastMonthExpenses'] = $lastMonthExpenses;
                $expensesData['currentMonthExpenses'] = $currentMonthExpenses;
                $balance = $currentMonthExpenses - $lastMonthExpenses;
                if($lastMonthExpenses < 1)
                {
                    $expensesData['isMonthlyGrowth'] = false;
                    $expensesData['monthlyGrowth'] = 100;
                }
                else
                {
                    $expensesData['isMonthlyGrowth'] = true;
                    $expensesData['monthlyGrowth'] = ($balance/$lastMonthExpenses)*100;
                }
                return $expensesData;
        }
    }
    // Get Latest Orders
    public function getLatestOrders()
    {
        $latestOrders = Order::with(['customer','orderStatus'])
        ->orderBy('id', 'desc')->take(5)->get();

        return $latestOrders;
    }
    // Quarterly Sale Graph
    public function quarterlySaleGraph(Request $request)
    {
        if (auth()->user()->can('dashboard')) {
            $lastYearQuarters = [];
            $lastYearQuarters['startOfQ1'] = Carbon::now()->subYear()->month(1)->startOfQuarter()->toDateString();
            $lastYearQuarters['endOfQ1'] = Carbon::now()->subYear()->month(1)->endOfQuarter()->toDateString();

            $lastYearQuarters['startOfQ2'] = Carbon::now()->subYear()->month(4)->startOfQuarter()->toDateString();
            $lastYearQuarters['endOfQ2'] = Carbon::now()->subYear()->month(4)->endOfQuarter()->toDateString();

            $lastYearQuarters['startOfQ3'] = Carbon::now()->subYear()->month(7)->startOfQuarter()->toDateString();
            $lastYearQuarters['endOfQ3'] = Carbon::now()->subYear()->month(7)->endOfQuarter()->toDateString();

            $lastYearQuarters['startOfQ4'] = Carbon::now()->subYear()->month(10)->startOfQuarter()->toDateString();
            $lastYearQuarters['endOfQ4'] = Carbon::now()->subYear()->month(10)->endOfQuarter()->toDateString();

            $currentYearQuarters = [];

            $currentYearQuarters['startOfQ1'] = Carbon::now()->month(1)->startOfQuarter()->toDateString();
            $currentYearQuarters['endOfQ1'] = Carbon::now()->month(1)->endOfQuarter()->toDateString();
        
            $currentYearQuarters['startOfQ2'] = Carbon::now()->month(4)->startOfQuarter()->toDateString();
            $currentYearQuarters['endOfQ2'] = Carbon::now()->month(4)->endOfQuarter()->toDateString();

            $currentYearQuarters['startOfQ3'] = Carbon::now()->month(7)->startOfQuarter()->toDateString();
            $currentYearQuarters['endOfQ3'] = Carbon::now()->month(7)->endOfQuarter()->toDateString();

            $currentYearQuarters['startOfQ4'] = Carbon::now()->month(10)->startOfQuarter()->toDateString();
            $currentYearQuarters['endOfQ4'] = Carbon::now()->month(10)->endOfQuarter()->toDateString();

            $lastYear['Q1'] = Order::select(
            DB::raw('sum(grand_total) AS sales_total'),
            )
            ->orderby('id', 'desc')->whereBetween( 'order_date',[ $lastYearQuarters['startOfQ1'], $lastYearQuarters['endOfQ1'] ])
            ->get();

            $lastYear['Q2'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $lastYearQuarters['startOfQ2'], $lastYearQuarters['endOfQ2'] ])
                ->get();

            $lastYear['Q3'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $lastYearQuarters['startOfQ3'], $lastYearQuarters['endOfQ3'] ])
                ->get();

            $lastYear['Q4'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $lastYearQuarters['startOfQ4'], $lastYearQuarters['endOfQ4'] ])
                ->get();

            $currentYear['Q1'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $currentYearQuarters['startOfQ1'], $currentYearQuarters['endOfQ1'] ])
                ->get();

            $currentYear['Q2'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $currentYearQuarters['startOfQ2'], $currentYearQuarters['endOfQ2'] ])
                ->get();

            $currentYear['Q3'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $currentYearQuarters['startOfQ3'], $currentYearQuarters['endOfQ3'] ])
                ->get();

            $currentYear['Q4'] = Order::select(
                DB::raw('sum(grand_total) AS sales_total'),
                )
                ->orderby('id', 'desc')->whereBetween( 'order_date',[ $currentYearQuarters['startOfQ4'], $currentYearQuarters['endOfQ4'] ])
                ->get();

            $saleData['labels'] = [
                Carbon::now()->subYear(1)->format('Y').' '.'Q1',
                Carbon::now()->subYear(1)->format('Y').' '.'Q2',
                Carbon::now()->subYear(1)->format('Y').' '.'Q3',
                Carbon::now()->subYear(1)->format('Y').' '.'Q4',
                Carbon::now()->format('Y').' '.'Q1',
                Carbon::now()->format('Y').' '.'Q2',
                Carbon::now()->format('Y').' '.'Q3',
                Carbon::now()->format('Y').' '.'Q4',
            ];

            $saleData['data'] = [
                $lastYear['Q1'][0]['sales_total'] ? $lastYear['Q1'][0]['sales_total'] : "0",
                $lastYear['Q2'][0]['sales_total'] ? $lastYear['Q2'][0]['sales_total'] : "0",
                $lastYear['Q3'][0]['sales_total'] ? $lastYear['Q3'][0]['sales_total'] : "0",
                $lastYear['Q4'][0]['sales_total'] ? $lastYear['Q4'][0]['sales_total'] : "0",
                $currentYear['Q1'][0]['sales_total'] ? $currentYear['Q1'][0]['sales_total'] : "0",
                $currentYear['Q2'][0]['sales_total'] ? $currentYear['Q2'][0]['sales_total'] : "0",
                $currentYear['Q3'][0]['sales_total'] ? $currentYear['Q3'][0]['sales_total'] : "0",
                $currentYear['Q4'][0]['sales_total'] ? $currentYear['Q4'][0]['sales_total'] : "0",
            ];


            return $saleData;
        }

    }
}