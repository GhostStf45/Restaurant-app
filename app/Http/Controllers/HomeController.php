<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $allPromotions = Promotion::limit(3)->get();
        return view('home')->with('allPromotions', $allPromotions);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
