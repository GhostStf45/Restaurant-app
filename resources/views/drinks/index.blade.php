@extends('layouts.app')

@section('content')
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: linear-gradient(to right, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url({{asset('img/bg/pisco-sour.jpg')}});">
    <h2 class="tit6 text-center">
        BEBIDAS
    </h2>
</section>
<div class="section-signup bg1-pattern p-t-85 p-b-85">
<form action="{{route('drink.search')}}" class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5" method="GET">
        <span class="txt5 m-10">
            Buscar bebida
        </span>
            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10 w-25">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="search">
                <i class="fas fa-search ab-r-m m-r-18" aria-hidden="true"></i>
            </div>
            <button type="submit" class="btn btn-principal flex-c-m size18 txt11 trans-0-4 m-10">
                Buscar
            </button>
    </form>
</div>

<div class="general-content product-container p-4 bg-dark">

    <!--Pagination-->
    <div id="pagination" class="mt-3 d-flex align-items-center justify-content-md-center">{{$allDrinks->appends(request()->except('page'))->links()}}</div>
</div>
    <section class="section-lunch bgwhite">
        <div class="container">
            <div class="row p-t-108 p-b-70">
                @foreach ($allDrinks as $drink)
                <div class="col-md-8 col-lg-6 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="blo3 flex-w flex-col-l-sm m-b-30">
                        <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                            @if($drink->cover_img)
                                <a href="#"><img src="{{ url('/drink/file/'.$drink->cover_img)}}" class="h-auto" alt="IMG-MENU"></a>
                            @endif

                        </div>

                        <div class="text-blo3 size21 flex-col-l-m">
                            <a href="#" class="txt21 m-b-3">
                                {{ $drink->name }}
                            </a>
                            <span class="txt22 m-t-20">
                                S/.{{ $drink->price }}
                            </span>
                        </div>
                        <div class="btn-group mt-4">
                            <a href="{{route('cart.add.drink', $drink->id)}}" class="btn btn-sm btn-success p-2 mr-2"><i class="fas fa-shopping-cart"></i> Añadir al carrito</a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
