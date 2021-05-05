@extends('mainpage::layouts.front.app')

@section('content')

    <div class="project__title">
        Создание нового проекта
    </div>


    <nav class="create__project__navigation">
        <ul>
            <li class="proj_nav_item active__nav first__open">Основные</li>
            <li class="proj_nav_item second__open">Дополнительные</li>
            <li class="proj_nav_item third__open">Ограничения</li>
            <li class="proj_nav_item fourth__open">Страницы</li>
            <li class="proj_nav_item fifth__open">Геотаргетинг</li>
            <li class="proj_nav_item sixth__open">Требования к аккаунтам</li>
        </ul>
    </nav>

    <div class="new__of__navigation first__navigation">
        <form action="/">
            <div class="inner__new__navigation">
                <div class="left__main__nav" style="width: 411px;">
                    <div class="main__select__item">
                        <p>Название *</p>
                        <select class="custom-select sources" placeholder="project 1" id="">
                            <option value="Группа1">Группа1</option>
                            <option value="Группа2">Группа2</option>
                            <option value="Группа3">Группа3</option>
                            <option value="Группа4">Группа4</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Тематика * <span class="red__validate"><span>Внимание!</span> Вы не выбрали тематику проекта</span></p>
                        <select class="custom-select sources validate__input" placeholder="Азартные игры" id="">
                            <option value="Азартные игры1">Азартные игры1</option>
                            <option value="Азартные игры2">Азартные игры2</option>
                            <option value="Азартные игры3">Азартные игры3</option>
                            <option value="Азартные игры4">Азартные игры4</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Язык комментариев * <span class="red__validate"><span>Внимание!</span> Вы не выбрали язык</span></p>
                        <select class="custom-select sources validate__input" placeholder="Язык" id="">
                            <option value="Русский">Русский</option>
                            <option value="Украинский">Украинский</option>
                            <option value="Английский">Английский</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Задание авторам</p>
                        <textarea name="" id="" placeholder="Опипише задание как можно подробнее"></textarea>
                    </div>

                    <div class="choose__file">
                        <label class="filelabel">
                            <img src="img/_src/choose__file.svg" alt="choose__file">
                            <span class="title">
									        Add File
									    </span>
                            <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file">
                        </label>
                        <span>Размер файла не более 10 Мбайт</span>
                    </div>
                </div>


                <div class="right__main__nav" style="width: 555px; margin-top: 55px!important;">
                    <div class="first__right">
                        <div class="main__select__item">
                            <p>Валюта для оплаты *</p>
                            <select class="custom-select sources" placeholder="0.00 RUB" id="">
                                <option value="1753.35 RUB">1753.35 RUB</option>
                                <option value="3155.75 RUB">3155.75 RUB</option>
                                <option value="343.22 RUB">343.22 RUB</option>
                            </select>
                        </div>

                        <div class="main__select__item">
                            <p>Тариф *</p>
                            <select class="custom-select sources" placeholder="Выберите тариф" id="">
                                <option value="Тариф1">Тариф1</option>
                                <option value="Тариф2">Тариф2</option>
                                <option value="Тариф3">Тариф3</option>
                                <option value="Тариф4">Тариф4</option>
                            </select>
                        </div>

                        <div class="main__select__item">
                            <p>Премодерация комментариев *</p>
                            <select class="custom-select sources" placeholder="Авторы публикуют сразу на ваш сайт" id="">
                                <option value="Автор1">Автор1</option>
                                <option value="Автор2">Автор2</option>
                                <option value="Автор3">Автор3</option>
                                <option value="Автор4">Автор4</option>
                            </select>
                        </div>

                        <div class="checkbox__main">

                            <div class="big__main__nav">
                                <input type="checkbox" id="main__check1">
                                <label for="main__check1">Разрешить комментарии меньшего размера</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="main__check2">
                                <label for="main__check2">Требовать скриншот от автора ( + 1 RUB )</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="main__check3">
                                <label for="main__check3">Только для верифицированных авторов ( + 5 RUB )</label>
                            </div>
                        </div>
                    </div>

                    <div class="second__right">
                        <ul class="second__numeration">
                            <li><span>5.6</span>Запрещено требовать в задании репост и комментарий в одном проекте. Для этого создаются разные проекты и оплачиваются отдельно.</li>

                            <li><span>5.7</span>Запрещено требовать больше символов в комментарии, чем указано в выбранном тарифе. При необходимости дополнительного количества символов, заказчик обязывается установить надбавку.</li>

                            <li><span>5.8</span>Если на сайте необходима активация аккаунта, посредством СМС, то заказчик обязывается указать это в задании и установить надбавку к стоимости комментария.</li>

                            <li><span>5.9</span>Запрещено создавать проекты, затрагивающие политические темы.</li>

                            <li><span>5.10</span>Для требования скриншота выполненной работы, Заказчик обязуется использовать соответствующую опцию в настройках проекта.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="create__project__btn" >
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>

    <div class="new__of__navigation second__navigation">
        <form action="/">
            <div class="inner__new__navigation">
                <div class="left__main__nav" style="width: 400px;">
                    <div class="main__select__item">
                        <p>Группа</p>
                        <select class="custom-select sources" placeholder="Без группы" id="">
                            <option value="Группа1">Группа1</option>
                            <option value="Группа2">Группа2</option>
                            <option value="Группа3">Группа3</option>
                            <option value="Группа4">Группа4</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Команда авторов</p>
                        <select class="custom-select sources" placeholder="Выберите команду" id="">
                            <option value="Команда1">Команда1</option>
                            <option value="Команда3">Команда3</option>
                            <option value="Команда2">Команда2</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Логин автора</p>
                        <input class="main__input__other" type="text" placeholder="Логин / Email">
                    </div>

                    <div class="main__select__item">
                        <p>Уведомления о новых заявках</p>
                        <select class="custom-select sources" placeholder="Получать уведомления" id="">
                            <option value="уведомления1">уведомления1</option>
                            <option value="уведомления2">уведомления2</option>
                            <option value="уведомления3">уведомления3</option>
                        </select>
                    </div>


                    <div class="first__right first__for__margin">
                        <div class="main__select__item">
                            <p>Отложенный запуск проекта</p>

                            <div class="with__hint__input">
                                <input class="main__input__other" type="text" placeholder="Например: 2021/02/08 10:00:00">

                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>
                        </div>
                        <div class="main__select__item">
                            <p>Время, в которое проект будет приостановлен</p>
                            <div class="with__hint__input">

                                <input class="main__input__other" type="text" placeholder="Например: 2021/02/08 10:00:00">

                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="right__main__nav" style="width: 560px; margin-top: 50px!important;">
                    <div class="first__right">
                        <h3>Уведомления на почту</h3>
                        <div class="checkbox__main" style="margin-top: 21px;">
                            <div class="big__main__nav">
                                <input type="checkbox" id="review">
                                <label for="review">Отзывы</label>
                            </div>


                            <div class="big__main__nav">
                                <input type="checkbox" id="question">
                                <label for="question">Вопросы</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="yes">
                                <label for="yes">Положительные</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="dontknow">
                                <label for="dontknow">Нейтральные</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="dontknow2">
                                <label for="dontknow2">Отрицательные</label>
                            </div>

                            <div class="big__main__nav">
                                <input type="checkbox" id="answer">
                                <label for="answer">Ответы</label>
                            </div>
                        </div>
                    </div>

                    <div class="second__right">
                        <ul class="second__numeration">
                            <li><span>Пункт правил 5.13:</span> Запрещено заказывать негативные отзывы и оценки с целью ухудшения репутации 3-х лиц.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="create__project__btn" style="margin-top: 60px;">
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>

    <div class="new__of__navigation third__navigation">
        <form action="/">
            <div class="main__third__nav">
                <div class="new__navigation__title">
                    Активность проекта
                </div>

                <div class="active__inner">
                    <div class="active__project">
                        <p>Группа</p>
                        <div class="label__week">

                            <div class="week__item">
                                <input type="checkbox" id="monday">
                                <label for="monday">
                                    <span>Пн</span>
                                </label>
                            </div>


                            <div class="week__item">
                                <input type="checkbox" id="tuesday">
                                <label for="tuesday">
                                    <span>Вт</span>
                                </label>
                            </div>

                            <div class="week__item">
                                <input type="checkbox" id="wednesday">
                                <label for="wednesday">
                                    <span>Ср</span>
                                </label>
                            </div>


                            <div class="week__item">
                                <input type="checkbox" id="thursday">
                                <label for="thursday">
                                    <span>Чт</span>
                                </label>
                            </div>


                            <div class="week__item">
                                <input type="checkbox" id="friday">
                                <label for="friday">
                                    <span>Пт</span>
                                </label>
                            </div>

                            <div class="week__item">
                                <input type="checkbox" id="saturday">
                                <label for="saturday">
                                    <span>Сб</span>
                                </label>
                            </div>


                            <div class="week__item">
                                <input type="checkbox" id="sunday">
                                <label for="sunday">
                                    <span>Нд</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="active__project">
                        <p>Часы активности</p>
                        <div class="time__active">
                            с <input type="text" placeholder="00:00:00"> до <input type="text" placeholder="00:00:00">
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>
                    </div>
                </div>



                <div class="limit__inner">
                    <div class="new__navigation__title">
                        Лимиты
                    </div>
                    <div class="inner__kolvo">
                        <div class="kolvo__text">
                            <span>Максимальное кол-во</span>
                            <span>Случайное кол-во</span>
                        </div>

                        <div class="kolvo__input">
                            Кол-во работ <input type="text"> за <input type="text"> дней
                        </div>
                    </div>

                    <div class="inner__kolvo">
                        <div class="kolvo__text kolvo__text2">
                            <span>Задержка между работами (в мин.)</span>
                        </div>

                        <div class="kolvo__input">
                            От <input type="text"> До <input type="text">
                        </div>
                    </div>
                </div>


                <div class="main__select__item">
                    <div class="paragraph__div">
                        Лимит в час
                        <span class="hint">?</span>
                        <div class="text__hint">
                            Подсказка
                        </div>
                    </div>

                    <input class="main__input__other" type="text" placeholder="0">
                </div>

                <div class="main__select__item">
                    <div class="paragraph__div">
                        Лимит на страницу
                        <span class="hint">?</span>
                        <div class="text__hint">
                            Подсказка
                        </div>
                    </div>

                    <input class="main__input__other" type="text" placeholder="0">
                </div>

                <div class="main__select__item">
                    <div class="paragraph__div">
                        Лимит на страницу в сутки
                        <span class="hint">?</span>
                        <div class="text__hint">
                            Подсказка
                        </div>
                    </div>

                    <input class="main__input__other" type="text" placeholder="0">
                </div>

                <div class="limit__inner" style="margin-top: 26px;">
                    <div class="new__navigation__title" style="margin-bottom: 12px;">
                        Лимиты по авторам
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит от автора
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит в сутки от автора
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит на аккаунт
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит от автора на группу проектов
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">


                        <div class="all__project__checkbox all__check__create">
                            <input type="checkbox" id="all__project1">
                            <label for="all__project1">
                                Установить для всех проектов группы
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит в сутки от автора, на группу проектов

                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">

                        <div class="all__project__checkbox all__check__create">
                            <input type="checkbox" id="all__project2">
                            <label for="all__project2">
                                Установить для всех проектов группы
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Лимит на 1 IP
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="7">
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Максимум приступивших авторов
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">
                    </div>

                    <div class="main__select__item">
                        <div class="paragraph__div">
                            Задержка перед повторным выполнением (в мин.)
                            <span class="hint">?</span>
                            <div class="text__hint">
                                Подсказка
                            </div>
                        </div>

                        <input class="main__input__other" type="text" placeholder="3">
                    </div>
                </div>

                <div class="limit__inner">
                    <div class="new__navigation__title" style="margin-top: 27px; margin-bottom: 10px;">
                        Устройства
                    </div>

                    <div class="all__project__checkbox all__check__create other__all__project__checkbox">
                        <input type="checkbox" id="all__project3">
                        <label for="all__project3">
                            Установить для всех проектов группы
                        </label>
                        <span class="hint">?</span>
                        <div class="text__hint">
                            Подсказка
                        </div>
                    </div>
                </div>

                <div class="stop__words__block">
                    <div class="main__select__item">
                        <p>Стоп слова</p>
                        <textarea name="" id="" placeholder="Запрещённые слова (через запятую)"></textarea>

                        <div class="for__example">
                            Например: "спасибо, пожалуйста". Комментарии, в которых будут содержаться указанные слова не будут допущены на проверку.
                        </div>
                    </div>
                </div>
            </div>

            <div class="create__project__btn" style="margin-top: 45px;">
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>

    <div class="new__of__navigation fourth__navigation">
        <form action="/">
            <div class="inner__new__navigation">

                <div class="left__main__nav">
                    <div class="main__select__item">
                        <p>Список страниц, с которыми можно работать</p>
                        <textarea name="" id="" placeholder="Только прямые ссылки, каждую с новой строки"></textarea>
                    </div>
                </div>
                <div class="right__main__nav" style="
    width: 567px;
    margin-top: 50px!important;
