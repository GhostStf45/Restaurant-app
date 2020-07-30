<?php

namespace App\Http\Controllers;

use App\Advice;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdviceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createAdvice()
    {
        return view('contact.create');
    }
    public function saveAdvice(Request $request)
    {
        $user = \Auth::user();
        $validate = $this->validate($request,[
            'name'=>'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'advice_checked' => 'required|string',
            'message' => 'required'
        ]);
        $advice_checked = $request->input('advice_checked');
        $message = $request->input('message');
        $advice = new Advice();
        $advice->user_id = $user->id;
        $advice->advice_type = $advice_checked;
        $advice->description = $message;

        if($user)
        {
            $advice->save();
            Alert::success('Mensaje enviado correctamente');
            return redirect()->route('advice.create');
        }
        else{
            Alert::danger('El mensaje no fue enviado, porfavor registrese para completar el envio');
            return redirect()->route('advice.create');
        }


    }
}
