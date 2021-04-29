<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $websiteSetting->title }}</title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="{{ asset('frontend/path/to/image.jpg') }}">
    <link rel="icon" href="{{ asset('frontend/img/src_/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-touch-icon-180x180.png') }}">
    <!-- Template Basic Images End -->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->

    <link href="{{ asset('frontend/css/main.min.css') }}" rel="stylesheet">

</head>
<body>

<content>
    <input id="hamburger" class="hamburger" type="checkbox"/>
    <label class="hamburger" for="hamburger">
        <i></i>
    </label>
    <section class="drawer-list">
        <ul>
            <li><a href="index.html#header">ПОДДЕРЖКА</a></li>
            <li><a href="index.html#tarif">СООБЩЕНИЯ</a></li>
            <li><a href="index.html#services">ЗАКАЗЧИК</a></li>
            <li><a href="index.html#poisk">АВТОР</a></li>
            <li><a href="index.html#reviews">БАЛАНС</a></li>
        </ul>
    </section>
</content>
<header class="header">
    <div class="header-menu">
        <div class="header-container">
            <div class="header-body">
                <a href="{{ route('home') }}">
                    @if($websiteSetting && $websiteSetting->hasMedia('settings'))
                        <img src="{{ $websiteSetting->getFirstMediaUrl('settings', 'logo') }}" alt="{{ $websiteSetting->title }}" class="logo">
                    @else
                        <img src="{{ asset('frontend/img/_src/logo.png') }}" alt="Лого" class="logo">
                    @endif
                </a>
                <nav>
                    <ul class="menu">
                        <li class="menu__item">
                            <a href="{{ route('support.index') }}" class="menu__link">
                                <span><img src="{{ asset('frontend/img/_src/support__item.png') }}" alt="support__item"></span>{{ __('support.name') }}
                            </a>
                        </li>
                        <li class="menu__item">
                            <a href="{{ route('messages.index') }}" class="menu__link">
                                <span><img src="{{ asset('frontend/img/_src/message__item.png') }}" alt="message__item"></span>{{ __('messages.name') }}
                            </a>
                        </li>
                        @if(auth()->user())
                        <li class="menu__item">
                            <a href="{{ route('balance.index') }}" class="menu__link"><span>
                                    <img src="{{ asset('frontend/img/_src/balance__item.png') }}" alt="balance__item"></span>БАЛАНС:</a>
                            <p>
                                UAH 672.5
                                RUB {{ Auth::user()->getBalanceByCurrency('RUB') }}
                                USD {{ Auth::user()->getBalanceByCurrency('USD') }}
                            </p>
                        </li>
                        @endif
                    </ul>
                </nav>
                <div class="personal">

                    @if(auth()->user())
                    <div class="account">
                        <img src="http://smm.loc/frontend/img/_src/author__header.png" alt="Аккаунт">
                    </div>
                    <div class="personal-name">
                        <p>
                            Senboards
                        </p>
                        <span class="personal1"><img src="{{ asset('frontend/img/_src/russia.svg') }}" alt="Флаг" class="flag-russia"></span>
                        <div class="country">
                           {{-- <span><img src="{{ asset('frontend/img/_src/ukraine.svg') }}" alt="" class="flag-uk"></span>
                            <span class="personal3"><img src="{{ asset('frontend/img/_src/britan.svg') }}" alt="" class="flag-btitan"></span>--}}
                            <ul>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="open__menu">
                        <img src="http://smm.loc/frontend/img/_src/open__menu.png" alt="open__menu">
                    </div>

                    <div class="personal-dropdown">
                        <div class="personal-buttons">
                            @role('author')
                            <div class="autor-button active__btn" onclick="event.preventDefault();
                                                     document.getElementById('set-author-form').submit();">
                                <p>Автор</p>
                            </div>
                            <div class="custom-button" onclick="event.preventDefault();
                                                     document.getElementById('set-client-form').submit();">
                                <p>Заказчик</p>
                            </div>
                            @endrole
                            @role('client')
                            <div class="autor-button " onclick="event.preventDefault();
                                                     document.getElementById('set-author-form').submit();">
                                <p>Автор</p>
                            </div>
                            <div class="custom-button active__btn" onclick="event.preventDefault();
                                                     document.getElementById('set-client-form').submit();">
                                <p>Заказчик</p>
                            </div>
                            @endrole
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
                        <div class="dropdown-menu autor-menu">
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/projects.svg" alt=""> <span class="text__dropdown">Мои проекты</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/personal.svg" alt=""> <span class="text__dropdown">Персональные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/star.svg" alt=""> <span class="text__dropdown">Избранные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/blacklist.svg" alt=""> <span class="text__dropdown">Черный список</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/money.svg" alt=""> <span class="text__dropdown">Финансы</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/partner.svg" alt=""> <span class="text__dropdown">Партнерская программа</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/settings.svg" alt=""><span class="text__dropdown">Настройки</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/exit.svg" alt=""> <span class="text__dropdown">Выход</span> </a>
                        </div>
                        @endrole
                        @role('author')
                        <div class="dropdown-menu customer-menu">
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/projects.svg" alt=""> <span class="text__dropdown">Все проекты</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/personal.svg" alt=""> <span class="text__dropdown">Персональные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/star.svg" alt=""> <span class="text__dropdown">Избранные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/star.svg" alt=""> <span class="text__dropdown">Мои работы</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/blacklist.svg" alt=""> <span class="text__dropdown">Черный список</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/money.svg" alt=""> <span class="text__dropdown">Финансы</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/partner.svg" alt=""> <span class="text__dropdown">Партнерская программа</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/settings.svg" alt=""><span class="text__dropdown">Настройки</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/exit.svg" alt=""> <span class="text__dropdown">Выход</span> </a>
                        </div>
                        @endrole
                    </div>
                    @else
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
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
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<section class="projects">
    <div class="container">
        @yield('content')
    </div>
