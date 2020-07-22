@extends('layouts.app')

@section('content')
<!-- Titulo de la pagina -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image:linear-gradient(to right, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url({{asset('img/bg/bg-title-page-01.jpg')}});">
    <h2 class="tit6 text-center">
        PLATOS
    </h2>
</section>

<div class="row ">
        <div class="col-lg-12 general-content product-container p-4">
            <!-- Select form -->
            <div class="row mx-1 select-section d-flex align-items-center justify-content-center">
                <div class="col-lg-4">
                    <form action="{{route('products.listaCategoria')}}" method="GET">
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
                    <form action="{{route('products.listaCategoria')}}" method="GET">
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
            <div id="pagination" class="mt-3 d-flex align-items-center justify-content-md-center">{{$allProducts->appends(request()->except('page'))->links()}}</div>
            <!--End pagination-->
        </div>
</div>
<section class="section-lunch bgwhite">
    <div class="container">
        <div class="row p-t-108 p-b-70">
            @foreach ($allProducts as $product)
            <div class="col-md-8 col-lg-6 m-l-r-auto">
                <!-- Block3 -->
                <div class="blo3 flex-w flex-col-l-sm m-b-30">
                    <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                        @if($product->cover_img)
                            <a href="#"><img src="{{ url('/product/file/'.$product->cover_img)}}" class="cover_img_product" alt="IMG-MENU"></a>
                        @endif

                    </div>

                    <div class="text-blo3 size21 flex-col-l-m">
                        <a href="#" class="txt21 m-b-3">
                            {{ $product->name }}
                        </a>

                        <span class="txt23">
                            {{ $product->categories->name }}
                        </span>

                        <span class="txt22 m-t-20">
                            S/.{{ $product->price }}
                        </span>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-success p-2 mr-2"><i class="fas fa-shopping-cart"></i> Añadir al carrito</a>
                        <a href="{{route('drink.index')}}" class="btn btn-sm btn-principal p-2"><i class="fas fa-wine-bottle"></i> Añadir una bebida</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
