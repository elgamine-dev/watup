<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <menu class="nes-container main-menu">
        <div class="logo">
            <a href="/">
                <div class="nes-balloon from-left">
                    <p>Watup</p>
                </div>
                <div class="character"><i class="nes-kirby is-small"></i></div>
            </a>
        </div>
        <div class="links">
        @auth
            <a href="/feelings" class="nes-btn">Mood</a>
            <a href="/config" class="nes-btn">Params</a>
            @admin
            <a href="/users" class="nes-btn">Adventurers</a>
            <a href="/options" class="nes-btn">Options</a>
            @endadmin
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="nes-icon close"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
        </div>
    </menu>
    @if(Session::has('message'))
    <div class="message">
        <div class="nes-balloon from-left">
            <p>{{Session::get('message')}}</p>
        </div>
        <div>
            <i class="nes-bcrikko"></i>
        </div>
    </div>
    @endif
    <div class="nes-container">
        @yield('content')
    </div>
</body>
</html>