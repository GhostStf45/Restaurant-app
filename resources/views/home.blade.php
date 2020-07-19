@extends('layouts.app')

@section('content')
@include('includes.slider')
<div class="row p-2">
    <div class="col-lg-12 general-content product-container">
        <div class="col-md-12 title-content">
            <h2 class="text-center">Productos</h2>
        </div>
        <!-- Select form -->
        <div class="row mx-1 select-section d-flex align-items-center justify-content-center">
            <div class="col-lg-4">
                <form action="{{route('home.listaCategoria')}}" method="GET">
                    <div class="form-group">
                        <label for="">Ordenar por: </label>
                        <select class="form-control" name="ordenar_alfabetica_dia" id="">
                          <option>A-Z</option>
                          <option>Platos añadidos recientemente.</option>
                          <option>Ordenar por precio mayor-menor</option>

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
            <a href="{{route('drink.index')}}" class="btn btn-block btn-bebidas btn-principal"><i class="fas fa-wine-bottle"></i> Ir a la seccion de bebidas</a>
            </div>
        </div>
        <!--Pagination-->
        <div id="pagination" class="mt-3 d-flex align-items-center justify-content-md-center">{{$allProducts->links()}}</div>
        <!--End pagination-->
        <div class="row">
            @foreach ($allProducts as $product)
            <div class="col-lg-3 col-md-2 col-sm-12 mb-4 ">
                    <div class="card shadow">
                            @if($product->cover_img)
                               <div class="card-img-top"><img src="{{ url('/product/file/'.$product->cover_img)}}" class=" cover_img_product w-100"></div>
                            @endif
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold">{{ $product->name }}</h4>
                                <p class="card-text">
                                    {{-- $product->description --}}
                                   <span class="link-primario">Mas informacion</span>
                                </p>
                                <p class="card-text"><span class="badge badge-warning badge-precio">S/.{{ $product->price }}</span></p>
                                <p class="card-text"><span class="badge badge-warning badge-categoria">{{ $product->categories->name }}</span></p>

                                <p class="card-text">Fecha de publicacion: {{ date('d-m-Y h:m:s', strtotime($product->created_at))  }}</p>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-sm btn-success p-2"><i class="fas fa-shopping-cart"></i> Añadir al carrito</a>
                                <a href="{{route('drink.index')}}" class="btn btn-sm btn-principal p-2"><i class="fas fa-wine-bottle"></i> Añadir una bebida</a>
                            </div>
                    </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection
