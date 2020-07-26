@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile-group mt-5 bg1-pattern p-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="card card-profile">
                <div class="card-img-top bg-white mt-4 "><img src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="user-image" class="d-block mx-auto" width="220px" height="220px"></div>
                <div class="card-body text-center">
                  <h5 class="card-title mt-2">{{Auth::user()->name}} {{Auth::user()->last_name}}</h5>
                  <p class="card-text mt-2">Administrator</p>
                  <a name="" id="" class="btn2 btn-lg btn-principal mt-2" href="#" role="button"> Editar imagen</a>
                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header header-login">Perfil</div>
                <div class="card-body">
                <form action="{{route('user.update')}}" method="POST" class="row">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Apellidos</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" required autocomplete="last_name">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address_primary">Direccion primaria</label>
                        <input id="address_primary" type="text" class="form-control @error('address_primary') is-invalid @enderror" name="address_primary" value="{{Auth::user()->address_primary}}">
                        @error('address_primary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address_secondary">Direccion secundaria</label>
                        <input id="address_secondary" type="text" class="form-control @error('address_secondary') is-invalid @enderror" name="address_secondary" value="{{Auth::user()->address_secondary}}">
                        @error('address_secondary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone_primary">Telefono</label>
                        <input id="phone_primary" type="text" class="form-control  @error('phone_primary') is-invalid @enderror" name="phone_primary" value="{{Auth::user()->phone_primary}}">
                        @error('phone_primary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <div class="btn-group-profile">
                            <button type="submit" class="btn btn-principal">Actualizar mi cuenta</button>
                            <a name="" id="" class="link-primario" href="#">Actualizar contraseña</a>
                        </div>

                    </div>

                  </form>
                  <p class="bold">¿Queres realizar un pedido?</p>
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="far fa-credit-card"></i> Agregar tarjeta
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header header-login">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar y/o modificar metodo de pago </h5>
                            <button type="button " class="close text-white-50" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-footer">
                                <form action="" method="post" class="col-lg-12 col-md-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="name_credit_card"> Nombre</label>
                                            <input type="text" class="form-control" id="" name="card_name" placeholder="Visa">
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="card_number"><i class="far fa-credit-card"></i> Numero de la tarjeta de credito</label>
                                            <input type="text" class="form-control" id="" name="card_number" placeholder="0000 0000 0000 0000">
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                              <label for="">Mes</label>
                                              <select class="form-control" name="card_month" id="card_month">

                                              </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                            <label for="car_year">Año</label>
                                                <select class="form-control" name="card_year" id="card_year">
                                                </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                            <label for="">CVV/CVC</label>
                                            <input type="text" class="form-control" name="card_cvc" id="card_cvc" placeholder="123">
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-principal">Guardar cambios</button>
                                </form>
                                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>-->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