">
                    <div class="first__right" >
                        <span class="main__information">Важная информация</span>
                        <ul class="second__numeration">

                            <li>Список страниц, с которыми можно работать. Каждую ссылку с новой строки. Другие страницы, система не пропустит в работу.</li>

                            <li>Указывайте исключительно ссылки на страницы. Если хотите указать,какие категории на сайте необходимо комментировать, то пишите это в задании автору. В поле "Ссылка на сайт или страницу" укажите ссылку на главную страницу сайта.</li>

                            <li>Если список ссылок не указан, то авторы будут самостоятельно выбирать на сайте.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="create__project__btn">
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>

    <div class="new__of__navigation fifth__navigation">
        <form action="/">
            <div class="inner__new__navigation" style="margin-top: 29px;">

                <div class="left__main__nav">
                    <div class="main__select__item">
                        <p style="margin-bottom: 15px;">Название *</p>
                        <select class="custom-select sources" placeholder="Project 1" id="">
                            <option value="Команда1">Команда1</option>
                            <option value="Команда3">Команда3</option>
                            <option value="Команда2">Команда2</option>
                        </select>
                    </div>

                    <div class="country__list">
                        <p>Список стран и городов</p>

                        <ul class="list__ul">
                            <li>
                                <div class="list__russian">
                                    <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                    Российская федерация / Москва
                                </div>

                                <span><img src="img/_src/close__list.png" alt="close__list"></span>
                            </li>

                            <li>
                                <div class="list__russian">
                                    <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                    Российская федерация / Москва
                                </div>

                                <span><img src="img/_src/close__list.png" alt="close__list"></span>
                            </li>

                            <li>
                                <div class="list__russian">
                                    <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                    Российская федерация / Москва
                                </div>

                                <span><img src="img/_src/close__list.png" alt="close__list"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right__main__nav">
                    <div class="main__select__item">
                        <p>Название *</p>
                        <select class="custom-select sources" placeholder="Project 1" id="">
                            <option value="Команда1">Команда1</option>
                            <option value="Команда3">Команда3</option>
                            <option value="Команда2">Команда2</option>
                        </select>
                    </div>


                </div>
            </div>

            <div class="create__project__btn" style="margin-top: 52px;">
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>
    <div class="new__of__navigation sixth__navigation">
        <form action="/">
            <div class="sixth__navigation__new">
                <div class="item__sixth">
                    <div class="top__sixth">
                        <div class="title__sixth">
                            Вконтакте
                        </div>
                        <div class="item__sixth__checkbox">

                            <input type="checkbox" id="checkbox__vk">
                            <label for="checkbox__vk">
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <p>Количество друзей</p>
                        <input class="main__input__other" type="text" placeholder="50">
                    </div>

                    <div class="main__select__item">
                        <p>Пол</p>
                        <select class="custom-select sources" placeholder="Не важно" id="">
                            <option value="Мужской">Мужской</option>
                            <option value="Женский">Женский</option>
                        </select>
                    </div>


                    <div class="main__select__item">
                        <p>Возраст</p>
                        <div id="slider-range" class="slider__all__range"></div>

                        <ul class="slider__summa">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <ul class="numeration__slider">
                            <li>10</li>
                            <li>33</li>
                            <li>55</li>
                            <li>78</li>
                            <li>100</li>
                        </ul>
                    </div>
                </div>

                <div class="item__sixth">
                    <div class="top__sixth">
                        <div class="title__sixth">
                            Одноклассники
                        </div>
                        <div class="item__sixth__checkbox">

                            <input type="checkbox" id="checkbox__odn">
                            <label for="checkbox__odn">
                            </label>
                        </div>

                    </div>

                    <div class="main__select__item">
                        <p>Количество друзей</p>
                        <input class="main__input__other" type="text" placeholder="70">
                    </div>

                    <div class="main__select__item">
                        <p>Пол</p>
                        <select class="custom-select sources" placeholder="Не важно" id="">
                            <option value="Мужской">Мужской</option>
                            <option value="Женский">Женский</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Возраст</p>
                        <div id="slider-range1" class="slider__all__range"></div>

                        <ul class="slider__summa">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <ul class="numeration__slider">
                            <li>10</li>
                            <li>33</li>
                            <li>55</li>
                            <li>78</li>
                            <li>100</li>
                        </ul>
                    </div>
                </div>


                <div class="item__sixth">
                    <div class="top__sixth">
                        <div class="title__sixth">
                            Facebook
                        </div>
                        <div class="item__sixth__checkbox">

                            <input type="checkbox" id="checkbox__fb">
                            <label for="checkbox__fb">
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <p>Пол</p>
                        <select class="custom-select sources" placeholder="Не важно" id="">
                            <option value="Мужской">Мужской</option>
                            <option value="Женский">Женский</option>
                        </select>
                    </div>

                    <div class="main__select__item">
                        <p>Возраст</p>
                        <div id="slider-range2" class="slider__all__range"></div>

                        <ul class="slider__summa">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <ul class="numeration__slider">
                            <li>10</li>
                            <li>33</li>
                            <li>55</li>
                            <li>78</li>
                            <li>100</li>
                        </ul>
                    </div>
                </div>

                <div class="item__sixth">
                    <div class="top__sixth">
                        <div class="title__sixth">
                            Instagram
                        </div>
                        <div class="item__sixth__checkbox">

                            <input type="checkbox" id="checkbox__inst">
                            <label for="checkbox__inst">
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <p>Количество подписчиков</p>
                        <input class="main__input__other" type="text" placeholder="50">
                    </div>
                </div>

                <div class="item__sixth">
                    <div class="top__sixth">
                        <div class="title__sixth">
                            Twitter
                        </div>
                        <div class="item__sixth__checkbox">

                            <input type="checkbox" id="checkbox__twitter">
                            <label for="checkbox__twitter">
                            </label>
                        </div>
                    </div>

                    <div class="main__select__item">
                        <p>Количество фолловеров</p>
                        <input class="main__input__other" type="text" placeholder="50">
                    </div>
                </div>
            </div>

            <div class="all__check__create">
                <input type="checkbox" id="disable_check">
                <label for="disable_check" class="disable_check">
                    Отключить проверку
                </label>
            </div>

            <div class="create__project__btn">
                <a href="#"><span><img src="img/_src/create__project__icon.svg" alt="create__project__icon"></span>Создать проект</a>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        // 숫자 3자리마다 콤마 찍기
        function numberWithCommas(x) {
            if (x !== null) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }

        $(function() {
            //slider range init set
            $( "#slider-range" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            //slider range data tooltip set
            var $handler = $("#slider-range .ui-slider-handle");

            $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });


        $(function() {
            //slider range init set
            $( "#slider-range1" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            //slider range data tooltip set
            var $handler = $("#slider-range1 .ui-slider-handle");

            $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range1" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range1" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });


        $(function() {
            //slider range init set
            $( "#slider-range2" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            //slider range data tooltip set
            var $handler = $("#slider-range2 .ui-slider-handle");

            $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });

    </script>
@endsection
