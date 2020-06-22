<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="app">
        <div class="bg-custom">
            <div class="container">
                <ul class="navigation">
                    <li class="navigation-item">
                        <a class="{{ Request::path() == '/' ? 'navigation-active' : '' }}" href="{{ route('home') }}"><i class="fal fa-tachometer"></i> Tableau de bord</a>
                    </li>
                    @admin
                    <li class="navigation-item">
                        <a class="{{ Request::path() == 'stats' ? 'navigation-active' : '' }}" href="{{ route('stats') }}"><i class="fal fa-chart-pie"></i> Statistiques</a>
                    </li>

                    <li class="navigation-item">
                        <a class="{{ Request::path() == 'users' ? 'navigation-active' : '' }}" href="{{ route('users.index') }}"><i class="fal fa-user-md"></i> Utilisateurs</a>
                    </li>

                    @endadmin
                    @guest
                        <li class="navigation-item" style="float: right;">
                            <a href="#news"><i class="fal fa-sign-in-alt"></i> Connexion</a>
                        </li>
                    @else
                        <li class="navigation-item ddwn" style="float:right">
                            <a href="javascript:void(0)" class="dropbtn {{ Request::path() == 'mes-informations' ? 'navigation-active' : '' }}"><i class="fal fa-user"></i> {{ Auth::user()->name }}</a>
                            <div class="dropdown-content">
                                <a href="{{ route('mes-informations') }}"><i class="fal fa-user-edit"></i> Modifier mes informations</a>
                                <a href="#" onclick="$('#logout-form').submit();"><i class="fal fa-sign-out-alt"></i> Déconnexion</a>
                                <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none;">@csrf</form>
                            </div>
                        </li>
                        <li class="navigation-item ddwn" style="float:right">
                            <a href="javascript:void(0)" class="dropbtn"> <i class="fal fa-bell"></i></a>
                            <div class="dropdown-content">
                                @foreach(Auth::user()->unreadNotifications as $n)
                                    <p class="m-2">
                                    <i class="fal fa-bell text-warning"></i> <strong>{{ $n['data']['message'] }}</strong>
                                    </p>
                                @endforeach
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="footer p-3">
            <span class="">Propulsé par : Lotus Médias</span>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
