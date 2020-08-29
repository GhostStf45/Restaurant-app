<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(Request $request, $select = null)
    {
        $category = new Category();
        $product = new Product();
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        $select = $request->input('tipo_producto');
        $orderByDateAndAlphabeth= $request->input('ordenar_alfabetica_dia');
        //vincular la bd
        $category->name = $select;

        $avg = $product->comments()->avg('rating');

        if(isset($select))
        {
            $products = Product::select('products.*')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.name', $select)
            ->paginate(8);
        }
       if($orderByDateAndAlphabeth == 'Platos añadidos recientemente.')
        {
            $products = Product::orderBy('created_at', 'desc')->paginate(6);
        }
       if($orderByDateAndAlphabeth == 'A-Z')
        {
            $products = Product::orderBy('name', 'ASC')->paginate(6);
        }
        if($orderByDateAndAlphabeth == 'Ordenar por precio mayor-menor')
        {
            $products = Product::orderBy('price', 'ASC')->paginate(6);
        }

        return view('products.index', ['allProducts'=> $products, 'allCategories'=>$categories, 'select' => $select, 'avg' => $avg]);
    }
    public function create()
    {

        $categories = Category::all();
        return view('products.create', ['allCategories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image'

        ], [
            'name.required' => 'El nombre del producto es obligatorio',
            'category.required' => 'La categoría es obligatoria',
            'price.required' => 'El precio es obligatorio',
            'quantity.required' => 'La cantidad es obligatoria',
            'description.required' => 'La descripción es obligatoria'
        ]);
        //conseguir datos del formulario
        $name = $request->input('name');
        $category_name = $request->input('category');
         $price =(int) $request->input('price');
        $quantity = (int) $request->input('quantity');
        $description = $request->input('description');




        if($price <= 0 || $quantity <=0)
        {
            $price = 2;
            $quantity = 1;
        }

        $product = new Product();
        //vincular a la base de datos
        $product->name = $name;
        $product->category_id = (int) $category_name;
        $product->price = (int) $price;
        $product->quantity = (int) $quantity;
        $product->description = $description;

        //subir archivo
        $image_path = $request->file('image');
        if($image_path)
        {
            // Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            //Guardar en la carpeta storage (storage/app/images)
            Storage::disk('images')->put($image_path_name, File::get($image_path));

            //nombre de la imagen en el objeto
            $product->cover_img = $image_path_name;
        }

        $product->save();

        Nexmo::message()->send([
            'to'   => '51'.'969384222',
            'from' => '51969384222',
            'text' => 'Hay un nuevo plato que usted debe probar '.$name.' Atentamente: Mikuy'
        ]);

        Alert::success('Producto creado correctamente');

        return redirect()->route('home');
    }
    //conseguir la imagen
    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        $avg = $product->comments()->avg('rating');
        return view('products.detail', ['product'=> $product, 'avg' => $avg]);
    }
}
