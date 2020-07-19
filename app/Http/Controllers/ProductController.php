<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ProductController extends Controller
{
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
        //
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

            //Guardar en la carpeta storage (storage/app/users)
            Storage::disk('images')->put($image_path_name, File::get($image_path));

            //nombre de la imagen en el objeto
            $product->cover_img = $image_path_name;
        }
        $product->save();

        return redirect()->route('home');
    }
    //conseguir la imagen
    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
}
