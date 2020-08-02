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
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $advice->user_id = $user->id;
        $advice->advice_type = $advice_checked;
        $advice->description = $message;

        if($user)
        {
            if($name != $user->name)
            {
                $message = array(
                    'message' => 'Este nombre no existe.'
                );
                return redirect()->route('advice.create')->with($message);
            }
            if($last_name != $user->last_name)
            {
                $message = array(
                    'message' => 'Este apellido no existe.'
                );
                return redirect()->route('advice.create')->with($message);
            }
            if($email != $user->email)
            {
                $message = array(
                    'message' => 'Este email no existe.'
                );
                return redirect()->route('advice.create')->with($message);
            }
            if($advice_checked != 'Queja' && $advice_checked != 'Recomendación')
            {
                $message = array(
                    'message' => 'Tipo de mensaje no valido.'
                );
                return redirect()->route('advice.create')->with($message);
            }
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
