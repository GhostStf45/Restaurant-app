@extends('layouts.app')

@section('content')
<div class="container bg-white mt-4 p-4 radius-small">
    <h2>Pedido</h2>
    <h3>Informacion de compra</h3>

<form action="{{route('orders.store')}}" method="post">
    @csrf
        <div class="form-group">
          <label for="shipping_fullname">Nombre completo</label>
        <input type="text" class="form-control" name="shipping_fullname" id="" aria-describedby="helpId" value="{{Auth::user()->name." ".Auth::user()->last_name  }}" >
        </div>
        <div class="form-group">
            <label for="shipping_state">Region</label>
            <input type="text" class="form-control" name="shipping_state" id="" aria-describedby="helpId" >
        </div>
        <div class="form-group">
            <label for="shipping_city">Ciudad</label>
            <input type="text" class="form-control" name="shipping_city" id="" aria-describedby="helpId" >
        </div>
        <div class="form-group">
            <label for="shipping_district">Distrito</label>
            <input type="text" class="form-control" name="shipping_district" id="" aria-describedby="helpId" >
        </div>
        <div class="form-group">
            <label for="shipping_address">Direccion</label>
            <input type="text" class="form-control" name="shipping_address" id="" value="{{Auth::user()->address_primary}}" >
        </div>
        <div class="form-group">
            <label for="shipping_phone">Telefono</label>
            <input type="text" class="form-control" name="shipping_phone" id="" value="{{Auth::user()->phone_primary}}" >
        </div>
        <h4>Opcion de Pago</h4>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery" >
            Dinero en efectivo
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal" >
            Paypal
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="payment_method" id="" value="card" >
            Tarjeta
          </label>
        </div>
         <button type="submit" class="btn btn-principal mt-3">Realizar Pedido</button>
    </form>
</div>


@endsection
