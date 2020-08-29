<?php

namespace App\Http\Controllers;

use App\Advice;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminChartsController extends Controller
{
    //
    public function index()
    {
        return view('admin_charts.read');
    }
    public function MoreFrencuently(Request $request)
    {
            $advice_filter = Advice::select('advice_type')
                        ->selectRaw('COUNT(*) AS count')
                    ->groupBy('advice_type')
                    ->orderByDesc('count')
                    ->limit(2)
                    ->get();
        return response()->json($advice_filter);

    }
    public function MoreFrencuentlyDish(Request $request){
        $dish_filter = DB::table('order_items')
                        ->selectRaw("products.name, COUNT('order_items.*') AS order_productCount")
                        ->join('products', 'products.id', '=', 'order_items.product_id')
                        ->groupBy('products.name')
                        ->orderBy('order_productCount', 'desc')
                        ->take(2)
                        ->get();
        return response()->json($dish_filter);

    }
    public function MoreFrencuentlyDistrict()
    {
        $districts = Order::select('shipping_district')
                      ->selectRaw('COUNT(*) AS count')
                    ->groupBy('shipping_district')
                    ->orderByDesc('count')
                    ->limit(5)
                    ->get();
        return response()->json($districts);
    }
    public function MoreFrencuentlyDays()
    {
      $orders=  Order::
                groupBy('created_at')
                ->select(DB::raw(
                    'created_at,
                    DAYNAME(created_at) AS week_day, // this function gives the same as formatting
                    WEEKDAY(created_at) as day,
                    COUNT(*) AS count'
                ))->orderBy('count', 'DESC')
                ->get()
                ->unique('week_day')->sortBy('day');
        return response()->json($orders);
    }
    public function last7DaysCreatedAtAdviceData(Request $request)
    {
        $advices = Advice::select([
            // This aggregates the data and makes available a 'count' attribute
            DB::raw('count(id) as `count`'),
            // This throws away the timestamp portion of the date
            'advice_type'
          // Group these records according to that day
          ])->groupBy('advice_type')
          // And restrict these results to only those created in the last week
          ->where('created_at', '>=', Carbon::now()->subWeeks(1))
          ->get()
      ;
      return response()->json($advices);
    }
}
