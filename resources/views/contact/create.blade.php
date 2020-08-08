@extends('layouts.app')

@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{asset('img/bg/bg-title-page-02.jpg')}});">
    <h2 class="tit6 t-center">
        Contacto
    </h2>
</section>
<section class="section-contact bg1-pattern p-t-90 p-b-113">

    <div class="container">
        @include('includes.message')
        <h3 class="tit7 text-center p-b-62 p-t-105">
            Envianos un mensaje
        </h3>

        <form action="{{route('advice.save')}}" method="post" class="wrap-form-reservation size22 m-l-r-auto">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <span class="txt9">
                        Nombre
                    </span>

                    <div class="wrap-inputname size12  bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20  @error('name') is-invalid @enderror" type="text" name="name" value="{{ Auth::user()->name ? Auth::user()->name : ''}}" placeholder="Nombre">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Email -->
                    <span class="txt9">
                        Apellido
                    </span>

                    <div class="wrap-inputemail size12  bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20  @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ Auth::user()->last_name ? Auth::user()->last_name : ''}}" placeholder="Apellidos">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <span class="txt9">
                        Email
                    </span>

                    <div class="wrap-inputphone size12  bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20 @error('email') is-invalid @enderror" type="email" name="email" value="{{ Auth::user()->email ? Auth::user()->email : ''}}" placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="txt9">
                        Tipo
                    </div>
                        <div class="custom-control custom-radio col-md-12">
                            <input type="radio" id="customRadio1" name="advice_type_check" class="custom-control-input" value="complaint_option">
                            <label class="custom-control-label" for="customRadio1">Queja</label>
                        </div>
                        <div class="custom-control custom-radio col-md-12">
                            <input type="radio" id="customRadio2" name="advice_type_check" class="custom-control-input" value="should_option">
                            <label class="custom-control-label" for="customRadio2">Recomendacion</label>
                        </div>
                    <div class="wrap-inputemail size12  bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20 @error('advice_checked') is-invalid @enderror" type="text" id="advice_checked" name="advice_checked" placeholder="Tipo de mensaje">
                        @error('advice_checked')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-12">
                    <span class="txt9">
                        Mensaje
                    </span>
                    <textarea class="bo-rad-10 size35  txt10 p-l-20 p-t-15 m-b-10 m-t-3 @error('message') is-invalid @enderror" name="message" placeholder="Message"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>

            <div class="wrap-btn-booking flex-c-m m-t-13">
                <!-- Button3 -->
                <button type="submit" class="btn btn-principal flex-c-m size36 txt11 trans-0-4 mr-4">
                    Enviar
                </button>
                 <!-- Button3 -->
                 <button type="button" class="btn btn-dark flex-c-m size36 txt11">
                    Cancelar
                </button>
            </div>
        </form>

        <div class="row p-t-135">
            <div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{asset('img/icons/map-icon.png')}}" alt="IMG-ICON">
                    </div>

                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Localizacion
                        </span>

                        <span class="txt23 size38">
                            8th floor, 379 Hudson St, New York, NY 10018
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{asset('img/icons/phone-icon.png')}}" alt="IMG-ICON">
                    </div>


                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Llamanos
                        </span>

                        <span class="txt23 size38">
                            (+51) 123 456 789
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{asset('img/icons/clock-icon.png')}}" alt="IMG-ICON">
                    </div>


                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Horario de atención
                        </span>

                        <span class="txt23 size38">
                            09:30 AM – 11:00 PM <br/>Todo el Dia
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
