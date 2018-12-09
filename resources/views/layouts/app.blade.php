<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Jquery Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth

                        @if(Auth::user()->type == 'moderator')

                            <div class="dropdown">
                                <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Events
                                </a>


                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('event.create') }}">Create</a>
                                    </li>
                                </ul>

                                
                            </div>

                        @elseif(Auth::user()->type == 'admin')

                            <div class="dropdown">
                                <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Moderator
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Events
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('event.create') }}">Create</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown">
                                <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    Administrator
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            User
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.index') }}">Users</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">Create</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Area
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('area.index') }}">Areas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('area.create') }}">Create</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="nav-link" href="" id="dropdownMenuButton" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Tag
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('tag.index') }}">Tags</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('tag.create') }}">Create</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        @endif
                    @endAuth


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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
<footer class="fixed-bottom">
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sn-12 col-md-4 col-lg-4">
                    <a class="nav-link" style="color:black" href="{{ url('/about') }}">About</a>
                </div>
                <div class="col-xs-12 col-sn-12 col-md-3 col-lg-3">
                </div>
                <div class="col-xs-12 col-sn-12 col-md-5 col-lg-5">
                    <font size="2">REACT - versão 1.0.0 </font> | <font size="2">Todos os Direitos Reservados à
                        UPE-NTI</font>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <footer>
</body>
</html>
