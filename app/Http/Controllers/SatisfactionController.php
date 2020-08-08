<?php

namespace App\Http\Controllers;

use App\Satisfaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SatisfactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('satisfaction.create');
    }
    public function save (Request $request)
    {
        $user= Auth::user();
        $request->validate([
            'type_satisfaction' => 'required',
            'comment' => 'required'
        ]);
        $type_satisfaction = $request->input('type_satisfaction');
        $comment = $request->input('comment');

        $satisfaction = new Satisfaction();
        $satisfaction->user_id = $user->id;
        $satisfaction->type_satisfaction = $type_satisfaction;
        $satisfaction->comment = $comment;
        $satisfaction->save();
        Alert::success('Su formulario se envio correctamente');
        return redirect()->route('satisfaction.create');

    }
}
