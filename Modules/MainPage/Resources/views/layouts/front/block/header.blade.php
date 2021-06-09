
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
                                    @foreach(auth()->user()->user_balances as $balance)
                                        <span class="balance">{{ $balance }}</span>
                                    @endforeach
                                    {{--UAH 672.5--}}
                                    {{--RUB {{ Auth::user()->getBalanceByCurrency('RUB') }}
                                    USD {{ Auth::user()->getBalanceByCurrency('USD') }}--}}
                                </p>
                            </li>
                        @endif
                    </ul>
                </nav>
                <div class="personal">

                    @if(auth()->user())
                        <div class="account">
                            <img src="{{ asset('frontend/img/_src/author__header.png') }}" alt="Аккаунт">
                        </div>
                        <div class="personal-name">
                            <p>
                                {{ auth()->user()->name }}
                            </p>
                            <span class="personal1">
                                <img src="{{ asset('img/_src/'.LaravelLocalization::getCurrentLocaleName().'.svg') }}"  class="flag-russia">
                                {{--<img src="{{ asset('frontend/img/_src/russia.svg') }}" alt="Флаг" class="flag-russia">--}}
                            </span>
                            <div class="country">
                                <ul>
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, []) }}">
                                                <img src="{{ asset('img/_src/'.$properties['name'].'.svg') }}" alt="{{$properties['native']}}" class="flag-btitan">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="open__menu">
                            <img src="{{ asset('frontend/img/_src/open__menu.png') }}" alt="open__menu">
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
                                <div class="custom-button active__btn2" onclick="event.preventDefault();
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
                                <a href="#"><img src="{{ asset('frontend/img/_src/projects.svg') }}" alt=""> <span class="text__dropdown">Мои проекты</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/personal.svg') }}" alt=""> <span class="text__dropdown">Персональные</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/star.svg') }}" alt=""> <span class="text__dropdown">Избранные</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/blacklist.svg') }}" alt=""> <span class="text__dropdown">Черный список</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/money.svg') }}" alt=""> <span class="text__dropdown">Финансы</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/partner.svg') }}" alt=""> <span class="text__dropdown">Партнерская программа</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/settings.svg') }}" alt=""><span class="text__dropdown">Настройки</span> </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('frontend/img/_src/exit.svg') }}" alt=""> <span class="text__dropdown">Выход</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endrole
                            @role('author')
                            <div class="dropdown-menu customer-menu">
                                <a href="#"><img src="{{ asset('frontend/img/_src/projects.svg') }}" alt=""> <span class="text__dropdown">Все проекты</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/personal.svg') }}" alt=""> <span class="text__dropdown">Персональные</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/star.svg') }}" alt=""> <span class="text__dropdown">Избранные</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/star.svg') }}" alt=""> <span class="text__dropdown">Мои работы</span></a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/blacklist.svg') }}" alt=""> <span class="text__dropdown">Черный список</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/money.svg') }}" alt=""> <span class="text__dropdown">Финансы</span> </a>
                                <a href="#"><img src="{{ asset('frontend/img/_src/partner.svg') }}" alt=""> <span class="text__dropdown">Партнерская программа</span> </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img src="{{ asset('frontend/img/_src/exit.svg') }}" alt=""> <span class="text__dropdown">Выход</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
