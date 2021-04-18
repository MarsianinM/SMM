<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <!-- <base href="/"> -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $websiteTitle }}</title>
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
                <a href="index.html">
                    <img src="http://smm.loc/frontend/img/_src/logo.png" alt="Лого" class="logo">
                </a>
                <nav>
                    <ul class="menu">
                        <li class="menu__item">
                            <a href="index.html#" class="menu__link"><span><img src="http://smm.loc/frontend/img/_src/support__item.png" alt="support__item"></span>ПОДДЕРЖКА</a>
                        </li>
                        <li class="menu__item">
                            <a href="index.html#" class="menu__link"><span><img src="http://smm.loc/frontend/img/_src/message__item.png" alt="message__item"></span>СООБЩЕНИЯ</a>
                        </li>
                        <li class="menu__item">
                            <a href="index.html#" class="menu__link"><span><img src="http://smm.loc/frontend/img/_src/balance__item.png" alt="balance__item"></span>БАЛАНС:</a>
                            <p>
                                UAH 672.5
                                RUB 860.5
                                USD 993.16
                            </p>
                        </li>
                    </ul>
                </nav>
                <div class="personal">
                    <div class="account">
                        <img src="http://smm.loc/frontend/img/_src/author__header.png" alt="Аккаунт">
                    </div>
                    <div class="personal-name">
                        <p>
                            Senboards
                        </p>
                        <span class="personal1"><img src="http://smm.loc/frontend/img/_src/russia.svg" alt="Флаг" class="flag-russia"></span>
                        <div class="country">
                            <span><img src="http://smm.loc/frontend/img/_src/ukraine.svg" alt="" class="flag-uk"></span>
                            <span class="personal3"><img src="http://smm.loc/frontend/img/_src/britan.svg" alt="" class="flag-btitan"></span>
                        </div>
                    </div>
                    <div class="open__menu">
                        <img src="http://smm.loc/frontend/img/_src/open__menu.png" alt="open__menu">
                    </div>

                    <div class="personal-dropdown">
                        <div class="personal-buttons">
                            <div class="autor-button">
                                <p>Автор</p>
                            </div>
                            <div class="custom-button">
                                <p>Заказчик</p>
                            </div>
                        </div>
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
                        <div class="dropdown-menu customer-menu">
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/projects.svg" alt=""> <span class="text__dropdown">Все проекты</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/personal.svg" alt=""> <span class="text__dropdown">Персональные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/star.svg" alt=""> <span class="text__dropdown">Избранные</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/star.svg" alt=""> <span class="text__dropdown">Мои работы</span></a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/blacklist.svg" alt=""> <span class="text__dropdown">Черный список </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/money.svg" alt=""> <span class="text__dropdown">Финансы</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/partner.svg" alt=""> <span class="text__dropdown">Партнерская программа </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/settings.svg" alt=""><span class="text__dropdown">Настройки</span> </a>
                            <a href="index.html#"><img src="http://smm.loc/frontend/img/_src/exit.svg" alt=""> <span class="text__dropdown">Выход</span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="projects">
    <div class="container">

        <div class="project__top">
            <div class="project__title">
                Проекты
            </div>
            <ul class="project__top__menu">
                <li><a href="#">Группы проектов</a></li>
                <li><a href="#">Черный список авторов</a></li>
                <li><a href="#">Команды авторов</a></li>
                <li><a href="#" class="btn__top-menu green__btntop">Ваш менеджер</a></li>
                <li><a href="#" class="btn__top-menu red__btntop">Создать проект</a></li>
            </ul>
        </div>

        <div class="project__top2">
            <div class="control__input">
                <select class="custom-select sources" placeholder="Все группы" id="">
                    <option value="Группа1">Группа1</option>
                    <option value="Группа2">Группа2</option>
                    <option value="Группа3">Группа3</option>
                    <option value="Группа4">Группа4</option>
                </select>
            </div>
            <div class="control__input">
                <select class="custom-select sources" placeholder="По дате создания" id="">
                    <option value="Дата1">Дата1</option>
                    <option value="Дата2">Дата2</option>
                    <option value="Дата3">Дата3</option>
                    <option value="Дата4">Дата4</option>
                </select>
            </div>
            <div class="control__input">
                <div class="name__project">
                    <input type="text" placeholder="ID, название проекта или тариф"><span><img src="http://smm.loc/frontend/img/_src/search__project.png" alt="search__project"></span>
                </div>
            </div>

            <div class="control__input">
                <label for="all__project__check"><span class="for__label">Выбрать все проекты</span><input type="checkbox" id="all__project__check"></label>
            </div>

        </div>

        <div class="project__top3">
            <div class="flex__top3">
                <div class="text__flex">Всего завершено:</div>
                <div class="text__cifra green__data">4519</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">Оплаченные:</div>
                <div class="text__cifra green__data">150</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">На проверке:</div>
                <div class="text__cifra red__data">150</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">На доработке:</div>
                <div class="text__cifra black__data">150</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex"><span><img src="http://smm.loc/frontend/img/_src/man__icon.png" alt="man__icon"></span>Приступившие авторы:</div>
                <div class="text__cifra blue__data">150</div>
            </div>
        </div>

        <div class="desc__project__item">
            <ul class="desc__ul">
                <li><span><img src="http://smm.loc/frontend/img/_src/desc__icon1.png"></span>Описание</li>
                <li><span><img src="http://smm.loc/frontend/img/_src/desc__icon2.png"></span>Данные по проекту</li>
                <li><span><img src="http://smm.loc/frontend/img/_src/desc__icon3.png"></span>Тариф</li>
                <li><span><img src="http://smm.loc/frontend/img/_src/desc__icon3.png"></span>Действия</li>
            </ul>
        </div>
        <div class="all__project">
            <div class="project__item green__project">
                <div class="describe__project">
                    <div class="describe__id">
                        <p>ID - 7081541</p>

                        <span class="status__project active__status">Активный</span>
                    </div>

                    <div class="describe__inner">
                        <div class="describe__title">Computed vs Watched Property Computed vs Watched Property Computed vs Watched Property Computed vs Watched Property</div>
                        <p class="paragraph__describe">
                            Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of
                        </p>

                        <div class="zametka__title">
                            Заметка
                        </div>
                        <p class="paragraph__describe">
                            Группа: Нет группы
                        </p>

                        <div class="name-social name-social-1">
                            <a href="index.html#" class="back-1">
                                <img src="http://smm.loc/frontend/img/_src/gmail.svg" alt="Гмаил" class="color-normal-1">
                            </a>
                            <a href="index.html#" class="back-2">
                                <img src="http://smm.loc/frontend/img/_src/instagram.svg" alt="Инстаграм" class="color-normal-2">
                            </a>
                            <a href="index.html#" class="back-3">
                                <img src="http://smm.loc/frontend/img/_src/twitter.svg" alt="Твиттер" class="color-normal-3">
                            </a>
                            <a href="index.html#" class="back-4">
                                <img src="http://smm.loc/frontend/img/_src/vk.svg" alt="Вк" class="color-normal-4">
                            </a>
                            <a href="index.html#" class="back-5">
                                <img src="http://smm.loc/frontend/img/_src/youtube.svg" alt="Ютуб" class="color-normal-5">
                            </a>
                            <a href="index.html#" class="back-6">
                                <img src="http://smm.loc/frontend/img/_src/telegram.svg" alt="Телеграм" class="color-normal-6">
                            </a>
                            <a href="index.html#" class="back-7">
                                <img src="http://smm.loc/frontend/img/_src/facebook.svg" alt="Фэйсбук" class="color-normal-7">
                            </a>
                        </div>
                    </div>
                </div>


                <div class="data__project">
                    <div class="item__data">
                        <div class="data__text">
                            Оплаченные
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На проверке
                        </div>
                        <span class="data_shifr red__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На доработке
                        </div>
                        <span class="data_shifr black__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            Приступившие авторы
                        </div>
                        <span class="data_shifr blue__data">50</span>
                    </div>

                    <div class="item__data top__border">
                        <div class="data__text">
                            Завершено
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="last__work">
                        <div class="work__text">
                            Последняя работа:
                        </div>

                        <div class="work__under">
                            10 сентября 2020г <br>09:27:13
                        </div>
                    </div>
                </div>

                <div class="tariph__project">
                    <div class="tariph__title">
                        от 500 символов
                    </div>

                    <div class="tariph__usd">
                        0.16 USD
                    </div>

                    <div class="tariph__btn">
                        <a href="#">Оплатить</a>
                    </div>

                    <div class="tariph__icon">
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>2</span></div>
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>5</span></div>
                    </div>
                    <div class="tariph__flag">
                        <span><img src="http://smm.loc/frontend/img/_src/flag__tariph.png" alt="flag__tariph"></span>
                    </div>
                </div>

                <div class="actions__project">
                    <ul class="actions__icons">
                        <li><img src="http://smm.loc/frontend/img/_src/action1.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action2.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action3.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action4.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action5.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action6.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action7.png" alt="action"></li>
                    </ul>

                    <span class="vip__span">vip</span>

                    <div class="action__describe">
                        до 10 сентября 2021 года
                    </div>

                    <div class="enter__btn">
                        <a href="#"><span><img src="http://smm.loc/frontend/img/_src/zapusk__img.png" alt="zapusk__img"></span>Запустить</a>
                    </div>

                    <div class="absolute__checkbox">
                        <label for="choose__check1">Выбрать<input type="checkbox" id="choose__check1"></label>
                    </div>
                </div>
            </div>

            <div class="project__item yellow__project">
                <div class="describe__project">
                    <div class="describe__id">
                        <p>ID - 7081541</p>

                        <span class="status__project pause__status">Приостановлен</span>
                    </div>

                    <div class="describe__inner">
                        <div class="describe__title">Laravel Sanctum</div>
                        <p class="paragraph__describe">
                            Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of
                        </p>

                        <div class="zametka__title">
                            Заметка
                        </div>
                        <p class="paragraph__describe">
                            Группа: Нет группы
                        </p>

                        <div class="name-social name-social-1">
                            <a href="index.html#" class="back-1">
                                <img src="http://smm.loc/frontend/img/_src/gmail.svg" alt="Гмаил" class="color-normal-1">
                            </a>
                            <a href="index.html#" class="back-2">
                                <img src="http://smm.loc/frontend/img/_src/instagram.svg" alt="Инстаграм" class="color-normal-2">
                            </a>
                            <a href="index.html#" class="back-3">
                                <img src="http://smm.loc/frontend/img/_src/twitter.svg" alt="Твиттер" class="color-normal-3">
                            </a>
                            <a href="index.html#" class="back-4">
                                <img src="http://smm.loc/frontend/img/_src/vk.svg" alt="Вк" class="color-normal-4">
                            </a>
                            <a href="index.html#" class="back-5">
                                <img src="http://smm.loc/frontend/img/_src/youtube.svg" alt="Ютуб" class="color-normal-5">
                            </a>
                            <a href="index.html#" class="back-6">
                                <img src="http://smm.loc/frontend/img/_src/telegram.svg" alt="Телеграм" class="color-normal-6">
                            </a>
                            <a href="index.html#" class="back-7">
                                <img src="http://smm.loc/frontend/img/_src/facebook.svg" alt="Фэйсбук" class="color-normal-7">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="data__project">
                    <div class="item__data">
                        <div class="data__text">
                            Оплаченные
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На проверке
                        </div>
                        <span class="data_shifr red__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На доработке
                        </div>
                        <span class="data_shifr black__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            Приступившие авторы
                        </div>
                        <span class="data_shifr blue__data">50</span>
                    </div>

                    <div class="item__data top__border">
                        <div class="data__text">
                            Завершено
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="last__work">
                        <div class="work__text">
                            Последняя работа:
                        </div>

                        <div class="work__under">
                            10 сентября 2020г <br>09:27:13
                        </div>
                    </div>
                </div>

                <div class="tariph__project">
                    <div class="tariph__title">
                        от 500 символов
                    </div>

                    <div class="tariph__usd">
                        0.16 USD
                    </div>

                    <div class="tariph__btn">
                        <a href="#">Оплатить</a>
                    </div>

                    <div class="tariph__icon">
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>2</span></div>
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>5</span></div>
                    </div>
                    <div class="tariph__flag">
                        <span><img src="http://smm.loc/frontend/img/_src/flag__tariph.png" alt="flag__tariph"></span>
                    </div>
                </div>

                <div class="actions__project">
                    <ul class="actions__icons">
                        <li><img src="http://smm.loc/frontend/img/_src/action1.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action2.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action3.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action4.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action5.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action6.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action7.png" alt="action"></li>
                    </ul>

                    <span class="vip__span">vip</span>

                    <div class="action__describe">
                        до 10 сентября 2021 года
                    </div>

                    <div class="enter__btn">
                        <a href="#"><span><img src="http://smm.loc/frontend/img/_src/zapusk__img.png" alt="zapusk__img"></span>Запустить</a>
                    </div>

                    <div class="absolute__checkbox">
                        <label for="choose__check2">Выбрать<input type="checkbox" id="choose__check2"></label>
                    </div>
                </div>
            </div>

            <div class="project__item blue__project">
                <div class="describe__project">
                    <div class="describe__id">
                        <p>ID - 7081541</p>

                        <span class="status__project complete__status">Выполнен</span>
                    </div>

                    <div class="describe__inner">
                        <div class="describe__title">Laravel Sanctum</div>
                        <p class="paragraph__describe">
                            Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of
                        </p>

                        <div class="zametka__title">
                            Заметка
                        </div>
                        <p class="paragraph__describe">
                            Группа: Нет группы
                        </p>

                        <div class="name-social name-social-1">
                            <a href="index.html#" class="back-1">
                                <img src="http://smm.loc/frontend/img/_src/gmail.svg" alt="Гмаил" class="color-normal-1">
                            </a>
                            <a href="index.html#" class="back-2">
                                <img src="http://smm.loc/frontend/img/_src/instagram.svg" alt="Инстаграм" class="color-normal-2">
                            </a>
                            <a href="index.html#" class="back-3">
                                <img src="http://smm.loc/frontend/img/_src/twitter.svg" alt="Твиттер" class="color-normal-3">
                            </a>
                            <a href="index.html#" class="back-4">
                                <img src="http://smm.loc/frontend/img/_src/vk.svg" alt="Вк" class="color-normal-4">
                            </a>
                            <a href="index.html#" class="back-5">
                                <img src="http://smm.loc/frontend/img/_src/youtube.svg" alt="Ютуб" class="color-normal-5">
                            </a>
                            <a href="index.html#" class="back-6">
                                <img src="http://smm.loc/frontend/img/_src/telegram.svg" alt="Телеграм" class="color-normal-6">
                            </a>
                            <a href="index.html#" class="back-7">
                                <img src="http://smm.loc/frontend/img/_src/facebook.svg" alt="Фэйсбук" class="color-normal-7">
                            </a>
                        </div>
                    </div>
                </div>


                <div class="data__project">
                    <div class="item__data">
                        <div class="data__text">
                            Оплаченные
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На проверке
                        </div>
                        <span class="data_shifr red__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На доработке
                        </div>
                        <span class="data_shifr black__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            Приступившие авторы
                        </div>
                        <span class="data_shifr blue__data">50</span>
                    </div>

                    <div class="item__data top__border">
                        <div class="data__text">
                            Завершено
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="last__work">
                        <div class="work__text">
                            Последняя работа:
                        </div>

                        <div class="work__under">
                            10 сентября 2020г <br>09:27:13
                        </div>
                    </div>
                </div>

                <div class="tariph__project">
                    <div class="tariph__title">
                        от 500 символов
                    </div>

                    <div class="tariph__usd">
                        0.16 USD
                    </div>

                    <div class="tariph__btn">
                        <a href="#">Оплатить</a>
                    </div>

                    <div class="tariph__icon">
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>2</span></div>
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>5</span></div>
                    </div>
                    <div class="tariph__flag">
                        <span><img src="http://smm.loc/frontend/img/_src/flag__tariph.png" alt="flag__tariph"></span>
                    </div>
                </div>

                <div class="actions__project">
                    <ul class="actions__icons">
                        <li><img src="http://smm.loc/frontend/img/_src/action1.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action2.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action3.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action4.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action5.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action6.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action7.png" alt="action"></li>
                    </ul>

                    <span class="vip__span">vip</span>

                    <div class="action__describe">
                        до 10 сентября 2021 года
                    </div>

                    <div class="enter__btn">
                        <a href="#"><span><img src="http://smm.loc/frontend/img/_src/zapusk__img.png" alt="zapusk__img"></span>Запустить</a>
                    </div>

                    <div class="absolute__checkbox">
                        <label for="choose__check3">Выбрать<input type="checkbox" id="choose__check3"></label>
                    </div>
                </div>
            </div>



            <div class="project__item red__project">
                <div class="describe__project">
                    <div class="describe__id">
                        <p>ID - 7081541</p>

                        <span class="status__project block__status">Заблокированный</span>
                    </div>

                    <div class="describe__inner">
                        <div class="describe__title">Laravel Sanctum</div>
                        <p class="paragraph__describe">
                            Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of
                        </p>

                        <div class="zametka__title">
                            Заметка
                        </div>
                        <p class="paragraph__describe">
                            Группа: Нет группы
                        </p>

                        <div class="name-social name-social-1">
                            <a href="index.html#" class="back-1">
                                <img src="http://smm.loc/frontend/img/_src/gmail.svg" alt="Гмаил" class="color-normal-1">
                            </a>
                            <a href="index.html#" class="back-2">
                                <img src="http://smm.loc/frontend/img/_src/instagram.svg" alt="Инстаграм" class="color-normal-2">
                            </a>
                            <a href="index.html#" class="back-3">
                                <img src="http://smm.loc/frontend/img/_src/twitter.svg" alt="Твиттер" class="color-normal-3">
                            </a>
                            <a href="index.html#" class="back-4">
                                <img src="http://smm.loc/frontend/img/_src/vk.svg" alt="Вк" class="color-normal-4">
                            </a>
                            <a href="index.html#" class="back-5">
                                <img src="http://smm.loc/frontend/img/_src/youtube.svg" alt="Ютуб" class="color-normal-5">
                            </a>
                            <a href="index.html#" class="back-6">
                                <img src="http://smm.loc/frontend/img/_src/telegram.svg" alt="Телеграм" class="color-normal-6">
                            </a>
                            <a href="index.html#" class="back-7">
                                <img src="http://smm.loc/frontend/img/_src/facebook.svg" alt="Фэйсбук" class="color-normal-7">
                            </a>
                        </div>
                    </div>
                </div>


                <div class="data__project">
                    <div class="item__data">
                        <div class="data__text">
                            Оплаченные
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На проверке
                        </div>
                        <span class="data_shifr red__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            На доработке
                        </div>
                        <span class="data_shifr black__data">50</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            Приступившие авторы
                        </div>
                        <span class="data_shifr blue__data">50</span>
                    </div>

                    <div class="item__data top__border">
                        <div class="data__text">
                            Завершено
                        </div>
                        <span class="data_shifr green__data">50</span>
                    </div>

                    <div class="last__work">
                        <div class="work__text">
                            Последняя работа:
                        </div>

                        <div class="work__under">
                            10 сентября 2020г <br>09:27:13
                        </div>
                    </div>
                </div>

                <div class="tariph__project">
                    <div class="tariph__title">
                        от 500 символов
                    </div>

                    <div class="tariph__usd">
                        0.16 USD
                    </div>

                    <div class="tariph__btn">
                        <a href="#">Оплатить</a>
                    </div>

                    <div class="tariph__icon">
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>2</span></div>
                        <div class="icon__tariph"><img src="http://smm.loc/frontend/img/_src/icon__tariph1.png" alt="icon__tariph"><span>5</span></div>
                    </div>
                    <div class="tariph__flag">
                        <span><img src="http://smm.loc/frontend/img/_src/flag__tariph.png" alt="flag__tariph"></span>
                    </div>
                </div>

                <div class="actions__project">
                    <ul class="actions__icons">
                        <li><img src="http://smm.loc/frontend/img/_src/action1.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action2.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action3.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action4.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action5.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action6.png" alt="action"></li>
                        <li><img src="http://smm.loc/frontend/img/_src/action7.png" alt="action"></li>
                    </ul>

                    <span class="vip__span">vip</span>

                    <div class="action__describe">
                        до 10 сентября 2021 года
                    </div>

                    <div class="enter__btn">
                        <a href="#"><span><img src="http://smm.loc/frontend/img/_src/zapusk__img.png" alt="zapusk__img"></span>Запустить</a>
                    </div>

                    <div class="absolute__checkbox">
                        <label for="choose__check4">Выбрать<input type="checkbox" id="choose__check4"></label>
                    </div>
                </div>
            </div>
        </div>
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
                <a href="index.html"><img src="http://smm.loc/frontend/img/_src/logo.png" alt="logo"></a>
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
