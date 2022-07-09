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
    <script src="https://kit.fontawesome.com/2f59615649.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <i class="fa-solid fa-book-open"></i>
                        <b>MisMangas</b>
                    </a>
                </div>
                <div>
                    <form action="{{ route('home') }}" method="get">
                        @csrf
                        <input class="barra-busqueda" type="text" name="manga_name">
                        <button type="submit">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </form>
                </div>
                @if (session()->has('user'))
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <b>{{ session()->get('user')[0]->name }}</b>
                    </div>
                    <div class="d-flex">
                        <button>
                            <a href="{{ route('shopping', [])}}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                {{ count(session()->get('car')->items) }}
                            </a>
                        </button>
                        @if(session()->get('user')[0]->role == "admin")
                            <button class="">
                                <a  href="{{ route('admin_mangas')}}">
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                            </button>
                        @endif
                        <button class="">
                            <a  href="{{ route('logout')}}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </button>
                    </div>
                @else
                    <div>
                        <button>
                            <a href="{{ route('form_login') }}" class="">Log in</a>
                        </button>
                        <button>
                            <a href="{{ route('form_register') }}" class="">Register</a>
                        </button>
                    </div>
                @endif
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.flash-messages')
</body>
</html>
