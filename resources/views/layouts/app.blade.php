<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mikuy') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet">
    <script src="{{ asset('fontawesome/js/all.js')}}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">

    <!--other libraries-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('other_libraries/animate/animate.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('other_libraries/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('other_libraries/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('other_libraries/select2/select2.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href={{asset('other_libraries/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href={{asset('css/login.css')}}>
    <!--===============================================================================================-->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
            <a class="navbar-brand navbar-logo" href="{{route('home')}}">
                    <img src="{{asset('img/logo.jpg')}}" width="40" height="40" alt="">
                    MIKUY
                  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon  text-white"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-cart-arrow-down fa-2x"></i>
                                <span class="badge badge-success">0</span>
                            </a>
                        </li>
                        @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user fa-2x"></i> Usuario no registrado
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-content-main" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item dropdown-content" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="dropdown-item dropdown-content" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('product.create')}}">
                                    <i class="fas fa-plus-square fa-2x"></i>
                                    Crear Producto
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user fa-2x"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-content" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main>
            @yield('content')
        </main>
    </div>
    <!--Scripts-->
        <script src="{{asset('other_libraries/jquery/jquery-3.2.1.min')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('other_libraries/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('other_libraries/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('other_libraries/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('other_libraries/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('other_libraries/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
