<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    //autenticacion
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function config()
    {
        return view('user.profile');
    }
    //actualizar usuario
    public function update(Request $request)
    {
        //conseguir el usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        //Validacion del formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'last_name' =>'required|string|max:255',
            'email' => 'required|email',
            'address_primary' => 'required|max:255',
            'phone_primary' => 'required',
        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $address_primary = $request->input('address_primary');
        $address_secondary = $request->input('address_secondary');
        $phone_primary = $request->input('phone_primary');


        //Asignar valores al objeto de usuario
        $user->name = $name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->address_primary = $address_primary;
        $user->address_secondary = $address_secondary;
        $user->phone_primary = $phone_primary;

        $user->update();

        Alert::success('Perfil actualizado correctamente.');

        return redirect()->route('profile');
    }
    public function createCard(Request $request)
    {

    }
}
