<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mikuy Delivery</title>
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="{{ asset('fontawesome/js/all.js')}}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
</head>
<body>
    <div id='app'>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <span class="logo-styles"><h3>MIKUY</h3></span>
                  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link " href="{{route('home')}}">
                                HOME
                        </a>
                        </li>
                        <li class="nav-item mr-auto">
                            <a class="nav-link" href="{{route('product.index')}}">
                                MENÚ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('drink.index')}}">
                                BEBIDAS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('advice.create')}}">
                                RECLAMOS
                            </a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="fas fa-cart-arrow-down fa-2x"></i>
                                <span class="badge badge-success">
                                    @auth
                                        {{Cart::session(auth()->id())->getContent()->count()}}
                                    @else
                                        0
                                    @endauth
                                </span>
                            </a>
                        </li>
                        @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user fa-2x"></i> Usuario no registrado
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-content-main animate slideIn" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item dropdown-content" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="dropdown-item dropdown-content" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </li>
                        @else
                            @if(Auth::user()->role->display_name == 'Administrator')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-arrow-down fa-2x"></i>
                                        Acciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left dropdown-content-main animate slideIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item dropdown-content" href="{{route('product.create')}}"><i class="fas fa-plus-square"></i> Crear Producto</a>
                                        <a class="dropdown-item dropdown-content" href="{{route('drink.create')}}">
                                            <i class="fas fa-wine-bottle"></i>
                                            Crear Bebida
                                        </a>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user fa-2x"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-content-main animate slideIn" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dropdown-content" href="{{route('profile')}}">
                                        Perfil
                                    </a>
                                    @if(Auth::user()->role->display_name == 'Administrator')
                                    <a class="dropdown-item dropdown-content" href="{{route('admin_charts.read')}}">
                                        Panel de registros frecuentes
                                    </a>
                                    <a class="dropdown-item dropdown-content" href="{{url('/admin')}}">
                                        Panel de Administrador
                                    </a>
                                    @endif
                                    <a class="dropdown-item dropdown-content" href="{{ route('logout') }}"
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
        {{--Display success message--}}
        @if (session()->has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{session('message')}}
            </div>
         @elseif (session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
        <main>

            @yield('content')
        </main>

    </div>

    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha512-VZ6m0F78+yo3sbu48gElK4irv2dzPoep8oo9LEjxviigcnnnNvnTOJRSrIhuFk68FMLOpiNz+T77nNY89rnWDg==" crossorigin="anonymous"></script>
    <script src="{{asset('js/charts_admin.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>


    @include('sweetalert::alert')

</body>
</html>
