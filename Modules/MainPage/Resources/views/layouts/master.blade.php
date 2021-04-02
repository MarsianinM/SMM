<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $websiteTitle }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ $websiteTitle }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('support.index') }}" class="nav-link">
                                <span style="margin-right: 7px;">
                                    <img src="{{ asset('img/support.png') }}" alt="support">
                                </span>
                                {{ __('support.name') }}
                            </a>
                        </li>
                        <li class="nav-item ml-5">
                            <a href="{{ route('messages.index') }}" class="nav-link">
                                <span style="margin-right: 7px;">
                                    <img src="{{ asset('img/message.png') }}" alt="message">
                                </span>
                                {{ __('messages.name') }}
                            </a>
                        </li>
                        <li class="nav-item ml-5 dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('balance.index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2">
                                    <img src="{{ asset('img/rub.png') }}" alt="rub">
                                </span>
                                {{ Auth::user()->getBalanceByCurrency('RUB') }}
                            </a>

                            <div class="dropdown-menu bg-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-white-50" href="{{ route('balance.index') }}">
                                    <span style="margin-left: 2px; margin-right: 10px;">
                                        <img src="{{ asset('img/rub.png') }}" alt="rub">
                                    </span>
                                    {{ Auth::user()->getBalanceByCurrency('RUB') }}
                                </a>
                                <a class="dropdown-item text-white-50" href="{{ route('balance.index') }}">
                                    <span style="margin-right: 7px;">
                                        <img src="{{ asset('img/usd.png') }}" alt="usd">
                                    </span>
                                    {{ Auth::user()->getBalanceByCurrency('USD') }}
                                </a>
                            </div>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">{{ __('news.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faqs.index') }}" class="nav-link">{{ __('faqs.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rules.index') }}" class="nav-link">{{ __('rules.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('prices.index') }}" class="nav-link">{{ __('prices.name') }}</a>
                        </li>
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu bg-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-item text-white-50">
                                    <button style="border: none; @role('client')background-color: #4fa12c;color:white;@endrole width: 90px;" onclick="event.preventDefault();
                                                     document.getElementById('set-client-form').submit();">Заказчик</button>
                                    <button style="border: none; @role('author')background-color: #4fa12c;color:white;@endrole width: 90px;" onclick="event.preventDefault();
                                                     document.getElementById('set-author-form').submit();">Автор</button>

                                    <form id="set-client-form" action="{{ route('set-role') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="role" value="client">
                                    </form>
                                    <form id="set-author-form" action="{{ route('set-role') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="role" value="author">
                                    </form>
                                </div>
                                @role('client')
                                <a class="dropdown-item text-white-50" href="{{ route('client.projects.index') }}">
                                    Мои проекты
                                </a>
                                @endrole
                                @role('author')
                                <a class="dropdown-item text-white-50" href="{{ route('author.wishlist.index') }}">
                                    Избранные
                                </a>
                                @endrole
                                <a class="dropdown-item text-white-50" href="{{ route('blacklist.index') }}">
                                    Черный список
                                </a>
                                <a class="dropdown-item text-white-50" href="{{ route('finance.index') }}">
                                    Финансы
                                </a>
                                <a class="dropdown-item text-white-50" href="#">
                                    Настройки
                                </a>
                                <a class="dropdown-item text-white-50" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
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
</body>
</html>
