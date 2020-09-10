@foreach ($allProducts as $product)
<div class="col-md-4 col-lg-4 m-l-r-auto">
<!-- Block3 -->
<div class="blo3 flex-w flex-col-l-sm m-b-30">
    <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
        @if($product->cover_img)
    <a href="{{route('product.detail', ['id' => $product->id])}}"><img src="{{ url('/product/file/'.$product->cover_img)}}" class="cover_img_product" alt="IMG-MENU"></a>
        @endif

    </div>

    <div class="text-blo3 size21 flex-col-l-m">
        <a href="{{route('product.detail', ['id' => $product->id])}}" class="txt21 m-b-3">
            {{ $product->name }}
        </a>

        <span class="txt23">
            {{ $product->categories->name }}
        </span>
        <span class="txt22">
            S/.{{ $product->price }}
        </span>
        @if( $product->created_at > \Carbon\Carbon::now()->subDay() )
            <span class="badge badge-warning txt24 text-dark font-weight-bold">
                Nuevo
            </span>
        @endif
        <div class="details">
            <div class="rating">
                <div class="stars">
                    <div class="stars">
                        @for ($i = 0; $i < 5; ++$i)
                            <span class="fa fa-star {{ $product->comments->avg('rating')<=$i ?'':'checked' }}" aria-hidden="true"></span>
                        @endfor
                    </div>
                </div>
                <span class="review-no">{{count($product->comments)}} Reseñas </span>
            </div>

        </div>


    </div>
    <div class="btn-group">
    <a href="{{route('cart.add', $product->id)}}" class="btn btn-sm btn-success p-2 mr-2"><i class="fas fa-shopping-cart"></i> Añadir al carrito</a>
        <a href="{{route('drink.index')}}" class="btn btn-sm btn-principal p-2"><i class="fas fa-wine-bottle"></i> Añadir una bebida</a>
    </div>

    </div>
</div>
@endforeach
