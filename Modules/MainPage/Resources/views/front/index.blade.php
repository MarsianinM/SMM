@extends('mainpage::layouts.front.main')

@section('content')
    <section class="services">
        <div class="container">
            <div class="header-services">
                <div class="services__item">
                    <img src="{{ asset('img/service1.svg') }}" alt="">
                    <h2 class="run1">29 659</h2>
                    <p>
                        Работ выполняется ежедневно
                    </p>
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
@endsection
