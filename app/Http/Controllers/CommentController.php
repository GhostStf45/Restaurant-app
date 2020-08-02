<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request)
    {
        //Validacion
        $validate = $this->validate($request, [
            'product_id' => 'integer|required',
             'content' =>'string|required',
             'rating' => 'required|integer'
         ]);

         //Recoger datos

         $user = \Auth::user();


         $product_id = $request->input('product_id');
         $content = $request->input('content');
         $rating = $request->input('rating');
         //Asignar los valores a mi objeto a guardar
         $comment = new Comment();
         $comment->user_id = $user->id;
         $comment->product_id = $product_id;
         $comment->content = $content;
         $comment->rating = (int) $rating;

         //Guarda en la id
         $comment->save();

         Alert::success('Comentario publicado satisfactoriamente !!!');

         //Redireccion
         return redirect()->route('product.detail', ['id' => $product_id]);
    }
    public function delete($id){
        //Conseguir datos del usuario identificado
        $user = \Auth::user();

        //Conseguir objeto del comentario
        $comment = Comment::find($id);

        //Comprobar si soy el dueño del comentario o de la publicacion
        if($user && ($comment->user_id == $user->id || $comment->product->user_id == $user->id)){
            $comment->delete();
            Alert::success('¡Comentario eliminado correctamente!');
            return redirect()->route('product.detail', ['id' => $comment->product->id]);
        }else{
            Alert::warning('Comentario no eliminado correctamente');
            return redirect()->route('product.detail', ['id' => $comment->product->id]);
        }
    }
}
