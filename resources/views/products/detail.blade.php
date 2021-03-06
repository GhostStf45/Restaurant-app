@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card_product">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                    <img src="{{route('product.file', ['filename' => $product->cover_img])}}" alt="" class="product_image">
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->name}}</h3>
                        <div class="rating">
                            <div class="stars">
                                <div class="stars">
                                    @for ($i = 0; $i < 5; ++$i)
                                        <span class="fa fa-star {{ $avg<=$i?'':'checked' }}" aria-hidden="true"></span>
                                    @endfor
                                </div>
                            </div>
                            <span class="review-no">{{count($product->comments)}} Reseñas </span>
                        </div>
                        <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">Precio:  <span>S/.{{$product->price}}</span></h4>
                        <div class="action">
                            <a href="{{route('cart.add', $product->id)}}" class="add-to-cart btn btn-default" type="button">Añadir al carrito</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex mt-100 mb-100 mt-4">
        <div class="col-lg-12">
            <div class="card card_comment shadow ">
                <div class="card-header bg-dark">
                    <h4 class="card-title  card-title_comment text-center">Seccion de comentarios</h4>
                </div>
                <div class="card-body card-body_comment ">
                        <form method="post" action="{{route('comment.save')}}" class="mb-3 mt-2 row">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group col-md-4">
                                <label for="rating">Puntuacion</label>
                                <select class="form-control" name="rating" id="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="content">Agregar comentario</label>
                                    <textarea class="form-control {{ $errors->has('content') ? 'is-invalid': ''}}" name="content"></textarea>
                                    @if($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-md btn-principal" value="Enviar">
                                </div>
                            </form>
                    <h4 class="card-title text-dark font-weight-bold">Comentarios ({{count($product->comments)}})</h4>
                </div>
                @foreach ($product->comments as $comment)
                <div class="comment-widgets">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="user" width="50" class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium font-weight-bolder">{{$comment->user->name}} {{$comment->user->last_name}} <span class="text-muted float-right">{{\FormatTime::LongTimeFilter($comment->created_at)}}</span></h6>
                                <div class="rating">
                                    <div class="stars">
                                        @for ($i = 0; $i < 5; ++$i)
                                            <span class="fa fa-star {{ $comment->rating<=$i?'':'checked' }}" aria-hidden="true"></span>
                                        @endfor
                                    </div>
                                </div>
                                <span class="m-b-15 d-block">
                                    {{$comment->content}}

                                </span>

                            <div class="comment-footer">
                                @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->product->user_id == Auth::user()->id))
                                <a href="{{route('comment.delete', ['id' => $comment->id])}}" class="btn btn-danger">Eliminar comentario</a>
                                @endif
                            </div>
                    </div>
                </div> <!-- Card -->
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
