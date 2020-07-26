<?php

namespace App\Http\Controllers;

use App\Drink;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $search =null)
    {

        $search = $request->input('search');

        if(!empty($search))
        {
            //buscar el nombre de la bebida
            $drinks = Drink::where('name', 'LIKE', '%'.$search.'%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
        }
        else
        {
            //ordenar listado de bebidas por el mas reciente
        $drinks = Drink::orderBy('created_at', 'desc')->paginate(8);
        }
        return view('drinks.index', ['allDrinks'=>$drinks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('drinks.create');
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
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image'

        ], [
            'name.required' => 'El nombre de la bebida es obligatoria',
            'price.required' => 'El precio es obligatorio',
            'quantity.required' => 'La cantidad es obligatoria',
            'description.required' => 'La descripción es obligatoria'
        ]);

         //conseguir datos del formulario
         $name = $request->input('name');
         $price =(int) $request->input('price');
         $quantity = (int) $request->input('quantity');
         $description = $request->input('description');

         if($price <= 0 || $quantity <=0)
         {
             $price = 2;
             $quantity = 1;
         }

         $drink = new Drink();

         //vincular a la base de datos
        $drink->name = $name;
        $drink->price = (int) $price;
        $drink->quantity = (int) $quantity;
        $drink->description = $description;

        //subir archivo
        $image_path = $request->file('image');
        if($image_path)
        {
            // Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            //Guardar en la carpeta storage (storage/app/images)
            Storage::disk('drink_images')->put($image_path_name, File::get($image_path));

            //nombre de la imagen en el objeto
            $drink->cover_img = $image_path_name;
        }

        $drink->save();

        Alert::success('Bebida creada correctamente');

        return redirect()->route('drink.index');


    }
     //conseguir la imagen
     public function getImage($filename){
        $file = Storage::disk('drink_images')->get($filename);
        return new Response($file, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
