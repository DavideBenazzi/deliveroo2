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
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div id="app" class="app-container d-flex flex-col">

        {{-- header --}}
        <header class="">
            <nav class="navbar-expand-md">
                <div class="container p-relative d-flex just-center">
                    {{-- <a id="logo" class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                        DELIVERBOO 4
                    </a> --}}
                    {{-- <img src="{{ asset('/img/open.png')}}" alt=""> --}}
                    {{-- <button class="navbar-toggler custom-toogler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
                    </button> --}}

                    {{-- <div class="
                    collapse navbar-collapse
                    " id="
                    navbarSupportedContent
                    "> --}}
                        <!-- Left Side Of Navbar -->
                        {{-- <ul class="navbar-nav ml-auto">

                        </ul> --}}

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav mr-auto d-flex align-end  flex-row">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item ml-4">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">DASHBOARD</a>
                                </li>
                                {{-- name + logout --}}
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
                    {{-- </div> --}}
                </div>
            </nav>
        </header>

        {{-- main content --}}
        <main class="d-flex flex-col p-relative">
            @yield('content')
        </main>

        {{-- footer --}}
        @include('partials.footer')
    </div>
        
</body>
</html>
