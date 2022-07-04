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
                    <div class="d-flex">
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            MisMangas
                        </a>
                        <form action="#" method="get">
                            @csrf
                            <input type="text">
                            <button>
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div>
                        <button data-bs-toggle="collapse" data-bs-target="#header_shopping_cart">
                            <i class="fa-solid fa-cart-shopping"></i>
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
