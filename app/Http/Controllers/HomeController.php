<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $select = null)
    {
        $category = new Category();
        $product = new Product();




        $categories = Category::all();
        $products = Product::take(20)->paginate(8);
        $select = $request->input('tipo_producto');
        $orderByDateAndAlphabeth= $request->input('ordenar_alfabetica_dia');
        //vincular la bd
        $category->name = $select;

        if(isset($select))
        {
            $products = Product::select('products.*')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', $select)
            ->paginate(8);
        }
       if($orderByDateAndAlphabeth == 'Platos añadidos recientemente.')
        {
            $products = Product::orderBy('created_at', 'desc')->paginate(8);
        }
        if($orderByDateAndAlphabeth == 'A-Z')
        {
            $products = Product::orderBy('name', 'ASC')->paginate(8);
        }
        if($orderByDateAndAlphabeth == 'Ordenar por precio mayor-menor')
        {
            $products = Product::orderBy('price', 'ASC')->paginate(8);
        }
        return view('home', ['allProducts'=> $products, 'allCategories'=>$categories, 'select' => $select]);
    }
}
