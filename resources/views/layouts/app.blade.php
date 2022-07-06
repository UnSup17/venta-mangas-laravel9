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
    @if(session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if (Route::currentRouteName() == "/dashboard")
                @else
                    <div>
                        <a class="navbar-brand" href="{{ url('/home') }}">
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
                    <div>
                        <button data-bs-toggle="collapse" data-bs-target="#header_shopping_cart">
                            <a href="{{ route('shopping', [])}}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </button>
                        <button>
                            <i class="fa-solid fa-user-circle"></i>
                        </button>
                    </div>
                @endif
            </div>
        </nav>

        <main class="py-4">
            @include('layouts.flash-messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
