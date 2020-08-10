@extends('layouts.app')

@section('content')
<div class="container bg-white mt-4 p-5 radius-small">
    <div class="card shadow">
        <div class="card-header header-login">
            <h2 class="card-title">Pedido</h2>
        </div>
        <div class="card-body">
            <h3>Informacion de compra</h3>
            <form action="{{route('orders.store')}}" class="row" method="post">
                @csrf
                <div class="form-group col-md-12">
                  <label for="shipping_fullname">Nombre completo</label>
                <input type="text" class="form-control @error('shipping_fullname') is-invalid @enderror" name="shipping_fullname" id="" aria-describedby="helpId" value="{{Auth::user()->name." ".Auth::user()->last_name  }}" >
                    @error('shipping_fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="shipping_state">Region</label>
                    <select class="form-control @error('shipping_state') is-invalid @enderror" name="shipping_state"  data-live-search="true">
                    <option value="Arequipa" >Arequipa</option>
                    </select>
                    @error('shipping_state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="shipping_city">Ciudad</label>
                    <select class="form-control @error('shipping_city') is-invalid @enderror" name="shipping_city"  data-live-search="true">
                    <option value="Arequipa" >Arequipa</option>
                    </select>
                    @error('shipping_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="shipping_district">Distrito</label>
                    <select class="selectpicker form-control show-tick @error('shipping_district') is-invalid @enderror"  name="shipping_district" data-live-search="true">
                        <option value="Bustamante" >Bustamante</option>
                        <option value="Cerro colorado">Cerro colorado</option>
                        <option value="Hunter">Hunter</option>
                        <option value="Cayma" >Cayma</option>
                        <option value="Arequipa">Arequipa</option>
                        <option value="Characato">Characato</option>

                        <option value="Chiguata" >Chiguata</option>
                        <option value="La Joya">La Joya</option>
                        <option value="Mariano Melgar">Mariano Melgar</option>
                        <option value="Miraflores" >Miraflores</option>
                        <option value="Mollebaya">Mollebaya</option>
                        <option value="Paucarpata">Paucarpata</option>

                        <option value="Pocsi" >Pocsi</option>
                        <option value="Polobaya">Polobaya</option>
                        <option value="Quequeña">Quequeña</option>
                        <option value="Sabandia" >Sabandía</option>
                        <option value="Sachaca">Sachaca</option>
                        <option value="San Juan de Siguas">San Juan de Siguas</option>

                        <option value="San Juan de Tarucani" >San Juan de Tarucani</option>
                        <option value="Santa Rita de Siguas">Santa Rita de Siguas</option>
                        <option value="Socabaya">Socabaya</option>
                        <option value="Tiabaya" >Tiabaya</option>
                        <option value="Vitor">Vítor</option>
                        <option value="Yanahuara">Yanahuara</option>

                        <option value="Yarabamba">Yarabamba</option>
                        <option value="Yura" >Yura</option>
                    </select>
                    @error('shipping_district')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="shipping_address">Direccion</label>
                    <input type="text" class="form-control  @error('shipping_address') is-invalid @enderror" name="shipping_address" id="" value="{{Auth::user()->address_primary}}" >
                    @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group col-md-12">
                    <label for="shipping_phone">Telefono</label>
                    <input type="number" class="form-control @error('shipping_phone') is-invalid @enderror" name="shipping_phone" id="" value="{{Auth::user()->phone_primary}}" >
                    @error('shipping_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-md-12">
                    <label for="">Tipo de pago</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="payment_method" class="custom-control-input" value="cash_on_delivery">
                            <label class="custom-control-label" for="customRadio1">Dinero en efectivo</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="payment_method" class="custom-control-input" value="paypal">
                            <label class="custom-control-label" for="customRadio2">Paypal</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="payment_method" class="custom-control-input" value="card">
                            <label class="custom-control-label" for="customRadio3">Tarjeta</label>
                        </div>

                </div>
                <div class="col-md-12 mt-4">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-lg btn-principal btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                    Realizar Pedido
                </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">¿Ha verificado correctamente sus datos?</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-principal">Si, he comprobado</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, he comprobado</button>

                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>

    </div>



</div>


@endsection
