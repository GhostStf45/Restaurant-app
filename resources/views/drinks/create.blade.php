@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">

            <div class="card login-card w-50">
                <div class="card-header header-login">Crear Bebida</div>
                <div class="card-body">
                    <form action="{{route('drink.save')}}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="quantity">Cantidad</label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" >
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                              <label for="description">Descripción</label>
                              <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                              @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-principal">Guardar</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
