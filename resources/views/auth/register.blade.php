@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
            <div class="card login-card w-50 mx-auto">
                <div class="card-header header-login"><h4 class="text-center">Registrate</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="row">
                        @csrf

                        <div class="form-group col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Apellidos">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-6">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                        </div>
                        <div class="form-group col-md-6">

                            <input id="phone_primary" type="number" class="form-control @error('phone_primary') is-invalid @enderror" name="phone_primary" placeholder="Telefono" required autocomplete="phone_primary">
                            @error('phone_primary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">

                            <input id="address_primary" type="text" class="form-control @error('address_primary') is-invalid @enderror" name="address_primary" placeholder="Dirección" required autocomplete="address_primary">
                            @error('address_primary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                                <button type="submit" class="btn btn-block btn-principal">
                                    {{ __('Registrarse') }}
                                </button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
