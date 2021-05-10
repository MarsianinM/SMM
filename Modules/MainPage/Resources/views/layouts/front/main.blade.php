<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('mainpage::layouts.front.block.head')
</head>
<body>

    <div id="login-form" class="modal">
        <div class="modal__title">
            <h4>Вход</h4>
        </div>

        <ul class="modal__social">
            <li>
                <a href="#">
                    <img src="img/_src/vk-icon.jpg" alt="vk-icon">
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="img/_src/facebook-icon.jpg" alt="facebook-icon">
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="img/_src/odnoklasniki-icon.jpg" alt="odnoklasniki-icon">
                </a>
            </li>

        </ul>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="key" value="#login-form">
            <div class="main__select__item">
                <p>Email</p>
                <input class="main__input__other @error('email') is-invalid validate__input @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    @if(old('key') == "#login-form")
                        <span class="invalid-feedback red__validate" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @endif
                @enderror
            </div>

            <div class="main__select__item">
                <p>Пароль</p>
                <input id="password" type="password" class="main__input__other @error('password') is-invalid validate__input @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    @if(old('key') == "#login-form")
                        <span class="invalid-feedback red__validate" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @endif
                @enderror
            </div>

            <div class="all__btns__modal" style="margin-top: 35px;">
                <div class="modal__btn">
                    <button type="submit">Вход ›</button>
                </div>
                @if (Route::has('password.request'))
                    <div><a href="#remember-form" rel="modal:open">Забыли пароль?</a></div>
                @endif

                <div>Еще нет аккаунта? <a href="#signin-form" rel="modal:open">Регистрация</a></div>
            </div>
        </form>
    </div>

    <div id="signin-form" class="modal">
        <div class="modal__title">
            <h4>Регистрация</h4>
        </div>

        <ul class="modal__social">
            <li>
                <a href="#">
                    <img src="img/_src/vk-icon.jpg" alt="vk-icon">
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="img/_src/facebook-icon.jpg" alt="facebook-icon">
                </a>
            </li>

            <li>
                <a href="#">
                    <img src="img/_src/odnoklasniki-icon.jpg" alt="odnoklasniki-icon">
                </a>
            </li>

        </ul>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="key" value="#signin-form">
            <div class="main__select__item">
                <p>Email</p>
                <input id="email" type="email" class="main__input__other @error('email') is-invalid validate__input @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    @if(old('key') == "#signin-form")
                        <span class="invalid-feedback red__validate" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @endif
                @enderror
            </div>

            <div class="main__select__item">
                <p>Имя</p>
                <input id="name" type="text" class="main__input__other @error('name') is-invalid validate__input @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    @if(old('key') == "#signin-form")
                        <span class="invalid-feedback red__validate" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @endif
                @enderror
            </div>

            <div class="main__select__item">
                <p>Пароль</p>
                <input id="password" type="password" class="main__input__other @error('password') is-invalid validate__input @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    @if(old('key') == "#signin-form")
                        <span class="invalid-feedback red__validate" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @endif
                @enderror
            </div>

            <div class="main__select__item">
                <p>Подтверждение пароля</p>
                <input id="password-confirm" type="password" class="main__input__other" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="all__btns__modal" style="margin-top: 35px;">
                <div class="modal__btn">
                    <button type="submit">Зарегистрироваться ›</button>
                </div>

                <div><a href="#remember-form" rel="modal:open">Забыли пароль?</a></div>

                <div>Еще нет аккаунта? <a href="#login-form" rel="modal:open">Войти</a></div>
            </div>
        </form>

    </div>

    <div id="remember-form" class="modal">
        <div class="modal__title">
            <h4>Забыли пароль</h4>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="hidden" name="key" value="#remember-form">
            <div class="main__select__item">
                <p>Email</p>
                <input id="email" type="email" class="main__input__other @error('email') is-invalid validate__input @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    @if(old('key') == "#remember-form")
                        <span class="invalid-feedback red__validate" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @endif
                @enderror
            </div>
            <div class="modal__btn" style="margin-top: 35px;">
                <button type="submit">Отправить ›</button>
            </div>
            <div class="all__btns__modal">
                <div><a href="#login-form" rel="modal:open">Я вспомнил пароль</a></div>
            </div>
        </form>
    </div>

    @if(!auth()->user())
        @include('mainpage::layouts.front.block.header_no_auth')
    @else
        @include('mainpage::layouts.front.block.header')
    @endif

    @if($errors->any())
        <div class="thank__you__popup alert-danger">
            {!! implode('<br>', $errors->all('<p>:message</p>')) !!}
        </div>
    @endif
    <section>
        <div class="offer">
            <div class="container__mainpage" style="z-index: 2;position: relative;">
                <div class="offer-body">
                    <div class="offer-info">
                        <h1>
                            БИРЖА КОММЕНТАРИЕВ И СОЦИАЛЬНОГО ПРОДВИЖЕНИЯ
                        </h1>
                        <p>
                            Биржа SMM.ua предоставляет инструмент по<br> крауд-маркетингу для пиара и продвижения в интернете. Продвигайте бренды, группы в социальных сетях, видео на youtube, поднимайте репутацию в интернете с помощью комментариев и отзывов.
                        </p>
                        <div class="offer-button">
                            <a href="#" class="offer-btn">
                                <img data-v-62cdc43b="" src="{{ asset('frontend/img/_src/play.svg') }}" width="17" alt="">
                                Запустить
                            </a>
                        </div>

                    </div>
                    <img src="{{ asset('frontend/img/_src/header-right.svg') }}" alt="Оффер" class="offer-img">
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <section class="services">
            <div class="container">
                <div class="header-services">
                    <div class="services__item">
                        <img src="https://smm.ua/img/landing-page/service1.svg" alt="">
                        <h2 class="run1">29 659</h2>
                        <p>
                            Работ выполняется ежедневно                </p>
                    </div>
                    <div class="services__item">
                        <img src="https://smm.ua/img/landing-page/services2.svg" alt="">
                        <h2 class="run2">2 562 443</h2>
                        <p>
                            Зарегистрированных пользователей                </p>
                    </div>
                    <div class="services__item">
                        <img src="https://smm.ua/img/landing-page/services3.svg" alt="">
                        <h2 class="run3">48 803 437</h2>
                        <p>
                            Выполнено работ через нашу биржу                </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="customer">
            <div class="container__mainpage">
                <div class="customer-body">
                    <div class="customer-img">
                        <img src="img/_src/zakazchik.svg" alt="Заказчик">
                    </div>
                    <div class="customer-info">
                        <h2>Заказчику</h2>
                        <p>Лучший инструмент по крауд-маркетингу</p>
                        <p>Продвигайте Ваш бренд или товары в интернете</p>
                        <p>Спровоцируйте пользовательскую активность</p>
                        <p>Комментарии, отзывы, наполнение форумов</p>
                        <p>Репосты, лайки, ретвиты и подписчики</p>
                        <p>Просмотры видео</p>
                        <p>Фиксированные тарифы от 1 рубля</p>
                        <p>Переходы с нашей биржи не фиксируют счетчики</p>
                        <p>Проверка результата перед оплатой</p>



                        <div class="customer-button"><a href="" class="customer-btn">
                                Найти подрядчиков
                            </a> </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="autor">
            <div class="container__mainpage">
                <div class="autor-body">
                    <div class="autor-info">
                        <h2>Автору</h2>
                        <p>Становитесь специалистом по крауд-маркетингу</p>
                        <p>Зарабатывайте, комментируя материалы на сайтах</p>
                        <p>Зарабатывайте, общаясь на форумах</p>
                        <p>Зарабатывайте, оставляя лайки и делая репосты</p>
                        <p>Зарабатывайте, просматривая видео</p>
                        <p>Работайте в удобное для вас время</p>
                        <p>Получайте до 46 рублей за выполненную работу</p>
                        <p>Заказы различной тематики</p>
                        <p>Минимальная выплата 100 рублей</p>



                        <div class="author-button"><a href="" class="autor-btn">
                                Хочу стать автором
                            </a> </div>
                    </div>
                    <div class="autor-img">
                        <img src="img/_src/author.svg" alt="Автор">
                    </div>
                </div>
            </div>
        </section>
        <section class="service">
            <div class="container__mainpage">
                <div class="service-wrapper">
                    <h2>КАК РАБОТАТЬ С НАШИМ СЕРВИСОМ?</h2>
                    <div class="service-body">
                        <div class="service-info">
                            <div class="manual">
                                <h3>01</h3>
                                <p>Зарегистрироваться на бирже</p>
                            </div>
                            <div class="manual">
                                <h3>02</h3>
                                <p>
                                    Создать проект и оплатить необходимое количество работ                        </p>
                            </div>
                            <div class="manual">
                                <h3>03</h3>
                                <p>Проверить результат</p>
                            </div>



                            <div data-v-c7ad3358="" id="service-btn" class="service-btn"><a data-v-c7ad3358="" href="#service-btn" target="_blank" class="service-btn">
                                    Зарегистрироваться
                                </a> <!----></div>
                        </div>
                        <div class="notebook__png">

                            <iframe  src="https://www.youtube.com/embed/rKJg5HEdXWA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" class="video"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="footer footer">
        <div class="container">
            <div class="footer-body">
                <div class="footer-left">
                    <a href="index.html"><img src="img/_src/logo.png" alt="logo"></a>
                    <div class="soc-seti">
						<span class="one">
							<img src="img/_src/gmail-footer.svg" alt="" class="img-one">
							<img src="img/_src/gmail-white.svg" alt="" class="img-first">
						</span>
                        <span class="two">
							<img src="img/_src/facebook-footer.svg" alt="" class="img-two">
							<img src="img/_src/facebook-white.svg" alt="" class="img-second">
						</span>
                        <span class="three">
							<img src="img/_src/telegramm-footer.svg" alt="" class="img-three">
							<img src="img/_src/telegram-white.svg" alt="" class="img-third">
						</span>
                    </div>
                    <div class="flag__hover">
                        <a href="#" class="personal1"><img src="img/_src/russia.svg" alt="Флаг" class="flag-russia"></a>
                        <div class="country">
                            <a href="#"><img src="img/_src/ukraine.svg" alt="" class="flag-uk"></a>
                            <a href="#" class="personal3"><img src="img/_src/britan.svg" alt="" class="flag-btitan"></a>
                        </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.min.js') }}"></script>

    @if($errors->any())
        <script>
            $(function() {
                $("{{ old('key') }}").modal();
            });
        </script>
    @endif
</body>
</html>
