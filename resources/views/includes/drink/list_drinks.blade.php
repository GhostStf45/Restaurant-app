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