</section>

<section class="top__footer">
    <div class="container">
        <div class="inner__topfooter">
            <div class="choose__project">
                Выбрано проектов: 4519
            </div>
            <ul class="top__footer__icons">
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon1.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon2.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon3.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon4.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon5.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon6.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon7.png" alt="footer__icon"></li>
                <li><img src="http://smm.loc/frontend/img/_src/footer__icon8.png" alt="footer__icon"></li>
            </ul>

            <div class="vip__topfooter">
                VIP
            </div>

            <div class="btn__topfooter">
                <a href="#">Оплатить</a>
            </div>

            <div class="cansel__choose">
                <a href="#">Отменить выбранные</a>
            </div>
        </div>
    </div>
</section>

<div class="footer footer">
    <div class="container">
        <div class="footer-body">
            <div class="footer-left">
                <a href="{{ route('home') }}">
                    @if($websiteSetting && $websiteSetting->hasMedia('settings'))
                        <img src="{{ $websiteSetting->getFirstMediaUrl('settings', 'logo') }}" alt="{{ $websiteSetting->title }}" class="logo">
                    @else
                        <img src="{{ asset('frontend/img/_src/logo.png') }}" alt="Лого" class="logo">
                    @endif
                </a>
                <div class="soc-seti">
						<span class="one">
							<img src="http://smm.loc/frontend/img/_src/gmail-footer.svg" alt="" class="img-one">
							<img src="http://smm.loc/frontend/img/_src/gmail-white.svg" alt="" class="img-first">
						</span>
                    <span class="two">
							<img src="http://smm.loc/frontend/img/_src/facebook-footer.svg" alt="" class="img-two">
							<img src="http://smm.loc/frontend/img/_src/facebook-white.svg" alt="" class="img-second">
						</span>
                    <span class="three">
							<img src="http://smm.loc/frontend/img/_src/telegramm-footer.svg" alt="" class="img-three">
							<img src="http://smm.loc/frontend/img/_src/telegram-white.svg" alt="" class="img-third">
						</span>
                </div>
                <div class="soc-contact">
                    <p><a href="malito:support@smm.ua">support@smm.ua</a></p>
                    <p class="tex__support"><a href="index.html#">Техподдержка</a></p>
                </div>
            </div>
            <div class="footer-right">
                <div class="footer-menu">
                    <h3>СПРАВКА</h3>
                    <a href="index.html#">Новости</a>
                    <a href="index.html#">Тарифы</a>
                    <a href="index.html#">Правила работы</a>
                    <a href="index.html#">Вопросы и ответы</a>
                    <a href="index.html#">Политика конфиденциальности</a>
                </div>
                <div class="footer-menu">
                    <h3>ЗАКАЗЧИКУ</h3>
                    <a href="index.html#">Методы оплаты</a>
                    <a href="index.html#">Как выбрать тариф</a>
                    <a href="index.html#">Как купить комментарии</a>
                    <a href="index.html#">Личный менеджер</a>
                </div>
                <div class="footer-menu">
                    <h3>АВТОРУ</h3>
                    <a href="index.html#">Ранги авторов</a>
                    <a href="index.html#">Как можно заработать?</a>
                    <a href="index.html#">Плагины для скриншотов</a>
                    <a href="index.html#">Штрафы</a>
                </div>

                <div class="footer-menu">
                    <div class="inner__double">
                        <h3>API MAGNIFICENT</h3>
                        <a href="index.html#">Описание API 1.5</a>
                        <a href="index.html#">Плагин для WordPress</a>
                    </div>


                    <div class="inner__double">
                        <h3>КОНТАКТЫ</h3>
                        <a href="index.html#">Обратись в поддержку</a>
                        <a href="index.html#">Все контакты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}


<script src="{{ asset('frontend/js/scripts.min.js') }}" defer></script>
</body>
</html>
