@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__top">
        <div class="project__title">
            Мои проекты
        </div>
        @role('client')
        <ul class="project__top__menu">
            <li><a href="#">Группы проектов</a></li>
            <li><a href="#">Черный список авторов</a></li>
            <li><a href="#">Команды авторов</a></li>
            <li><a href="#" class="btn__top-menu green__btntop">Ваш менеджер</a></li>
            <li><a href="{{ route('client.projects.create') }}" class="btn__top-menu red__btntop">Создать проект</a></li>
        </ul>
        @endrole
    </div>

    @if(!empty($projects) && count($projects))
        <div class="all__project">
            @foreach($projects as $project)
                <div class="project__item green__project">
                    <div class="describe__project">
                        <div class="describe__id">
                            <p>ID - 7081541</p>

                            <span class="status__project active__status">Активный</span>
                        </div>

                        <div class="describe__inner">
                            <a href="{{ route('client.projects.show', $project->id) }}" class="describe__title">{{ $project->title }}</a>
                            <p class="paragraph__describe">
                                {{ $project->small_description }}
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

                <tr>
                    <td><a href="{{ route('client.projects.show', $project->id) }}">{{ $project->title }}</a></td>
                    <td>7.00</td>
                    <td>30 минут</td>
                    <td>0/5</td>
                    <td class="d-none d-md-table-cell">
                        {{ $project->date_start }}
                    </td>
                </tr>
            @endforeach
        </div>
    @endif

@endsection

@section('top-footer')
    @if(!empty($projects) && count($projects))
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

    @endif
@endsection
