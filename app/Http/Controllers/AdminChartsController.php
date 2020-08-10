<?php

namespace App\Http\Controllers;

use App\Advice;
use App\OrderItem;
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
}
