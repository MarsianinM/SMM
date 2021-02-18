<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/panel/messages') }}">
                    Admin Panel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('admin.support.index') }}" class="nav-link">{{ __('support.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.messages.index') }}" class="nav-link">{{ __('messages.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}" class="nav-link">{{ __('projects.name') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">{{ __('users.name') }}</a>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @role('client')
                                        <a class="dropdown-item" href="{{ route('client.projects.index') }}">
                                            Мои проекты
                                        </a>
                                    @endrole
                                    <a class="dropdown-item" href="{{ route('wishlist.index') }}">
                                        Избранные
                                    </a>
                                    <a class="dropdown-item" href="{{ route('blacklist.index') }}">
                                        Черный список
                                    </a>
                                    <a class="dropdown-item" href="{{ route('payment.index') }}">
                                        Финансы
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Настройки
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
