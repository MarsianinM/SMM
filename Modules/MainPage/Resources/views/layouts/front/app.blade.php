<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('mainpage::layouts.front.block.head')
    </head>
    <body>
        @include('mainpage::layouts.front.block.header')
        <section class="projects">
            <div class="container">
                @yield('content')
            </div>
        </section>

        @yield('top-footer')


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
                                    <img src="{{ asset('frontend/img/_src/gmail-footer.svg') }}" alt="" class="img-one">
                                    <img src="{{ asset('frontend/img/_src/gmail-white.svg') }}" alt="" class="img-first">
                                </span>
                            <span class="two">
                                    <img src="{{ asset('frontend/img/_src/facebook-footer.svg') }}" alt="" class="img-two">
                                    <img src="{{ asset('frontend/img/_src/facebook-white.svg') }}" alt="" class="img-second">
                                </span>
                            <span class="three">
                                    <img src="{{ asset('frontend/img/_src/telegramm-footer.svg') }}" alt="" class="img-three">
                                    <img src="{{ asset('frontend/img/_src/telegram-white.svg') }}" alt="" class="img-third">
                                </span>
                        </div>
                        <div class="flag__hover">
                            <a href="#" class="personal1"><img src="{{ asset('frontend/img/_src/russia.svg') }}" alt="Флаг" class="flag-russia"></a>
                            <div class="country">
                                <a href="#"><img src="{{ asset('frontend/img/_src/ukraine.svg') }}" alt="" class="flag-uk"></a>
                                <a href="#" class="personal3"><img src="{{ asset('frontend/img/_src/britan.svg') }}" alt="" class="flag-btitan"></a>
                            </div>
                        </div>
                        <div class="soc-contact">
                            <p><a href="malito:support@smm.ua">support@smm.ua</a></p>
                            <p class="tex__support"><a href="{{ route('support.index') }}">Техподдержка</a></p>
                        </div>

                    </div>
                    <div class="footer-right">
                        <div class="footer-menu">
                            <h3>СПРАВКА</h3>
                            <a href="{{ route('news.index') }}">Новости</a>
                            <a href="#">Тарифы</a>
                            <a href="#">Правила работы</a>
                            <a href="#">Вопросы и ответы</a>
                            <a href="#">Политика конфиденциальности</a>
                        </div>
                        <div class="footer-menu">
                            <h3>ЗАКАЗЧИКУ</h3>
                            <a href="#">Методы оплаты</a>
                            <a href="#">Как выбрать тариф</a>
                            <a href="#">Как купить комментарии</a>
                            <a href="#">Личный менеджер</a>
                        </div>
                        <div class="footer-menu">
                            <h3>АВТОРУ</h3>
                            <a href="#">Ранги авторов</a>
                            <a href="#">Как можно заработать?</a>
                            <a href="#">Плагины для скриншотов</a>
                            <a href="#">Штрафы</a>
                        </div>

                        <div class="footer-menu">
                            <div class="inner__double">
                                <h3>API MAGNIFICENT</h3>
                                <a href="#">Описание API 1.5</a>
                                <a href="#">Плагин для WordPress</a>
                            </div>


                            <div class="inner__double">
                                <h3>КОНТАКТЫ</h3>
                                <a href="#">Обратись в поддержку</a>
                                <a href="#">Все контакты</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <script src="{{ asset('frontend/js/scripts.min.js') }}"></script>
        @yield('script')

        @if($errors->any())
            <div class="thank__you__popup alert-danger">
                {!! implode('<br>', $errors->all('<p>:message</p>')) !!}
            </div>
            <script>
                setTimeout(function(){
                    $('.thank__you__popup').fadeOut('slow');
                },6000);
            </script>
        @endif

        @if(session()->has('success'))
            <div class="thank__you__popup alert-success">
                {{ session()->get('success') }}
            </div>
            <script>
                setTimeout(function(){
                    $('.thank__you__popup').fadeOut('slow');
                },6000);
            </script>
        @endif
    </body>
</html>
