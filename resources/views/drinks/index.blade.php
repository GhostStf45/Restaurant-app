@extends('layouts.app')

@section('content')

<div class="container general-content product-container">
    <div class="col-md-12 title-content p-2">
        <h2 class="text-center ">Bebidas</h2>
    </div>
    <div class="row mt-3">
        <form action="" class="col-lg-12">
            <div class="form-group">
              <label for="">Buscar bebida</label>
              <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-principal">Buscar</button>
        </form>
    </div>
     <!--Pagination-->
    <div id="pagination" class="mt-3 d-flex align-items-center justify-content-md-center">{{$allDrinks->links()}}</div>
    <div class="row">
        @foreach ($allDrinks as $drink)
        <div class="col-3 my-4 ">
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
                            <a href="" class="btn btn-lg  btn-principal"><i class="fas fa-shopping-cart"></i> Añadir bebida al carrito</a>
                        </div>
                </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
