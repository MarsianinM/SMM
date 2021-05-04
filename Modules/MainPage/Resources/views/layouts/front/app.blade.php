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

        <form action="/">

            <div class="main__select__item">
                <p>Email</p>
                <input class="main__input__other" type="text" placeholder="">
            </div>

            <div class="main__select__item">
                <p>Пароль</p>
                <input class="main__input__other" type="password" placeholder="">
            </div>

            <div class="all__btns__modal" style="margin-top: 35px;">
                <div class="modal__btn">
                    <a href="#">Вход ›</a>
                </div>

                <div><a href="#remember-form" rel="modal:open">Забыли пароль?</a></div>

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

        <form action="/">
            <div class="main__select__item">
                <p>Email</p>
                <input class="main__input__other" type="text" placeholder="">
            </div>

            <div class="main__select__item">
                <p>Логин</p>
                <input class="main__input__other" type="text" placeholder="">
            </div>

            <div class="main__select__item">
                <p>Пароль</p>
                <input class="main__input__other" type="password" placeholder="">
            </div>

            <div class="main__select__item">
                <p>Подтверждение пароля</p>
                <input class="main__input__other" type="password" placeholder="">
            </div>

            <div class="all__btns__modal" style="margin-top: 35px;">
                <div class="modal__btn">
                    <a href="#">Зарегистрироваться ›</a>
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

        <form action="/">
            <div class="label__form__modal">
                <div class="main__select__item">
                    <p>Email</p>
                    <input class="main__input__other" type="text" placeholder="">
                </div>
            </div>
            <div class="modal__btn" style="margin-top: 35px;">
                <a href="#">Отправить ›</a>


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
    </body>
</html>
