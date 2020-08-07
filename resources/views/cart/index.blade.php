@extends('layouts.app')

@section('content')
    <div class="container bg-white mt-4 p-4" style="border-radius: 0.25rem;">
        <h2 class="font-size-30">Tu carrito</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Precio (S/.)</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                            <td scope="row">{{$item->name}}</td>
                                <td>{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td>
                                <td>
                                    <form action="{{route('cart.update', $item->id)}}">
                                        <input name="quantity" type="number" class="cart_quantity" value="{{$item->quantity}}">
                                        <input type="submit" class="btn btn-secondary" value="Guardar">
                                    </form>
                                </td>
                                <td>
                                <a href="{{route('cart.destroy', $item->id)}}" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h5 class="font-weight-bold">
                    Subtotal: S/. {{\Cart::session(auth()->id())->getTotal()}}
                </h5>
            <a href="{{route('cart.checkout')}}" class="btn btn-success mt-4 mr-2" role="button">Procedimiento para pagar</a>
                <a href="{{route('cart.clear')}}" class="btn btn-danger mt-4" role="button">Vaciar carrito</a>
            </div>

    </div>

@endsection
