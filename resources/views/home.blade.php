@extends('layouts.app')

@section('content')
<div class="container general-content product-container">
    <h2 class="text-center p-2">Productos</h2>
    <!-- Select form -->
    <div class="row select-section mx-2 d-flex align-items-center justify-content-center">
        <div class="col-lg-4">
            <form action="{{route('home.listaCategoria')}}" method="GET">
                <div class="form-group">
                    <label for="">Ordenar por: </label>
                    <select class="form-control" name="ordenar_alfabetica_dia" id="">
                      <option>Platos añadidos recientemente.</option>
                      <option>A-Z</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-principal">Buscar...</button>
            </form>
        </div>
        <div class="col-lg-4">
            <form action="{{route('home.listaCategoria')}}" method="GET">
                <div class="form-group">
                    <label for="select-type-of-product">Seleccionar tipo de plato: </label>
                    <select class="form-control" name="tipo_producto">
                        <option value="">Seleccionar</option>
                            @foreach ($allCategories as $category)
                                <option value="{{$category->name}}" {{$category->id ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                            @endforeach

                    </select>
                </div>
                <button type="submit" class="btn btn-principal">Buscar...</button>
            </form>
        </div>
        <div class="col-lg-4">
            <a href="" class="btn btn-block btn-bebidas btn-principal">Ir a la seccion de bebidas</a>
        </div>
    </div>
    <div class="row">
        @foreach ($allProducts as $product)
        <div class="col-6 my-4 ">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('default_product.png') }}">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">{{ $product->name }}</h4>
                            <p class="card-text">
                                {{ $product->description }}
                               <span class="link-primario">Mas informacion</span>
                            </p>
                            <p class="card-text"><span class="badge badge-warning badge-precio">S/.{{ $product->price }}</span></p>
                            <p class="card-text"><span class="badge badge-warning badge-categoria">{{ $product->categories->name }}</span></p>

                            <p class="card-text">Fecha de publicacion: {{ date('d-m-Y h:m:s', strtotime($product->created_at))  }}</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-lg btn-principal">Añadir al carrito</a>
                            <a href="" class="btn btn-lg  btn-principal">Añadir una bebida</a>
                        </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
