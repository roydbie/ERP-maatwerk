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
    <?php
        date_default_timezone_set("Europe/Amsterdam");
    ?>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary" style="height: 30px!important;font-size:0.8rem!important;">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                    @if (Route::has('login'))
                        <!--<li class="nav-item px-4">
                            <a class="nav-link" href="{{ route('login') }}">Inloggen</a>
                        </li>-->
                    @endif

                    @if (Route::has('register'))
                        <!--<li class="nav-item px-4">
                            <a class="nav-link" href="{{ route('register') }}">Registreren</a>
                        </li>-->
                    @endif
                @else
                    <a class="nav-link px-3 text-white">
                        Ingelogd als: {{ Auth::user()->name }}
                    </a>
                    <a class="nav-link px-3 text-white"   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       href="{{ route('logout') }}">
                        Uitloggen
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                @endguest
            </div>
        </nav>

        @guest
        @if (Route::has('login'))

        @endif
        @else
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="height: 40px!important;">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/">Overzicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/werkorders">Werkorders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#">Planning</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-3 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Klanten
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Personen</a></li>
                                <li><a class="dropdown-item" href="#">Organisaties</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
