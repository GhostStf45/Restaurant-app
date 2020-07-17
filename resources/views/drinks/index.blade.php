@extends('layouts.app')

@section('content')

<div class="container general-content product-container">
    <h2 class="text-center p-2">Bebidas</h2>
    <div class="row">
        <form action="" class="col-lg-12">
            <div class="form-group">
              <label for="">Buscar bebida</label>
              <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
    <div class="row">
        @foreach ($allDrinks as $drink)
        <div class="col-6 my-4 ">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('img/default-drink.png') }}">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">{{ $drink->name }}</h4>
                            <p class="card-text">
                                {{ $drink->description }}
                               <span class="link-primario">Mas informacion</span>
                            </p>
                            <p class="card-text"><span class="badge badge-warning badge-precio">S/.{{ $drink->price }}</span></p>
                            <p class="card-text">Fecha de publicacion: {{ date('d-m-Y h:m:s', strtotime($drink->created_at))  }}</p>
                        </div>
                        <div class="card-body">
                            <a href="" class="btn btn-lg  btn-principal">Añadir bebida al carrito</a>
                        </div>
                </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
