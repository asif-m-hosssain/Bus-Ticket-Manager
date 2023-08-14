<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'EasyGo') }}</title> -->
    <title>EasyGO</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'EasyGo') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if (Auth::user()->role == "Brand")
                                        <a class="dropdown-item" href="{{ route('brand') }}">
                                            {{ __('Ticketing') }}
                                        </a>
                                    @endif
                                    


                                    @if (Auth::user()->role == "Brand")
                                        <a class="dropdown-item" href="{{ route('add_food_to_menu') }}">
                                            {{ __('Add Food to Menu') }}
                                        </a>
                                    @endif

                                    
                                    @if (Auth::user()->role == "Customer")
                                        <a class="dropdown-item" href="{{ route('buy_ticket') }}">
                                            {{ __('Buy Ticket') }}
                                        </a>
                                    @endif


                                    @if (Auth::user()->role == "Customer")
                                        <a class="dropdown-item" href="{{ route('ranking') }}">
                                            {{ __('Rating and Review') }}
                                        </a>
                                    @endif
                                    <!-- <a class="dropdown-item" href="{{ route('brand') }}">
                                        {{ __('Ticketing') }}
                                    </a> -->
                                    <!-- @if (Auth::user()->role == "Customer")
                                    <a class="dropdown-item" href="{{ route('shopping-items.index') }}">
                                        {{ __('Food') }}
                                    </a> -->
                                    <!-- @endif -->
                                    @if (Auth::user()->role == "Customer")
                                    <a class="dropdown-item" href="{{ route('shopping-items.cart') }}">
                                        {{ __('Cart') }}
                                    </a>
                                    @endif


                                    @if (Auth::user()->role == "Admin")
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Register Bus') }}
                                    </a>
                                    @endif


                                    @if (Auth::user()->role == "Customer")
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    @endif


                                    @if (Auth::user()->role == "Brand")
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    @endif                                    

                                    

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
</body>
</html>
