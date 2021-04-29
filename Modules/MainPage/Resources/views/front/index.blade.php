@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__top">
        <div class="project__title">
            Проекты
        </div>
        @role('client')
        <ul class="project__top__menu">
            <li><a href="#">Группы проектов</a></li>
            <li><a href="#">Черный список авторов</a></li>
            <li><a href="#">Команды авторов</a></li>
            <li><a href="#" class="btn__top-menu green__btntop">Ваш менеджер</a></li>
            <li><a href="{{ route('client.projects.index') }}" class="btn__top-menu red__btntop">Создать проект</a></li>
        </ul>
        @endrole
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

    @if(count($projects))
        <div class="all__project">
            @foreach($projects as $project)
                <div class="project__item green__project">
                    <div class="describe__project">
                        <div class="describe__id">
                            <p>ID - {{ $project->id }}</p>
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
            @endforeach
                <div class="pagination-wrapper mb-5">
                    {{ $projects->links('pagination::simple-default') }}
                </div>
        </div>
    @endif
@endsection
