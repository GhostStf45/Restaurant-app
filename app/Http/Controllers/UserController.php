<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
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
        $user = \Auth::user();
        if($user->state == 'suspended')
        {
            toast('Su cuenta se encuentra suspendida temporalmente');
        }
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
            'phone_primary' => 'required|integer|min:100000000|max:999999999',
        ],[
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'address_primary.required' => 'La direccion primaria es obligatoria',
            'phone_primary.min' => 'El numero de celular tiene que tener al menos 9 digitos',
            'phone_primary.max' => 'El numero de celular tiene que tener como maximo 9 digitos'
        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $address_primary = $request->input('address_primary');
        $address_secondary = $request->input('address_secondary');
        $phone_primary = (int) $request->input('phone_primary');


        //Asignar valores al objeto de usuario
        $user->name = $name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->address_primary = $address_primary;
        $user->address_secondary = $address_secondary;
        $user->phone_primary = (int) $phone_primary;

        $user->update();

        Alert::success('Perfil actualizado correctamente.');

        return redirect()->route('profile');
    }
    public function createCard(Request $request)
    {
        $user = \Auth::user();

        $validate = $this->validate($request,[
             'card_type'=>'required',
             'card_name_value' => 'required',
             'card_number' => 'required|integer|min:1000000000000000|max:min:9999999999999999',
             'expiredDate' => 'required|date',
             'card_cvc' => 'required|integer|min:100|max:999'
        ], [
            'card_number.min'  => 'El numero de tarjeta tiene que tener al menos 16 digitos',
            'expiredDate.date' => 'La fecha de expiracion no tiene el formato correcto. Tiene que ser Año/Mes',
            'card_cvc.min' => 'El cvc tiene que tener 3 digitos',
            'card_cvc.max' => 'El cvc tiene como maximo 3 digitos',
        ]);



         //Recoger datos del formulario
        $card_type = $request->input('card_type');
        $card_name_value = $request->input('card_name_value');
        $card_number = (int) $request->input('card_number');
        $expiredDate = $request->input('expiredDate');
        $parseDateExpired = Carbon::parse($expiredDate)->format('Y-m-d');
        $card_cvc = $request->input('card_cvc');





        //Asignar valores al objeto de usuario
        $user->card_type = $card_type;
        $user->card_name = $card_name_value;
        $user->card_number = (int) $card_number;
        $user->card_date_expired = $parseDateExpired;
        $user->card_cv = $card_cvc;

        if( $card_name_value != 'Visa' && $card_name_value != 'MasterCard' )
        {
            Alert::warning('No existe la tarjeta', $card_name_value);
            return redirect()->route('profile');
        }

        $user->update();
        Alert::success('¡Tarjeta validada correctamente!');
        return redirect()->route('profile');

        //return response()->json($user,200);
    }
    public function suspendAccount()
    {
        $user = \Auth::user();
        $user->state = 'suspended';

        $user->update();
        Alert::warning('Cuenta suspendida');

        return redirect()->route('home');
    }
    public function activateAccount()
    {
        $user = \Auth::user();
        $user->state = 'activated';

        $user->update();
        Alert::success('Cuenta Activada');

        return redirect()->route('profile');
    }
}
