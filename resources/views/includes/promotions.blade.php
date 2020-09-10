<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
    <div class="container">
        <div class="title-section-ourmenu text-center m-b-22">
            <span class="tit2 p-l-15 p-r-15">
                Ve nuestras
             </span>
            <h3 class="tit5 text-center m-t-2">
               Promociones
            </h3>
        </div>
    </div>
    <div id="myCarousel" class="carousel slide carousel-fade header-intro p-5" style="background-image:linear-gradient(to right, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url({{asset('img/bg/bg-intro-02.jpg')}});" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="mask flex-center" style="margin-top: 10%;">
                    <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-12 col-12 order-md-1 order-2">
                                    <h4 class="tit4 text-center">BIENVENIDO A LA SECCION DE PROMOCIONES</h4>
                                    <p class="text-white text-center">Encuentra el mejor plato al mejor precio.</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @foreach ($allPromotions as $promotion)
                <div class="carousel-item">
                        <div class="mask flex-center">
                            <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-md-7 col-12 order-md-1 order-2">
                                            <h4 class="tit3 text-white">{{$promotion->product->name}}</h4>
                                                <p class="text-white">{{$promotion->product->description}}</p>
                                                <p>
                                                    <span class="badge badge-warning text-dark txt19 font-weight-bold">
                                                        S/.{{$promotion->price}}
                                                    </span>
                                                </p>

                                                <a href="{{route('product.detail', ['id' => $promotion->product->id])}}" class="btn btn-principal btn-lg">Ir a la promocion</a>
                                        </div>
                                        <div class="col-md-5 col-12 order-md-2 order-1">
                                            <img src="{{ url('/product/file/'.$promotion->product->cover_img) }}" class=" bo-rad-10" alt="slide" style="width: 100%; max-height: 380px;">
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>

</section>

  <!--slide end-->
