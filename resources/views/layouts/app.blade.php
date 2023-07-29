 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand btn btn-danger bg-opacity-50 text-light" href="{{ url('/') }}">
                <i class="fa fa-moon fa-xl"></i> 
                <i class="fa fa-star fa-rotate-180"></i>
                Türkei 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                <a class="nav-link {{Request::is('/') ? 'btn btn-info bg-opacity-50 text-light' : ''}}" href="/">Startseite</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{Request::is('galerie') ? 'btn btn-info bg-opacity-50 text-light' : ''}}" href="/galerie">Galerie</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{Request::is('sehen') ? 'btn btn-info bg-opacity-50 text-light' : ''}}" href="/sehen">Sehenwürdigkeiten</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link {{Request::is('comment') ? 'btn btn-info bg-opacity-50 text-light' : ''}}" href="/comment">Besucherkommentare</a>
                        </li>
                    
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                               
                                
                            @endif
                        @else
                            <li class="nav-item ">
                                <a href="/home" 
							    class="nav-link {{Request::is('home') ? 'btn btn-danger text-light' : ''}}" >myHome</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="bg-info bg-opacity-50 col-12 py-2 fixed-bottom">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a class="text-dark nav-link" href="/contact">Kontakt</a></li>
            <li class="mx-1 px-1"><a class=" text-dark nav-link" href="/impressum">Impressum</a></li>
        </ul>

    </div>
</body>
</html>
