@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile-group mt-5 bg1-pattern p-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="card card-profile">
                <div class="card-img-top bg-white mt-4 "><img src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="user-image" class="d-block mx-auto" width="220px" height="220px"></div>
                <div class="card-body text-center">
                  <h5 class="card-title mt-2">{{Auth::user()->name}} {{Auth::user()->last_name}}</h5>
                  <p class="card-text mt-2">
                    <span class="d-block">
                        @if(Auth::user()->role->display_name == 'Administrator')
                            Administrador
                        @endif
                        @if(Auth::user()->role->display_name == 'Normal User')
                            Cliente
                        @endif
                    </span>
                    @if(Auth::user()->state == 'activated')
                      <span class="badge badge-success">
                          Activo
                      </span>
                    @else
                        <span class="badge badge-warning">
                            Suspendido
                        </span>
                    @endif

                  </p>

                  <a name="" id="" class="btn btn-principal mt-2 " href="#" role="button"> Editar imagen</a>
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
                            <a name="" id="" class="link-primario" href="{{route('password.request')}}">Actualizar contraseña</a>
                        </div>

                    </div>

                  </form>
                  @if(Auth::user()->role->display_name == 'Normal User')
                        @if (Auth::user()->state == 'activated')
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#exampleModalIn">
                                Suspender cuenta
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Suspension de cuenta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    ¿Estas seguro de suspender tu cuenta?. No podrás realizar pedidos
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('user.suspend')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <button type="submit"class="btn btn-danger">Aceptar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endif
                        @if (Auth::user()->state == 'suspended')
                            <form action="{{route('user.activate')}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <button type="submit"class="btn btn-success">Activar cuenta</button>
                                </div>
                            </form>
                        @endif
                  @endif
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
                                <!--=================PAYMENT CARD FORM ===================================-->
                            <form action="{{route('user.card.save')}}" method="post" id ="creditCardForm" class="col-lg-12 col-md-12">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="card_type">Tipo</label>
                                        <select class="form-control @error('card_type') is-invalid @enderror"  name="card_type" id="card_type">
                                                @if (Auth::user()->card_type == 'Credito')
                                                        <option>{{Auth::user()->card_type}}</option>
                                                        <option>Debito</option>
                                                @else
                                                        <option>{{Auth::user()->card_type}}</option>
                                                        <option>Credito</option>
                                                @endif
                                              </select>
                                            @error('card_type')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="card_name">Nombre</label>
                                            <div class="btn-group colors" data-toggle="buttons">
                                                <label class="btn btn-light active mr-1">
                                                  <i class="fab fa-cc-visa fa-2x"></i> Visa
                                                  <input type="radio" class="card_name" name="card_name_check" value="visa_option" autocomplete="off">
                                                </label>
                                                <label class="btn btn-light">
                                                    <i class="fab fa-cc-mastercard fa-2x"></i> MasterCard
                                                    <input type="radio" class="card_name" name="card_name_check" value="mastercard_option" autocomplete="off">
                                                </label>
                                            </div>
                                        <input type="text" class="form-control @error('card_name_value') is-invalid @enderror" value="{{ Auth::user()->card_name ? Auth::user()->card_name : ''}}" id="card_name_checked" name="card_name_value" placeholder="Visa" >
                                            @error('card_name_value')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="card_number"><i class="far fa-credit-card"></i> Numero de la tarjeta de credito</label>
                                            <input type="text" class="form-control @error('card_number') is-invalid @enderror" value="{{ Auth::user()->card_number ? Auth::user()->card_number : ''}}" name="card_number" placeholder="0000 0000 0000 0000">
                                            @error('card_number')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                            <label for="car_year">Año</label>
                                                <select class="form-control" name="card_year" id="card_year">
                                                </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-md-4">
                                              <label for="">Mes</label>
                                              <select class="form-control" name="card_month" id="card_month">
                                              </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <input type="text" class="form-control @error('expiredDate') is-invalid @enderror" value="{{ Auth::user()->card_date_expired ? Auth::user()->card_date_expired : ''}}" name="expiredDate" id="expiredDate">
                                            @error('expiredDate')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-4">
                                            <label for="card_cvc">CVV/CVC</label>
                                            <input type="text" class="form-control @error('card_cvc') is-invalid @enderror" name="card_cvc" id="card_cvc" value="{{ Auth::user()->card_cv ? Auth::user()->card_cv : ''}}" placeholder="123">
                                            @error('card_cvc')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <button type="submit" id="btnCardSave" class="btn btn-principal">Guardar cambios</button>
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
