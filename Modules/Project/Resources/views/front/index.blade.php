@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__top">
        <div class="project__title">
            @lang('project::all_users.projects')
        </div>
        @role('client')
        <ul class="project__top__menu">
            <li><a href="#">@lang('project::all_users.project_groups')</a></li>
            <li><a href="#">@lang('project::all_users.authors_blacklist')</a></li>
            <li><a href="#">@lang('project::all_users.author_teams')</a></li>
            <li><a href="#" class="btn__top-menu green__btntop">@lang('project::all_users.your_manager')</a></li>
            <li><a href="{{ route('client.projects.create') }}" class="btn__top-menu red__btntop">@lang('project::all_users.add_projects')</a></li>
        </ul>
        @endrole
    </div>

    @if(!empty($projects) && count($projects))
        <div class="project__top2">
            @if(!empty($projects->group))
                <div class="control__input">

                    <select class="custom-select sources" placeholder="Все группы" id="">
                        <option value="Группа1">Группа1</option>
                        <option value="Группа2">Группа2</option>
                        <option value="Группа3">Группа3</option>
                        <option value="Группа4">Группа4</option>
                    </select>
                </div>
            @endif
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
                    <input type="text" placeholder="ID, название проекта или тариф">
                    <span>
                        <button type="submit">
                            <img src="{{ asset('img/_src/magnifying-glass.svg') }}" width="16" alt="search__project">
                        </button>
                    </span>
                </div>
            </div>

            <div class="control__input">
                <input style="width: 12px;" type="checkbox" class="allcheckbox" id="all__project__check">
                <label for="all__project__check" class="all__label__input"><span class="for__label">Выбрать все проекты</span>
                </label>
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
                <div class="text__flex"><span><img src="img/_src/standing-up-man-.svg" width="22" alt="man__icon"></span>Приступившие авторы:</div>
                <div class="text__cifra blue__data">150</div>
            </div>
        </div>

        <div class="desc__project__item">
            <ul class="desc__ul">
                <li><span><img src="img/_src/desc__icon1.svg" width="15"></span>Описание</li>
                <li><span><img src="img/_src/flag.svg"></span>Данные по проекту</li>
                <li><span><img src="img/_src/tag.svg"></span>Тариф</li>
                <li><span><img src="img/_src/equalizer.svg"></span>Действия</li>
            </ul>
        </div>
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
            <div class="pagination-wrapper mb-5">
                {{ $projects->appends(Request::except('page'))->links('mainpage::vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif

@endsection
