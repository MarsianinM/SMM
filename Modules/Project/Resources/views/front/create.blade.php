@extends('mainpage::layouts.front.app')


@section('content')
    <style>
        .information-line {
            margin: 40px 0 45px;
        }

        .information-line.line-n-margin {
            margin-bottom: 15px;
        }

        .pull-right {
            float: right !important;
        }

        .extra-line-switch ul {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .extra-line-switch ul li {
            display: inline-block;
        }

        .extra-line-switch ul li a {
            padding: 4px 8px;
            margin-right: 20px;
        }

        .extra-line-switch ul li.active a, .extra-line-switch ul li a:hover {
            background: #dadada;
            color: #3d3d3d;
        }

        .tab_content {
            display: none;
        }

        .edit-persona {
            width: 49%;
            float: left;
            margin-top: 15px;
            font-family: Verdana;
        }

        .notice {
            width: 49%;
            font-size: 12px;
            margin-top: 15px;
            font-family: Verdana;
        }

        .wall {
            background: #e9e9e9;
            font: 12px Verdana;
            padding: 16px 24px 24px;
            line-height: 22px;
            width: 100%;
            margin-bottom: 75px;
            color: #4d4d4d;
        }

        .edit-persona + .notice .wall, .wall-no-margin {
            margin-bottom: 25px;
        }
    </style>

    <style>
        .dd-select {
            background: white !important;
            border: 1px solid #e9e9e9 !important;
            border-radius: 0 !important;
        }

        .dd-pointer.dd-pointer-down {
            border: none !important;
            border-left: 1px solid #e9e9e9 !important;
            height: 36px !important;
            right: 1px !important;
            top: 3px !important;
            width: 33px !important;
            background: rgba(0, 0, 0, 0) url("/css/chosen-sprite.png") no-repeat scroll 11px 8px !important;
        }

        .dd-pointer.dd-pointer-down.dd-pointer-up {
            border: none !important;
            border-left: 1px solid #e9e9e9 !important;
            height: 36px !important;
            right: 1px !important;
            top: 7px !important;
            width: 33px !important;
            background: rgba(0, 0, 0, 0) url("/css/chosen-sprite.png") no-repeat scroll 11px -13px !important;
        }

        .dd-select .dd-selected-text {
            line-height: 23px !important;
            margin-bottom: 0 !important;
        }

        .dd-select .dd-option-image, .dd-selected-image {
            height: 21px !important;
        }

        .dd-select .dd-option-text {
            line-height: 21px !important;
            margin-bottom: 0 !important;
        }

        .dd-option-text {
            line-height: 20px !important;
            margin-bottom: 0 !important;
        }

        .dd-option-image, .dd-selected-image {
            height: 21px !important;
        }

        .dd-select .dd-selected {
            line-height: 23px !important;
            margin-bottom: 0 !important;
            padding: 6px !important;
        }

        .dd-options li {
            margin-bottom: 0 !important;
        }

        .dd-option {
            padding: 5px !important;
            z-index: 1 !important;
        }

        .dd-select, .dd-container, .dd-options {
            width: 216px !important;
        }

        .dd-options {
            z-index: 1 !important;
        }

        a.dd-selected {
            color: inherit;
            font-weight: inherit;
        }
    </style>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#newProject_currency_id').ddslick({
                    imagePosition: "left",
                    selectText: "",
                    onSelected: function (data) {
                        $('div.newProject_currency_id .dd-selected-value').attr('name', 'newProject_currency_id[currency_id]');
                        changeCurrency(data);
                    }
                });
            })
        })
    </script>
    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">@lang('project::client.create_project_title')</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        <form action="">
                            <div id="step_2" class="form" style="display:block">
                                <div class="container">
                                    <div class="information-line clearfix line-n-margin">
                                        <div class="head_author_line pull-left">
                                            Создание нового проекта
                                        </div>
                                        <div class="pull-right" style="margin-top:10px"><a href="#" id="backGtype">←
                                                назад к выбору типа</a></div>
                                    </div>
                                    <div class="extra-line-switch clearfix">
                                        <ul>
                                            <li class="active"><a href="#tab_1" id="forerrors1">Основные</a></li>
                                            <li><a href="#tab_2" id="forerrors2">Дополнительные</a></li>
                                            <li><a href="#tab_3" id="forerrors3">Ограничения </a></li>
                                            <li><a href="#tab_4" id="forerrors4">Страницы</a></li>
                                            <li><a href="#tab_5" id="forerrors5">Геотаргетинг</a></li>
                                            <li id="settingParams">
                                                <a id="forerrors6" href="#tab_6">
                                                    Требования к аккаунтам
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tabs">
                                        <div id="tab_1" class="tab_content" style="display: block">
                                            <article class="edit-persona">
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_Copy" style="margin-bottom:9px">Скопировать
                                                        настройки проекта</label>
                                                    <select id="doCopy" name="ProjectForm_Copy">
                                                    </select>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_title" class="required">Название <span
                                                            class="required">*</span></label> <input
                                                        placeholder="название видно авторам" name="ProjectForm[title]"
                                                        id="ProjectForm_title" type="text" maxlength="150" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_title_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_url">Ссылка на сайт или страницу</label>
                                                    <input
                                                        placeholder="ссылка на сайт или отдельную страницу, с http://"
                                                        name="ProjectForm[url]" id="ProjectForm_url" type="text"
                                                        maxlength="1000" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_url_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_subjects" class="required">Тематика <span
                                                            class="required">*</span></label> <select
                                                        name="ProjectForm[subjects]" id="ProjectForm_subjects">
                                                        <option value="49">Азартные игры</option>
                                                        <option value="1">Блог</option>
                                                        <option value="2">Интернет магазин</option>
                                                        <option value="44">Форум</option>
                                                        <option value="0">Универсальная</option>
                                                        <option value="3">Hi-Tech</option>
                                                        <option value="8">Автомобили</option>
                                                        <option value="9">Банки</option>
                                                        <option value="10">Безопасность</option>
                                                        <option value="11">Бухгалтерия</option>
                                                        <option value="12">Города и регионы</option>
                                                        <option value="13">Государство</option>
                                                        <option value="6">Дом и семья</option>
                                                        <option value="14">Знакомства и общение</option>
                                                        <option value="15">Игры</option>
                                                        <option value="16">Интернет</option>
                                                        <option value="17">Кино</option>
                                                        <option value="18">Компьютеры</option>
                                                        <option value="19">Консалтинг</option>
                                                        <option value="20">Культура и искусство</option>
                                                        <option value="21">Литература</option>
                                                        <option value="22">Медицина</option>
                                                        <option value="7">Музыка</option>
                                                        <option value="46">Мода и красота</option>
                                                        <option value="23">Наука и техника</option>
                                                        <option value="24">Недвижимость</option>
                                                        <option value="25">Новости и СМИ</option>
                                                        <option value="48">Охота и рыбалка</option>
                                                        <option value="26">Политика</option>
                                                        <option value="27">Предприятия</option>
                                                        <option value="50">Продукты питания</option>
                                                        <option value="28">Промышленность</option>
                                                        <option value="29">Путешествия</option>
                                                        <option value="4">Работа</option>
                                                        <option value="30">Развлечения</option>
                                                        <option value="31">Реклама</option>
                                                        <option value="32">Связь</option>
                                                        <option value="33">Софт</option>
                                                        <option value="34">Спорт</option>
                                                        <option value="35">Справки</option>
                                                        <option value="36">Страхование</option>
                                                        <option value="37">Строительство</option>
                                                        <option value="38">Телевидение</option>
                                                        <option value="45">Туризм</option>
                                                        <option value="39">Товары и услуги</option>
                                                        <option value="5">Учеба</option>
                                                        <option value="40">Финансы</option>
                                                        <option value="41">Флора и фауна</option>
                                                        <option value="42">Фото</option>
                                                        <option value="43">Юмор</option>
                                                        <option value="51">Юриспруденция</option>
                                                        <option value="47">Контент для взрослых (18+)</option>
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_subjects_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" id="rowLanguage"
                                                     style="margin-bottom:23px">
                                                    <label for="ProjectForm_language_id" class="required">Язык
                                                        комментариев <span class="required">*</span></label> <select
                                                        name="ProjectForm[language_id]" id="ProjectForm_language_id">
                                                        <option value="0">Русский</option>
                                                        <option value="1">Английский</option>
                                                        <option value="2">Украинский</option>
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_language_id_em_"
                                                         style="display:none"></div>
                                                </div>
                                            </article>
                                            <!--FINANCE BLOCK-->
                                            <article class='notice pull-right'>
                                                <div class="wall">
                                                    <div class="row">
                                                        <label class="required" for="ProjectForm_tarif_id">Валюта для
                                                            оплаты</label>
                                                        <div borderColor="#e9e9e9" backgroundColor="white" width="216px"
                                                             id="yw0">
                                                            <div class="portlet-content">
                                                                <div class="newProject_currency_id">
                                                                    <select id="newProject_currency_id"
                                                                            name="newProject_currency_id[currency_id]"
                                                                            class="languageSelect" style="width:216px">
                                                                        <option selected
                                                                                data-imagesrc="/img/currency/1.png"
                                                                                value="1">0.00 RUB
                                                                        </option>
                                                                        <option data-imagesrc="/img/currency/2.png"
                                                                                value="2">0.00 $
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row control-group" style="margin-bottom:20px">
                                                        <div style="float:right">
                                                            <a href="/choose" style="font-size:10px" target="_blank">Как
                                                                выбрать тариф?</a>
                                                        </div>
                                                        <label for="ProjectForm_tarif_id" class="required">Тариф <span
                                                                class="required">*</span></label> <select
                                                            id="ProjectForm_tarif_id" name="ProjectForm[tarif_id]"
                                                            data-placeholder="Выберите тариф">
                                                        </select>
                                                        <div id="list_tarifs" style="display: none;">
                                                            <option></option>
                                                            <optgroup
                                                                label="Комментарии и отзывы без регистрации (Cackle, HyperComments, Disqus и другие)"
                                                                data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.15"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="166"
                                                                        data-price="0"
                                                                        data-group_id="1"
                                                                        class='mix' value="268">Микс без регистрации
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="9.9"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="166"
                                                                        data-price="0"
                                                                        data-group_id="1"
                                                                        class='mix' value="166">Микс без регистрации
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="5.4"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="39"
                                                                        data-price="2.75"
                                                                        data-group_id="1"
                                                                        value="39">Микро 5.4 RUB (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.08"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="39"
                                                                        data-price="0.04"
                                                                        data-group_id="1"
                                                                        value="222">Микро 0.08 $ (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="9.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="1"
                                                                        data-price="4.5"
                                                                        data-group_id="1"
                                                                        value="1">Мини 9.2 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.14"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="1"
                                                                        data-price="0.07"
                                                                        data-group_id="1"
                                                                        value="190">Мини 0.14 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="12.2"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="2"
                                                                        data-price="6"
                                                                        data-group_id="1"
                                                                        value="2">Стандартный 12.2 RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.19"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="2"
                                                                        data-price="0.09"
                                                                        data-group_id="1"
                                                                        value="191">Стандартный 0.19 $ (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="22.2"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="10"
                                                                        data-price="10.5"
                                                                        data-group_id="1"
                                                                        value="10">Максимум 22.2 RUB (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.34"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="10"
                                                                        data-price="0.16"
                                                                        data-group_id="1"
                                                                        value="197">Максимум 0.34 $ (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.7"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="23"
                                                                        data-price="0.31"
                                                                        data-group_id="1"
                                                                        value="208">Супер 0.7 $ (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="45.8"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="23"
                                                                        data-price="20"
                                                                        data-group_id="1"
                                                                        value="23">Супер 45.8 RUB (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="91.6"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="1"
                                                                        data-original_id="45"
                                                                        data-price="40"
                                                                        data-group_id="1"
                                                                        value="45">Мега 91.6 RUB (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="1.41"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="2"
                                                                        data-original_id="45"
                                                                        data-price="0.62"
                                                                        data-group_id="1"
                                                                        value="228">Мега 1.41 $ (2000 симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Комментарии и отзывы с регистрацией"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="167"
                                                                        data-price="0"
                                                                        data-group_id="2"
                                                                        class='mix' value="167">Микс+Регистрация
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="167"
                                                                        data-price="0"
                                                                        data-group_id="2"
                                                                        class='mix' value="269">Микс+Регистрация
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.17"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="40"
                                                                        data-price="0.08"
                                                                        data-group_id="2"
                                                                        value="223">Микро+Регистрация 0.17 $ (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="11.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="40"
                                                                        data-price="5"
                                                                        data-group_id="2"
                                                                        value="40">Микро+Регистрация 11.1 RUB (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.28"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="3"
                                                                        data-price="0.14"
                                                                        data-group_id="2"
                                                                        value="192">Мини+Регистрация 0.28 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="18.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="3"
                                                                        data-price="9"
                                                                        data-group_id="2"
                                                                        value="3">Мини+Регистрация 18.2 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="21.8"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="4"
                                                                        data-price="10.5"
                                                                        data-group_id="2"
                                                                        value="4">Стандартный+Регистрация 21.8 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.34"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="4"
                                                                        data-price="0.16"
                                                                        data-group_id="2"
                                                                        value="193">Стандартный+Регистрация 0.34 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.47"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="11"
                                                                        data-price="0.23"
                                                                        data-group_id="2"
                                                                        value="198">Максимум+Регистрация 0.47 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="30.7"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="11"
                                                                        data-price="15"
                                                                        data-group_id="2"
                                                                        value="11">Максимум+Регистрация 30.7 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.74"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="24"
                                                                        data-price="0.37"
                                                                        data-group_id="2"
                                                                        value="209">Супер+Регистрация 0.74 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="48"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="24"
                                                                        data-price="24"
                                                                        data-group_id="2"
                                                                        value="24">Супер+Регистрация 48 RUB (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="92"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="1"
                                                                        data-original_id="46"
                                                                        data-price="44"
                                                                        data-group_id="2"
                                                                        value="46">Мега+Регистрация 92 RUB (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="1.42"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="2"
                                                                        data-original_id="46"
                                                                        data-price="0.68"
                                                                        data-group_id="2"
                                                                        value="229">Мега+Регистрация 1.42 $ (2000 симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Наполнение форума"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="168"
                                                                        data-price="0"
                                                                        data-group_id="3"
                                                                        class='mix' value="270">Наполнение форума Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="168"
                                                                        data-price="0"
                                                                        data-group_id="3"
                                                                        class='mix' value="168">Наполнение форума Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="6"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="42"
                                                                        data-price="3"
                                                                        data-group_id="3"
                                                                        value="42">Наполнение форума Микро 6 RUB (75
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.09"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="42"
                                                                        data-price="0.05"
                                                                        data-group_id="3"
                                                                        value="225">Наполнение форума Микро 0.09 $ (75
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="10.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="25"
                                                                        data-price="5"
                                                                        data-group_id="3"
                                                                        value="25">Наполнение форума Мини 10.2 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.16"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="25"
                                                                        data-price="0.08"
                                                                        data-group_id="3"
                                                                        value="210">Наполнение форума Мини 0.16 $ (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.2"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="13"
                                                                        data-price="0.1"
                                                                        data-group_id="3"
                                                                        value="199">Наполнение форума Стандарт 0.2 $
                                                                    (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="12.8"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="13"
                                                                        data-price="6.5"
                                                                        data-group_id="3"
                                                                        value="13">Наполнение форума Стандарт 12.8 RUB
                                                                    (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.22"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="49"
                                                                        data-price="0.17"
                                                                        data-group_id="3"
                                                                        value="232">Наполнение форума Максимум 0.22 $
                                                                    (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="14.6"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="49"
                                                                        data-price="11"
                                                                        data-group_id="3"
                                                                        value="49">Наполнение форума Максимум 14.6 RUB
                                                                    (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.63"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="50"
                                                                        data-price="0.32"
                                                                        data-group_id="3"
                                                                        value="233">Наполнение форума Супер 0.63 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="41"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="50"
                                                                        data-price="20.5"
                                                                        data-group_id="3"
                                                                        value="50">Наполнение форума Супер 41 RUB (1000
                                                                    симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Для социальных сетей"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="169"
                                                                        data-price="0"
                                                                        data-group_id="4"
                                                                        class='mix' value="271">Социальные сети Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="169"
                                                                        data-price="0"
                                                                        data-group_id="4"
                                                                        class='mix' value="169">Социальные сети Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="18.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="43"
                                                                        data-price="11"
                                                                        data-group_id="4"
                                                                        value="43">Социальные сети Микро 18.5 RUB (75
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.28"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="43"
                                                                        data-price="0.17"
                                                                        data-group_id="4"
                                                                        value="226">Социальные сети Микро 0.28 $ (75
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="20.9"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="5"
                                                                        data-price="13"
                                                                        data-group_id="4"
                                                                        value="5">Социальные сети Мини 20.9 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.32"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="5"
                                                                        data-price="0.2"
                                                                        data-group_id="4"
                                                                        value="194">Социальные сети Мини 0.32 $ (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="23.6"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="6"
                                                                        data-price="16"
                                                                        data-group_id="4"
                                                                        value="6">Социальные сети Стандарт 23.6 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.36"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="6"
                                                                        data-price="0.25"
                                                                        data-group_id="4"
                                                                        value="195">Социальные сети Стандарт 0.36 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="33.5"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="26"
                                                                        data-price="20.5"
                                                                        data-group_id="4"
                                                                        value="26">Социальные сети Максимум 33.5 RUB
                                                                    (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.52"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="26"
                                                                        data-price="0.32"
                                                                        data-group_id="4"
                                                                        value="211">Социальные сети Максимум 0.52 $ (500
                                                                    симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Youtube"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="170"
                                                                        data-price="0"
                                                                        data-group_id="5"
                                                                        class='mix' value="272">Youtube Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="170"
                                                                        data-price="0"
                                                                        data-group_id="5"
                                                                        class='mix' value="170">Youtube Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="21.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="44"
                                                                        data-price="10.5"
                                                                        data-group_id="5"
                                                                        value="44">Youtube Микро 21.1 RUB (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.32"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="44"
                                                                        data-price="0.16"
                                                                        data-group_id="5"
                                                                        value="227">Youtube Микро 0.32 $ (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.38"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="7"
                                                                        data-price="0.19"
                                                                        data-group_id="5"
                                                                        value="196">Youtube Мини 0.38 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="25"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="7"
                                                                        data-price="12.5"
                                                                        data-group_id="5"
                                                                        value="7">Youtube Мини 25 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="35.2"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="27"
                                                                        data-price="14"
                                                                        data-group_id="5"
                                                                        value="27">Youtube Стандарт 35.2 RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.54"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="27"
                                                                        data-price="0.22"
                                                                        data-group_id="5"
                                                                        value="212">Youtube Стандарт 0.54 $ (300 симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Отзывы с гарантией публикации"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="189"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="290">С гарантией публикации
                                                                    Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="189"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="189">С гарантией публикации
                                                                    Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.31"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="183"
                                                                        data-price="0.22"
                                                                        data-group_id="6"
                                                                        value="284">С гарантией публикации Микро 0.31 $
                                                                    (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="20"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="183"
                                                                        data-price="14"
                                                                        data-group_id="6"
                                                                        value="183">С гарантией публикации Микро 20 RUB
                                                                    (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="22.5"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="184"
                                                                        data-price="16"
                                                                        data-group_id="6"
                                                                        value="184">С гарантией публикации Мини 22.5 RUB
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.35"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="184"
                                                                        data-price="0.25"
                                                                        data-group_id="6"
                                                                        value="285">С гарантией публикации Мини 0.35 $
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.39"
                                                                        data-time_execute="2400"
                                                                        data-currency_id="2"
                                                                        data-original_id="185"
                                                                        data-price="0.29"
                                                                        data-group_id="6"
                                                                        value="286">С гарантией публикации Стандартный
                                                                    0.39 $ (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="25.2"
                                                                        data-time_execute="2400"
                                                                        data-currency_id="1"
                                                                        data-original_id="185"
                                                                        data-price="19"
                                                                        data-group_id="6"
                                                                        value="185">С гарантией публикации Стандартный
                                                                    25.2 RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="35"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="186"
                                                                        data-price="24"
                                                                        data-group_id="6"
                                                                        value="186">С гарантией публикации Максимум 35
                                                                    RUB (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.54"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="186"
                                                                        data-price="0.37"
                                                                        data-group_id="6"
                                                                        value="287">С гарантией публикации Максимум 0.54
                                                                    $ (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="41.4"
                                                                        data-time_execute="3600"
                                                                        data-currency_id="1"
                                                                        data-original_id="187"
                                                                        data-price="30"
                                                                        data-group_id="6"
                                                                        value="187">С гарантией публикации Супер 41.4
                                                                    RUB (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.64"
                                                                        data-time_execute="3600"
                                                                        data-currency_id="2"
                                                                        data-original_id="187"
                                                                        data-price="0.46"
                                                                        data-group_id="6"
                                                                        value="288">С гарантией публикации Супер 0.64 $
                                                                    (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="103.1"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="1"
                                                                        data-original_id="188"
                                                                        data-price="55"
                                                                        data-group_id="6"
                                                                        value="188">С гарантией публикации Мега 103.1
                                                                    RUB (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="1.59"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="2"
                                                                        data-original_id="188"
                                                                        data-price="0.85"
                                                                        data-group_id="6"
                                                                        value="289">С гарантией публикации Мега 1.59 $
                                                                    (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="171"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="171">Микс Яндекс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="171"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="273">Микс Яндекс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="52.8"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="31"
                                                                        data-price="34"
                                                                        data-group_id="6"
                                                                        value="31">Яндекс.Маркет Мини 52.8 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.81"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="31"
                                                                        data-price="0.52"
                                                                        data-group_id="6"
                                                                        value="215">Яндекс.Маркет Мини 0.81 $ (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.86"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="32"
                                                                        data-price="0.55"
                                                                        data-group_id="6"
                                                                        value="216">Яндекс.Маркет Стандарт 0.86 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="56.1"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="32"
                                                                        data-price="35.5"
                                                                        data-group_id="6"
                                                                        value="32">Яндекс.Маркет Стандарт 56.1 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="64.9"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="14"
                                                                        data-price="40"
                                                                        data-group_id="6"
                                                                        value="14">Яндекс.Маркет Максимум 64.9 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="1"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="14"
                                                                        data-price="0.62"
                                                                        data-group_id="6"
                                                                        value="200">Яндекс.Маркет Максимум 1 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="77.4"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="58"
                                                                        data-price="50"
                                                                        data-group_id="6"
                                                                        value="58">Яндекс.Маркет Супер 77.4 RUB (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="1.19"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="58"
                                                                        data-price="0.77"
                                                                        data-group_id="6"
                                                                        value="241">Яндекс.Маркет Супер 1.19 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="181"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="282">Микс Яндекс.Карты
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="181"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="181">Микс Яндекс.Карты
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="30.8"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="59"
                                                                        data-price="20"
                                                                        data-group_id="6"
                                                                        value="59">Яндекс.Карты Мини 30.8 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.47"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="59"
                                                                        data-price="0.31"
                                                                        data-group_id="6"
                                                                        value="242">Яндекс.Карты Мини 0.47 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="37.1"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="60"
                                                                        data-price="23"
                                                                        data-group_id="6"
                                                                        value="60">Яндекс.Карты Стандарт 37.1 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.57"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="60"
                                                                        data-price="0.35"
                                                                        data-group_id="6"
                                                                        value="243">Яндекс.Карты Стандарт 0.57 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.73"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="61"
                                                                        data-price="0.42"
                                                                        data-group_id="6"
                                                                        value="244">Яндекс.Карты Максимум 0.73 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="47.2"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="61"
                                                                        data-price="27.5"
                                                                        data-group_id="6"
                                                                        value="61">Яндекс.Карты Максимум 47.2 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="55.5"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="62"
                                                                        data-price="37"
                                                                        data-group_id="6"
                                                                        value="62">Яндекс.Карты Супер 55.5 RUB (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.85"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="62"
                                                                        data-price="0.57"
                                                                        data-group_id="6"
                                                                        value="245">Яндекс.Карты Супер 0.85 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="176"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="277">Микс Google Maps
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="176"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="176">Микс Google Maps
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="25.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="63"
                                                                        data-price="16"
                                                                        data-group_id="6"
                                                                        value="63">Google Maps Мини 25.1 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.39"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="63"
                                                                        data-price="0.25"
                                                                        data-group_id="6"
                                                                        value="246">Google Maps Мини 0.39 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.45"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="64"
                                                                        data-price="0.29"
                                                                        data-group_id="6"
                                                                        value="247">Google Maps Стандарт 0.45 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="29.1"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="64"
                                                                        data-price="19"
                                                                        data-group_id="6"
                                                                        value="64">Google Maps Стандарт 29.1 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.66"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="65"
                                                                        data-price="0.36"
                                                                        data-group_id="6"
                                                                        value="248">Google Maps Максимум 0.66 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="42.7"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="65"
                                                                        data-price="23.5"
                                                                        data-group_id="6"
                                                                        value="65">Google Maps Максимум 42.7 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.79"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="66"
                                                                        data-price="0.51"
                                                                        data-group_id="6"
                                                                        value="249">Google Maps Супер 0.79 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="51.4"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="66"
                                                                        data-price="33"
                                                                        data-group_id="6"
                                                                        value="66">Google Maps Супер 51.4 RUB (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="177"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="177">Микс @Mail.ru
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="177"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="278">Микс @Mail.ru
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="33.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="67"
                                                                        data-price="22"
                                                                        data-group_id="6"
                                                                        value="67">Товары@Mail.ru Мини 33.5 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.52"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="67"
                                                                        data-price="0.34"
                                                                        data-group_id="6"
                                                                        value="250">Товары@Mail.ru Мини 0.52 $ (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="38.6"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="68"
                                                                        data-price="25"
                                                                        data-group_id="6"
                                                                        value="68">Товары@Mail.ru Стандарт 38.6 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.59"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="68"
                                                                        data-price="0.38"
                                                                        data-group_id="6"
                                                                        value="251">Товары@Mail.ru Стандарт 0.59 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="44.5"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="69"
                                                                        data-price="29.5"
                                                                        data-group_id="6"
                                                                        value="69">Товары@Mail.ru Максимум 44.5 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.68"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="69"
                                                                        data-price="0.45"
                                                                        data-group_id="6"
                                                                        value="252">Товары@Mail.ru Максимум 0.68 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="58.5"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="70"
                                                                        data-price="39"
                                                                        data-group_id="6"
                                                                        value="70">Товары@Mail.ru Супер 58.5 RUB (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.9"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="70"
                                                                        data-price="0.6"
                                                                        data-group_id="6"
                                                                        value="253">Товары@Mail.ru Супер 0.9 $ (1000
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="178"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="178">Микс yell.ru
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="178"
                                                                        data-price="0"
                                                                        data-group_id="6"
                                                                        class='mix' value="279">Микс yell.ru
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="24.4"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="71"
                                                                        data-price="16"
                                                                        data-group_id="6"
                                                                        value="71">Желтые страницы yell.ru Мини 24.4 RUB
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.38"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="71"
                                                                        data-price="0.25"
                                                                        data-group_id="6"
                                                                        value="254">Желтые страницы yell.ru Мини 0.38 $
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="30.6"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="72"
                                                                        data-price="19"
                                                                        data-group_id="6"
                                                                        value="72">Желтые страницы yell.ru Стандарт 30.6
                                                                    RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.47"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="72"
                                                                        data-price="0.29"
                                                                        data-group_id="6"
                                                                        value="255">Желтые страницы yell.ru Стандарт
                                                                    0.47 $ (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="42"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="73"
                                                                        data-price="23.5"
                                                                        data-group_id="6"
                                                                        value="73">Желтые страницы yell.ru Максимум 42
                                                                    RUB (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.65"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="73"
                                                                        data-price="0.36"
                                                                        data-group_id="6"
                                                                        value="256">Желтые страницы yell.ru Максимум
                                                                    0.65 $ (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="49.5"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="74"
                                                                        data-price="33"
                                                                        data-group_id="6"
                                                                        value="74">Желтые страницы yell.ru Супер 49.5
                                                                    RUB (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.76"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="74"
                                                                        data-price="0.51"
                                                                        data-group_id="6"
                                                                        value="257">Желтые страницы yell.ru Супер 0.76 $
                                                                    (1000 симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup
                                                                label="Комментарии и отзывы для мобильных приложений"
                                                                data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="172"
                                                                        data-price="0"
                                                                        data-group_id="7"
                                                                        class='mix' value="274">Микс Apple Store
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="13.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="172"
                                                                        data-price="0"
                                                                        data-group_id="7"
                                                                        class='mix' value="172">Микс Apple Store
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.7"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="75"
                                                                        data-price="0.46"
                                                                        data-group_id="7"
                                                                        value="258">Apple Store Мини 0.7 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="45.8"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="75"
                                                                        data-price="30"
                                                                        data-group_id="7"
                                                                        value="75">Apple Store Мини 45.8 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="54"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="79"
                                                                        data-price="33"
                                                                        data-group_id="7"
                                                                        value="79">Google Play Стандарт 54 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="49.2"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="76"
                                                                        data-price="33"
                                                                        data-group_id="7"
                                                                        value="76">Apple Store Стандарт 49.2 RUB (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.92"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="80"
                                                                        data-price="0.57"
                                                                        data-group_id="7"
                                                                        value="263">Google Play Максимум 0.92 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.83"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="79"
                                                                        data-price="0.51"
                                                                        data-group_id="7"
                                                                        value="262">Google Play Стандарт 0.83 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.65"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="78"
                                                                        data-price="0.46"
                                                                        data-group_id="7"
                                                                        value="261">Google Play Мини 0.65 $ (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.83"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="77"
                                                                        data-price="0.57"
                                                                        data-group_id="7"
                                                                        value="260">Apple Store Максимум 0.83 $ (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.76"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="76"
                                                                        data-price="0.51"
                                                                        data-group_id="7"
                                                                        value="259">Apple Store Стандарт 0.76 $ (300
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="54.1"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="77"
                                                                        data-price="37"
                                                                        data-group_id="7"
                                                                        value="77">Apple Store Максимум 54.1 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="13.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="179"
                                                                        data-price="0"
                                                                        data-group_id="7"
                                                                        class='mix' value="179">Микс Google Play
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="42.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="78"
                                                                        data-price="30"
                                                                        data-group_id="7"
                                                                        value="78">Google Play Мини 42.5 RUB (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="59.8"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="80"
                                                                        data-price="37"
                                                                        data-group_id="7"
                                                                        value="80">Google Play Максимум 59.8 RUB (500
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="179"
                                                                        data-price="0"
                                                                        data-group_id="7"
                                                                        class='mix' value="280">Микс Google Play
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Комментарии и отзывы без публикации"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="8"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="19"
                                                                        data-price="4"
                                                                        data-group_id="8"
                                                                        value="19">Для ручного экспорта Мини 8 RUB (150
                                                                    симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="1.22"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="2"
                                                                        data-original_id="47"
                                                                        data-price="0.61"
                                                                        data-group_id="8"
                                                                        value="230">Для ручного экспорта Мега 1.22 $
                                                                    (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.09"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="41"
                                                                        data-price="0.04"
                                                                        data-group_id="8"
                                                                        value="224">Для ручного экспорта Микро 0.09 $
                                                                    (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.61"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="22"
                                                                        data-price="0.3"
                                                                        data-group_id="8"
                                                                        value="207">Для ручного экспорта Супер 0.61 $
                                                                    (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.31"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="21"
                                                                        data-price="0.15"
                                                                        data-group_id="8"
                                                                        value="206">Для ручного экспорта Максимум 0.31 $
                                                                    (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.18"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="20"
                                                                        data-price="0.08"
                                                                        data-group_id="8"
                                                                        value="205">Для ручного экспорта Стандарт 0.18 $
                                                                    (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.12"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="19"
                                                                        data-price="0.06"
                                                                        data-group_id="8"
                                                                        value="204">Для ручного экспорта Мини 0.12 $
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="173"
                                                                        data-price="0"
                                                                        data-group_id="8"
                                                                        class='mix' value="173">Для ручного экспорта
                                                                    Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="79"
                                                                        data-time_execute="7200"
                                                                        data-currency_id="1"
                                                                        data-original_id="47"
                                                                        data-price="39.5"
                                                                        data-group_id="8"
                                                                        value="47">Для ручного экспорта Мега 79 RUB
                                                                    (2000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="5.7"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="41"
                                                                        data-price="2.5"
                                                                        data-group_id="8"
                                                                        value="41">Для ручного экспорта Микро 5.7 RUB
                                                                    (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="39.6"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="22"
                                                                        data-price="19.5"
                                                                        data-group_id="8"
                                                                        value="22">Для ручного экспорта Супер 39.6 RUB
                                                                    (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="20.3"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="21"
                                                                        data-price="10"
                                                                        data-group_id="8"
                                                                        value="21">Для ручного экспорта Максимум 20.3
                                                                    RUB (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="11.5"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="20"
                                                                        data-price="5.5"
                                                                        data-group_id="8"
                                                                        value="20">Для ручного экспорта Стандарт 11.5
                                                                    RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="173"
                                                                        data-price="0"
                                                                        data-group_id="8"
                                                                        class='mix' value="275">Для ручного экспорта
                                                                    Микс
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Размещение готовых комментариев"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="2.7"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="33"
                                                                        data-price="2.25"
                                                                        data-group_id="9"
                                                                        value="33">Готовые комментарии 2.7 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.51"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="182"
                                                                        data-price="0.38"
                                                                        data-group_id="9"
                                                                        value="283">Готовые комментарии+Яндекс.Маркет
                                                                    0.51 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="14"
                                                                        data-time_execute="2500"
                                                                        data-currency_id="1"
                                                                        data-original_id="293"
                                                                        data-price="12"
                                                                        data-group_id="9"
                                                                        value="293">Готовые комментарии+Яндекс.Карты 14
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0.19"
                                                                        data-time_execute="2500"
                                                                        data-currency_id="2"
                                                                        data-original_id="293"
                                                                        data-price="0.19"
                                                                        data-group_id="9"
                                                                        value="294">Готовые комментарии+Яндекс.Карты
                                                                    0.19 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="12"
                                                                        data-time_execute="2500"
                                                                        data-currency_id="1"
                                                                        data-original_id="295"
                                                                        data-price="10"
                                                                        data-group_id="9"
                                                                        value="295">Готовые комментарии+Google Maps 12
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0.19"
                                                                        data-time_execute="2500"
                                                                        data-currency_id="2"
                                                                        data-original_id="295"
                                                                        data-price="0.17"
                                                                        data-group_id="9"
                                                                        value="296">Готовые комментарии+Google Maps 0.19
                                                                    $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="25"
                                                                        data-time_execute="1800"
                                                                        data-currency_id="1"
                                                                        data-original_id="299"
                                                                        data-price="20"
                                                                        data-group_id="9"
                                                                        value="299">Готовые комментарии+Apple Store 25
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0.4"
                                                                        data-time_execute="1800"
                                                                        data-currency_id="2"
                                                                        data-original_id="299"
                                                                        data-price="0.35"
                                                                        data-group_id="9"
                                                                        value="300">Готовые комментарии+Apple Store 0.4
                                                                    $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="25"
                                                                        data-time_execute="1800"
                                                                        data-currency_id="1"
                                                                        data-original_id="301"
                                                                        data-price="20"
                                                                        data-group_id="9"
                                                                        value="301">Готовые комментарии+Google Play 25
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.08"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="38"
                                                                        data-price="0.08"
                                                                        data-group_id="9"
                                                                        value="221">Готовые
                                                                    комментарии+Liveinternet|Livejournal 0.08 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.13"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="36"
                                                                        data-price="0.13"
                                                                        data-group_id="9"
                                                                        value="220">Готовые комментарии+Youtube 0.13 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="5.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="34"
                                                                        data-price="4"
                                                                        data-group_id="9"
                                                                        value="34">Готовые комментарии+Регистрация 5.5
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="9.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="35"
                                                                        data-price="9"
                                                                        data-group_id="9"
                                                                        value="35">Готовые комментарии+Социальные сети
                                                                    9.1 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="8.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="36"
                                                                        data-price="8.5"
                                                                        data-group_id="9"
                                                                        value="36">Готовые комментарии+Youtube 8.5 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="5.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="38"
                                                                        data-price="5.5"
                                                                        data-group_id="9"
                                                                        value="38">Готовые
                                                                    комментарии+Liveinternet|Livejournal 5.5 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="33"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="182"
                                                                        data-price="25"
                                                                        data-group_id="9"
                                                                        value="182">Готовые комментарии+Яндекс.Маркет 33
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.04"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="33"
                                                                        data-price="0.03"
                                                                        data-group_id="9"
                                                                        value="217">Готовые комментарии 0.04 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.08"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="34"
                                                                        data-price="0.06"
                                                                        data-group_id="9"
                                                                        value="218">Готовые комментарии+Регистрация 0.08
                                                                    $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.14"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="35"
                                                                        data-price="0.14"
                                                                        data-group_id="9"
                                                                        value="219">Готовые комментарии+Социальные сети
                                                                    0.14 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0.4"
                                                                        data-time_execute="1800"
                                                                        data-currency_id="2"
                                                                        data-original_id="301"
                                                                        data-price="0.35"
                                                                        data-group_id="9"
                                                                        value="302">Готовые комментарии+Google Play 0.4
                                                                    $
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Для блогов Liveinternet и Livejournal"
                                                                      data-globalType="0">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="16"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="16"
                                                                        data-price="8"
                                                                        data-group_id="10"
                                                                        value="16">LiveInternet|Livejournal Мини 16 RUB
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.18"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="48"
                                                                        data-price="0.09"
                                                                        data-group_id="10"
                                                                        value="231">LiveInternet|Livejournal Микро 0.18
                                                                    $ (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.69"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="2"
                                                                        data-original_id="29"
                                                                        data-price="0.35"
                                                                        data-group_id="10"
                                                                        value="213">Liveinternet|Livejournal Супер 0.69
                                                                    $ (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.32"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="2"
                                                                        data-original_id="18"
                                                                        data-price="0.16"
                                                                        data-group_id="10"
                                                                        value="203">LiveInternet|Livejournal Максимум
                                                                    0.32 $ (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.29"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="2"
                                                                        data-original_id="17"
                                                                        data-price="0.15"
                                                                        data-group_id="10"
                                                                        value="202">LiveInternet|Livejournal Стандарт
                                                                    0.29 $ (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.25"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="16"
                                                                        data-price="0.12"
                                                                        data-group_id="10"
                                                                        value="201">LiveInternet|Livejournal Мини 0.25 $
                                                                    (150 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="175"
                                                                        data-price="0"
                                                                        data-group_id="10"
                                                                        class='mix' value="175">LiveInternet|Livejournal
                                                                    Микс
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="12"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="48"
                                                                        data-price="6"
                                                                        data-group_id="10"
                                                                        value="48">LiveInternet|Livejournal Микро 12 RUB
                                                                    (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="45"
                                                                        data-time_execute="4800"
                                                                        data-currency_id="1"
                                                                        data-original_id="29"
                                                                        data-price="22.5"
                                                                        data-group_id="10"
                                                                        value="29">Liveinternet|Livejournal Супер 45 RUB
                                                                    (1000 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="21"
                                                                        data-time_execute="3000"
                                                                        data-currency_id="1"
                                                                        data-original_id="18"
                                                                        data-price="10.5"
                                                                        data-group_id="10"
                                                                        value="18">LiveInternet|Livejournal Максимум 21
                                                                    RUB (500 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="19"
                                                                        data-time_execute="2100"
                                                                        data-currency_id="1"
                                                                        data-original_id="17"
                                                                        data-price="9.5"
                                                                        data-group_id="10"
                                                                        value="17">LiveInternet|Livejournal Стандарт 19
                                                                    RUB (300 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="175"
                                                                        data-price="0"
                                                                        data-group_id="10"
                                                                        class='mix' value="276">LiveInternet|Livejournal
                                                                    Микс
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Репосты, лайки и ретвиты"
                                                                      data-globalType="1">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="3.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="30"
                                                                        data-price="3"
                                                                        data-group_id="11"
                                                                        value="30">Репост+Лайк 3.1 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.03"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="57"
                                                                        data-price="0.03"
                                                                        data-group_id="11"
                                                                        value="240">Ретвит 0.03 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.02"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="52"
                                                                        data-price="0.02"
                                                                        data-group_id="11"
                                                                        value="235">Лайк 0.02 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.03"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="51"
                                                                        data-price="0.03"
                                                                        data-group_id="11"
                                                                        value="234">Репост 0.03 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.05"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="30"
                                                                        data-price="0.05"
                                                                        data-group_id="11"
                                                                        value="214">Репост+Лайк 0.05 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="1.5"
                                                                        data-time_execute="1200"
                                                                        data-currency_id="1"
                                                                        data-original_id="180"
                                                                        data-price="1"
                                                                        data-group_id="11"
                                                                        value="180">Голосование 1.5 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="2.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="57"
                                                                        data-price="2"
                                                                        data-group_id="11"
                                                                        value="57">Ретвит 2.1 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="1.5"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="52"
                                                                        data-price="1"
                                                                        data-group_id="11"
                                                                        value="52">Лайк 1.5 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="2.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="51"
                                                                        data-price="2"
                                                                        data-group_id="11"
                                                                        value="51">Репост 2.2 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.02"
                                                                        data-time_execute="1200"
                                                                        data-currency_id="2"
                                                                        data-original_id="180"
                                                                        data-price="0.02"
                                                                        data-group_id="11"
                                                                        value="281">Голосование 0.02 $
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Подписчики"
                                                                      data-globalType="2">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="1.3"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="53"
                                                                        data-price="1.2"
                                                                        data-group_id="12"
                                                                        value="53">Подписка на Youtube канал 1.3 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="1.7"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="54"
                                                                        data-price="1.5"
                                                                        data-group_id="12"
                                                                        value="54">Подписка в социальных сетях 1.7 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="1.2"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="55"
                                                                        data-price="1.2"
                                                                        data-group_id="12"
                                                                        value="55">Подписка Инстаграм 1.2 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="50"
                                                                        data-average_price="1.1"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="56"
                                                                        data-price="1"
                                                                        data-group_id="12"
                                                                        value="56">Твиттер фоловинг 1.1 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.02"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="53"
                                                                        data-price="0.02"
                                                                        data-group_id="12"
                                                                        value="236">Подписка на Youtube канал 0.02 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.03"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="54"
                                                                        data-price="0.02"
                                                                        data-group_id="12"
                                                                        value="237">Подписка в социальных сетях 0.03 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.02"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="55"
                                                                        data-price="0.02"
                                                                        data-group_id="12"
                                                                        value="238">Подписка Инстаграм 0.02 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.77"
                                                                        data-average_price="0.02"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="56"
                                                                        data-price="0.02"
                                                                        data-group_id="12"
                                                                        value="239">Твиттер фоловинг 0.02 $
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Просмотры видео"
                                                                      data-globalType="3">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="2.3"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="83"
                                                                        data-price="2"
                                                                        data-group_id="13"
                                                                        value="83">Просмотр видео 2.3 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="4.6"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="84"
                                                                        data-price="4"
                                                                        data-group_id="13"
                                                                        value="84">Просмотр видео+Репост 4.6 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="3.7"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="85"
                                                                        data-price="3.2"
                                                                        data-group_id="13"
                                                                        value="85">Просмотр видео+Подписка на канал 3.7
                                                                    RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="14.4"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="1"
                                                                        data-original_id="86"
                                                                        data-price="12.5"
                                                                        data-group_id="13"
                                                                        value="86">Просмотр видео+Комментарий Микро 14.4
                                                                    RUB (75 симв.)
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.04"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="83"
                                                                        data-price="0.03"
                                                                        data-group_id="13"
                                                                        value="264">Просмотр видео 0.04 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.07"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="84"
                                                                        data-price="0.06"
                                                                        data-group_id="13"
                                                                        value="265">Просмотр видео+Репост 0.07 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.06"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="85"
                                                                        data-price="0.05"
                                                                        data-group_id="13"
                                                                        value="266">Просмотр видео+Подписка на канал
                                                                    0.06 $
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="0.02"
                                                                        data-average_price="0.22"
                                                                        data-time_execute="1500"
                                                                        data-currency_id="2"
                                                                        data-original_id="86"
                                                                        data-price="0.19"
                                                                        data-group_id="13"
                                                                        value="267">Просмотр видео+Комментарий Микро
                                                                    0.22 $ (75 симв.)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Поведенческие факторы"
                                                                      data-globalType="1">
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="5"
                                                                        data-time_execute="1200"
                                                                        data-currency_id="1"
                                                                        data-original_id="291"
                                                                        data-price="2"
                                                                        data-group_id="14"
                                                                        value="291">Проявить активность 5 RUB
                                                                </option>
                                                                <option data-freeMinutes="2"
                                                                        data-price_minute="1"
                                                                        data-average_price="0.1"
                                                                        data-time_execute="1200"
                                                                        data-currency_id="2"
                                                                        data-original_id="291"
                                                                        data-price="0.05"
                                                                        data-group_id="14"
                                                                        value="292">Проявить активность 0.1 $
                                                                </option>
                                                            </optgroup>
                                                        </div>
                                                        <div class="errorMessage" id="ProjectForm_tarif_id_em_"
                                                             style="display:none"></div>
                                                        <div id="forMix"
                                                             style="display:none; line-height: 16px; margin-top: 14px;">
                                                            Для проекта будут использованы комбинированные тарифы с
                                                            разным количеством
                                                            символов. Вы сможете самостоятельно настроить необходимое
                                                            количество
                                                            комментариев и символов во время оплаты проекта. <br>
                                                            <p style="font-style: italic">Рекомендуем использовать
                                                                тарифы Микс.</p>
                                                        </div>
                                                    </div>
                                                    <div class="row control-group"
                                                         style="margin-bottom:20px; display:none">
                                                        <div style="display: inline-block; margin-right:15px"><label
                                                                for="ProjectForm_price">Цена</label></div>
                                                        <span style="display: inline-block;">
<input style="width:70px;display: inline-block;" autocomplete="off" name="ProjectForm[price]" id="ProjectForm_price"
       type="text" value=""/>                                            <span class="currency-name"
                                                                               style="display: inline-block;margin-left: 2px "> RUB</span>
</span>
                                                        <span class="inf-qa hastip"
                                                              title="Вы можете самостоятельно установить цену. Рекомендуется использовать среднее значение.">?</span>
                                                        <span id="sceernshot_price"
                                                              style="display:none; color:grey;"></span>
                                                        <div>
                                                            <span id="average_price">Средняя цена на бирже!</span>
                                                            <span id="min_price" style="display: none;">
Хуже на <i style="color:red; font-weight:bold;"></i> от среднего предложения!                                            </span>
                                                            <span id="max_price" style="display: none;">
Лучше на <i style="color:#4fa12c; font-weight:bold;"></i> от среднего предложения!                                            </span>
                                                        </div>
                                                        <div class="errorMessage" id="ProjectForm_price_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="row control-group" id="video_price">
                                                        <label for="ProjectForm_minutes">Длительность видео в
                                                            минутах</label> <input style="width:200px"
                                                                                   name="ProjectForm[minutes]"
                                                                                   id="ProjectForm_minutes" type="text"
                                                                                   value="2"/>
                                                        <div class="errorMessage" id="ProjectForm_minutes_em_"
                                                             style="display:none"></div>
                                                        Если длительность превышает 2 минуты,
                                                        то нужно платить за дополнительное время,
                                                        в размере <span class="price_per_minute"></span> <span
                                                            class="currency-name"></span> - 1 минута.
                                                    </div>
                                                    <div class="row control-group " id="rowPremoderation"
                                                         style="margin-bottom:20px;">
                                                        <div style="float:left; margin-right:15px"><label
                                                                for="ProjectForm_premoderation">Премодерация
                                                                комментариев</label></div>
                                                        <span class="inf-qa hastip"
                                                              title="Публикуются после Вашего одобрения - автор отправляет Вам комментарий на проверку, если Вы его принимаете, то автор публикует комментарий на сайт. После чего, комментарий попадает повторно к Вам на проверку, проверяете его наличие на сайте и оплачиваете. Рекомендуем установить минимальную надбавку, премодерация - это дополнительные действия авторам.">?</span>
                                                        <select name="ProjectForm[premoderation]"
                                                                id="ProjectForm_premoderation">
                                                            <option value="0">Авторы публикуют сразу на Ваш сайт
                                                            </option>
                                                            <option value="1">Публикуют на сайт после Вашего одобрения
                                                            </option>
                                                        </select>
                                                        <div class="errorMessage" id="ProjectForm_premoderation_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="checkbox" id="rowNotlong">
                                                        <input id="ytProjectForm_notlong" type="hidden" value="0"
                                                               name="ProjectForm[notlong]"/><input
                                                            name="ProjectForm[notlong]" id="ProjectForm_notlong"
                                                            value="1" type="checkbox"/> <label
                                                            for="ProjectForm_notlong"
                                                            style="display:inline; margin-right:15px">
                                                            Разрешить комментарии меньшего размера </label>
                                                        <span class="inf-qa hastip"
                                                              title="По умолчанию система не пропускает комментарии от авторов, если количество символов меньше, чем установлено в тарифе. Вы можете отключить данную защиту, если нужны короткие комментарии.">?</span>
                                                    </div>
                                                    <div class="checkbox  " id="service_screenshot">
                                                        <input id="ytProjectForm_screenshot" type="hidden" value="0"
                                                               name="ProjectForm[screenshot]"/><input
                                                            name="ProjectForm[screenshot]" id="ProjectForm_screenshot"
                                                            value="1" type="checkbox"/> <label
                                                            for="ProjectForm_screenshot"
                                                            style="display:inline; margin-right:15px">
                                                            Требовать скриншот от автора (
                                                            + <span class="currency-name screenshot_am"> RUB)</span>
                                                            )
                                                        </label>
                                                        <span class="inf-qa hastip"
                                                              title="Вы можете потребовать скриншот выполненной работы.">?</span>
                                                    </div>
                                                    <div class="checkbox  " id="service_screenshot_require">
                                                        <div style="float: left; opacity: 0.7; position: relative;">
                                                            <input type="checkbox" disabled="true" checked="true">
                                                            <label style="display:inline; margin-right:15px">Требуется
                                                                скриншот от автора</label>
                                                        </div>
                                                        <span class="inf-qa hastip"
                                                              title="Для данного тарифа скриншот обязателен.">?</span>
                                                    </div>
                                                    <div class="checkbox" id="service_verification">
                                                        <input id="ytProjectForm_user_verification" type="hidden"
                                                               value="0" name="ProjectForm[user_verification]"/><input
                                                            name="ProjectForm[user_verification]"
                                                            id="ProjectForm_user_verification" value="1"
                                                            type="checkbox"/> <label for="ProjectForm_user_verification"
                                                                                     style="display:inline; margin-right:15px">
                                                            Только для верифицированных авторов (
                                                            + <span class="currency-name verification_am"> RUB)</span>
                                                            )
                                                        </label>
                                                        <span class="inf-qa hastip"
                                                              title="Некоторые авторы подтверждают свою личность путем предоставления паспортных данных. Вы можете доверить проект только верифицированным авторам.">?</span>
                                                    </div>
                                                </div>
                                            </article>
                                            <!--END FINANCE BLOCK-->
                                            <p class="clearfix"></p>
                                            <div class="row control-group">
                                                <label for="ProjectForm_task" class="required">Задание авторам <span
                                                        class="required">*</span></label> <textarea
                                                    placeholder="Опишите задание для автора. В каком настроении комментарии, какие темы охватывать, что запрещено обсуждать и т.д.. ВНИМАНИЕ! Готовые комментарии сюда не пишите, их сможете загрузить после создания проекта. Если необходимо, то указывайте список соц. сетей и требований к аккаунтам."
                                                    style="width:100%" name="ProjectForm[task]"
                                                    id="ProjectForm_task"></textarea>
                                                <div class="errorMessage" id="ProjectForm_task_em_"
                                                     style="display:none"></div>
                                            </div>
                                            <div class="row control-group">
                                                <div class="inline-btn" for="TicketNewForm_image"
                                                     style="margin-bottom:15px">
                                                    <label class="file_upload mini-btn btn-grey">
                                                        <mark>Файл не выбран</mark>
                                                        <input name="project_file[]" id="ProjectForm_project_file"
                                                               type="file" multiple
                                                               accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword, .csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                    </label>
                                                    <div style="clear:both"></div>
                                                    <div class="errorMessage" id="ProjectForm_project_file_em_"
                                                         style="display:none"></div>
                                                </div>
                                            </div>
                                            <div style="width: 70%; position: relative; float: left;"
                                                 id="listFiles"></div>
                                            <div class="uploaded_files" style="width: 100%; float:left;">
                                            </div>
                                            <div class="wall wall-no-margin" style="position: relative; float: left;">
                                                5.6 Запрещено требовать в задании репост и комментарий в одном проекте.
                                                Для этого создаются
                                                разные проекты и оплачиваются отдельно. <br/>
                                                5.7 Запрещено требовать больше символов в комментарии, чем указано в
                                                выбранном тарифе. При
                                                необходимости дополнительного количества символов, заказчик обязывается
                                                установить надбавку.<br/>
                                                5.8 Если на сайте необходима активация аккаунта, посредством СМС, то
                                                заказчик обязывается указать это в задании и установить надбавку к
                                                стоимости комментария.<br/>
                                                5.9 Запрещено создавать проекты, затрагивающие политические темы.<br/>
                                                5.10 Для требования скриншота выполненной работы, Заказчик обязуется
                                                использовать соответствующую опцию в настройках проекта.
                                            </div>
                                        </div>
                                        <div id="tab_2" class="tab_content">
                                            <article class="edit-persona">
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_group_id">Группа</label></div>
                                                    <span title='Группы необходимы для удобного разделения проектов.<BR>
Например, Вы можете создать группы "Блоги", "Форумы" и разделить по ним проекты.<BR>
Можно создавать подгруппы.' class="inf-qa hastip">?</span>
                                                    <select name="ProjectForm[group_id]" id="ProjectForm_group_id">
                                                        <option value="0" selected="selected">Без группы</option>
                                                        <option value="103174">Новая група</option>
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_group_id_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_team_id">Команда авторов</label></div>
                                                    <span
                                                        title='Вы можете давать доступ к Вашим проектам определенным авторам. Например, Вы можете создать команды "Наполнение форума Форекс", "Наполнение форума SEO". Зайдите в раздел [Команды авторов] для редактирования команд.'
                                                        class="inf-qa hastip">?</span>
                                                    <select multiple="multiple" data-placeholder="Выберите команду"
                                                            name="ProjectForm[team_id][]" id="ProjectForm_team_id">
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_team_id_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_author">Логин автора</label> <input
                                                        placeholder="Логин / Email" name="ProjectForm[author]"
                                                        id="ProjectForm_author" type="text" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_author_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_send_email">Уведомления о новых
                                                            заявках</label></div>
                                                    <span
                                                        title='Раз в 6 часов Вы будете получать уведомление на почту, о новых заявках, которые необходимо проверить. В настройках аккаунта должна быть разрешена отправка уведомлений на email.'
                                                        class="inf-qa hastip">?</span>
                                                    <select name="ProjectForm[send_email]" id="ProjectForm_send_email">
                                                        <option value="1">Получать уведомления</option>
                                                        <option value="0">Не получать</option>
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_send_email_em_"
                                                         style="display:none"></div>
                                                </div>
                                            </article>
                                            <article class='notice notice-2 pull-right' id="comment_configs">
                                                <div class="wall white-wall row">
                                                    <B><label for="ProjectForm_comment_configs">Типы
                                                            комментариев</label></B>
                                                    <input id="ytProjectForm_comment_configs" type="hidden" value=""
                                                           name="ProjectForm[comment_configs]"/><span
                                                        id="ProjectForm_comment_configs"><div
                                                            class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_0">Отзывы</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_0" value="0" checked="checked" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div><div class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_1">Вопросы</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_1" value="1" checked="checked" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div><div class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_2">Положительные</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_2" value="2" checked="checked" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div><div class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_3">Нейтральные</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_3" value="3" checked="checked" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div><div class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_4">Отрицательные</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_4" value="4" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div><div class="checkbox conficheck">
<span class="pull-left"><label for="ProjectForm_comment_configs_5">Ответы</label></span>
<span class="pull-right"><input id="ProjectForm_comment_configs_5" value="5" type="checkbox"
                                name="ProjectForm[comment_configs][]"/></span>
</div></span>
                                                    <div class="errorMessage" id="ProjectForm_comment_configs_em_"
                                                         style="display:none"></div>
                                                    <p><b>Пункт правил 5.13: Запрещено заказывать негативные отзывы и
                                                            оценки с целью ухудшения репутации 3-х лиц. </b></p>
                                                </div>
                                            </article>
                                            <p class="clearfix"></p>
                                            <div class="wall wall-half-margin clearfix">
                                                <div class="control-group">
                                                    <div class="clearfix"></div>
                                                    <div class="half-int pull-left row">
                                                        <label for="ProjectForm_date_start">Отложенный запуск
                                                            проекта</label>
                                                        <div
                                                            style="float:left"><input
                                                                placeholder="например: 2014-03-21 10:00:00"
                                                                style="width:420px" name="ProjectForm[date_start]"
                                                                id="ProjectForm_date_start" type="text" value=""/></div>
                                                        <span
                                                            title="Проект будет автоматически запущен в указанное время. Текущее время сервера:<BR>2021-04-01 12:18:22"
                                                            class="inf-qa hastip">?</span>
                                                        <div class="errorMessage" id="ProjectForm_date_start_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="half-int pull-right row">
                                                        <label for="ProjectForm_date_end">Время, в которое проект будет
                                                            приостановлен</label>
                                                        <div
                                                            style="float:left"><input
                                                                placeholder="например: 2014-03-22 10:00:00"
                                                                style="width:420px" name="ProjectForm[date_end]"
                                                                id="ProjectForm_date_end" type="text" value=""/></div>
                                                        <span
                                                            title="Проект будет автоматически приостановлен в указанное время. Вам будет отправлено уведомление. Текущее время сервера:<BR>2021-04-01 12:18:22"
                                                            class="inf-qa hastip">?</span>
                                                        <div class="errorMessage" id="ProjectForm_date_end_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_3" class="tab_content">
                                            <div class="tab-group clearfix">
                                                <h2>Активность проекта</h2>
                                                <div class="control-group inline-checkbox pull-left row day-active">
                                                    <label for="ProjectForm_days_array">Дни активности</label> <input
                                                        value="" name="ProjectForm[days_array]"
                                                        id="ProjectForm_days_array" type="hidden"/>
                                                    <div class="clearfix"></div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_0">
                                                            <input id="ytProjectForm_days_array_0" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][0]"/><input
                                                                name="ProjectForm[days_array][0]"
                                                                id="ProjectForm_days_array_0" value="1"
                                                                checked="checked" type="checkbox"/>Пн </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_1">
                                                            <input id="ytProjectForm_days_array_1" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][1]"/><input
                                                                name="ProjectForm[days_array][1]"
                                                                id="ProjectForm_days_array_1" value="1"
                                                                checked="checked" type="checkbox"/>Вт </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_2">
                                                            <input id="ytProjectForm_days_array_2" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][2]"/><input
                                                                name="ProjectForm[days_array][2]"
                                                                id="ProjectForm_days_array_2" value="1"
                                                                checked="checked" type="checkbox"/>Ср </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_3">
                                                            <input id="ytProjectForm_days_array_3" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][3]"/><input
                                                                name="ProjectForm[days_array][3]"
                                                                id="ProjectForm_days_array_3" value="1"
                                                                checked="checked" type="checkbox"/>Чт </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_4">
                                                            <input id="ytProjectForm_days_array_4" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][4]"/><input
                                                                name="ProjectForm[days_array][4]"
                                                                id="ProjectForm_days_array_4" value="1"
                                                                checked="checked" type="checkbox"/>Пт </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_5">
                                                            <input id="ytProjectForm_days_array_5" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][5]"/><input
                                                                name="ProjectForm[days_array][5]"
                                                                id="ProjectForm_days_array_5" value="1"
                                                                checked="checked" type="checkbox"/>Сб </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="ProjectForm_days_array_6">
                                                            <input id="ytProjectForm_days_array_6" type="hidden"
                                                                   value="0" name="ProjectForm[days_array][6]"/><input
                                                                name="ProjectForm[days_array][6]"
                                                                id="ProjectForm_days_array_6" value="1"
                                                                checked="checked" type="checkbox"/>Вс </label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="errorMessage" id="ProjectForm_days_array_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="control-group inline-checkbox pull-left row">
                                                    <div class="timer clearfix" style="width:350px">
                                                        <label for="ProjectForm_start_time">Часы активности</label>
                                                        <div class="clearfix"></div>
                                                        <div style="float:left; margin-right:5px; margin-top:7px">c
                                                        </div>
                                                        <div style="float:left;"><input name="ProjectForm[start_time]"
                                                                                        id="ProjectForm_start_time"
                                                                                        type="text"
                                                                                        value="00:00:00"
                                                                                        style="width:80px"
                                                            ></div>
                                                        <div style="float:left; margin-right:5px; margin-top:7px">по
                                                        </div>
                                                        <div style="float:left;"><input name="ProjectForm[end_time]"
                                                                                        id="ProjectForm_end_time"
                                                                                        type="text"
                                                                                        value="00:00:00"
                                                                                        style="width:80px"
                                                            ></div>
                                                        <span
                                                            title="Например, 10:00:00-20:00:00, проект будет активен с 10 утра до 8 вечера.<BR>Если оставляете 00:00:00-00:00:00, то проект будет активен в любое время без ограничений.<BR>Время сервера: 12:18:22"
                                                            class="inf-qa hastip">?</span>
                                                        <div class="clearfix"></div>
                                                        <div class="errorMessage" id="ProjectForm_start_time_em_"
                                                             style="display:none"></div>
                                                        <div class="errorMessage" id="ProjectForm_end_time_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-group clearfix">
                                                <h2>Лимиты</h2>
                                                <article class="edit-persona">
                                                    <div class="yiiTab tabs-view" style="width:415px" id="limit_tabs">
                                                        <ul class="tabs">
                                                            <li><a href="#tab1" class="active">Максимальное к-во</a>
                                                            </li>
                                                            <li><a href="#tab2">Случайное к-во</a></li>
                                                        </ul>
                                                        <div class="view" id="tab1">
                                                            <div class="control-group half-control clearfix row"
                                                                 style="width:415px">
                                                                <div style="float:left; margin-right:15px; width:100%">
                                                                    <label style="display:inline-block;"
                                                                           for="ProjectForm_limit">Количество
                                                                        работ</label> <input class="count-format"
                                                                                             style="display:inline-block; width:60px"
                                                                                             maxlength="4"
                                                                                             name="ProjectForm[limit]"
                                                                                             id="ProjectForm_limit"
                                                                                             type="text" value=""/> за
                                                                    <input class="count-format"
                                                                           style="display:inline-block; width:42px"
                                                                           maxlength="2"
                                                                           name="ProjectForm[cnt_day_limit]"
                                                                           id="ProjectForm_cnt_day_limit" type="text"
                                                                           value="1"/> <label
                                                                        style="display:inline-block;"
                                                                        for="ProjectForm_cnt_day_limit">дней</label>
                                                                </div>
                                                                <div class="errorMessage" id="ProjectForm_limit_em_"
                                                                     style="display:none"></div>
                                                                <div class="errorMessage"
                                                                     id="ProjectForm_cnt_day_limit_em_"
                                                                     style="display:none"></div>
                                                            </div>
                                                        </div><!-- tab1 -->
                                                        <div class="view" id="tab2" style="display:none">
                                                            <div class="control-group half-control clearfix row"
                                                                 style="width:415px">
                                                                <div style="float:left; margin-right:15px; width:100%">
                                                                    <label class="count-format"
                                                                           style="display:inline-block;"
                                                                           for="ProjectForm_max_day_limit">Количество
                                                                        работ</label> <input class="count-format"
                                                                                             style="display:inline-block; width:60px"
                                                                                             maxlength="4"
                                                                                             placeholder="от"
                                                                                             name="ProjectForm[min_day_limit]"
                                                                                             id="ProjectForm_min_day_limit"
                                                                                             type="text" value=""/>
                                                                    <input class="count-format"
                                                                           style="display:inline-block; width:60px"
                                                                           maxlength="4" placeholder="до"
                                                                           name="ProjectForm[max_day_limit]"
                                                                           id="ProjectForm_max_day_limit" type="text"
                                                                           value=""/> за <input class="count-format"
                                                                                                style="display:inline-block; width:42px"
                                                                                                maxlength="2"
                                                                                                name="ProjectForm[cnt_day_limit2]"
                                                                                                id="ProjectForm_cnt_day_limit2"
                                                                                                type="text" value="1"/>
                                                                    <label style="display:inline-block;"
                                                                           for="ProjectForm_cnt_day_limit2">дней</label>
                                                                    <span
                                                                        title="Раз в указанное число суток будет генерироваться новый лимит. Таким образом, не будет каждый раз одинаковое число работ. Минимальный лимит можно установить на 0, в эти дни проект будет приостановлен."
                                                                        class="inf-qa hastip">?</span>
                                                                </div>
                                                                <div class="errorMessage"
                                                                     id="ProjectForm_max_day_limit_em_"
                                                                     style="display:none"></div>
                                                                <div class="errorMessage"
                                                                     id="ProjectForm_min_day_limit_em_"
                                                                     style="display:none"></div>
                                                                <div class="errorMessage"
                                                                     id="ProjectForm_cnt_day_limit2_em_"
                                                                     style="display:none"></div>
                                                            </div>
                                                        </div><!-- tab2 -->
                                                    </div>
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                for="ProjectForm_delay_to">Задержка между работами (в
                                                                мин.)</label></div>
                                                        <span
                                                            title='Укажите значения от и до в минутах. Если установлена задержка между работами, одновременно приступить к работе сможет только один автор.'
                                                            class="inf-qa hastip">?</span>
                                                        <div class="clearfix"></div>
                                                        <div style="float:left; margin-right:15px"><input
                                                                name="ProjectForm[delay_from]"
                                                                id="ProjectForm_delay_from"
                                                                type="text" placeholder="от"
                                                                style="width:80px"
                                                                value="0"
                                                                class="count-format"
                                                            >
                                                        </div>
                                                        <div style="float:left;"><input name="ProjectForm[delay_to]"
                                                                                        id="ProjectForm_delay_to"
                                                                                        type="text"
                                                                                        placeholder="до"
                                                                                        style="width:80px"
                                                                                        value="0"
                                                                                        class="count-format"
                                                            >
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="errorMessage" id="ProjectForm_delay_from_em_"
                                                             style="display:none"></div>
                                                        <div class="errorMessage" id="ProjectForm_delay_to_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                class="count-format" for="ProjectForm_limit_hour">Лимит
                                                                в час</label></div>
                                                        <span
                                                            title="Если Вы хотите получать работы постепенно, в течение дня, рекомендуем установить лимит в час."
                                                            class="inf-qa hastip">?</span>
                                                        <input class="count-format" name="ProjectForm[limit_hour]"
                                                               id="ProjectForm_limit_hour" type="text" value=""/>
                                                        <div class="errorMessage" id="ProjectForm_limit_hour_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                class="count-format" for="ProjectForm_limit_url">Лимит
                                                                на страницу</label></div>
                                                        <span
                                                            title="Автор указывает ссылку, с которой собирается работать. Система подсчитывает, сколько работ уже добавлено по указанной странице и если лимит исчерпан, то автору необходимо выбрать другую страницу."
                                                            class="inf-qa hastip">?</span>
                                                        <input class="count-format" name="ProjectForm[limit_url]"
                                                               id="ProjectForm_limit_url" type="text" value=""/>
                                                        <div class="errorMessage" id="ProjectForm_limit_url_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                for="ProjectForm_limit_url_day">Лимит на страницу в
                                                                сутки</label></div>
                                                        <span
                                                            title="Автор указывает ссылку, с которой собирается работать. Система подсчитывает, сколько работ уже добавлено по указанной странице за сегодня и если лимит исчерпан, то автору необходимо выбрать другую страницу."
                                                            class="inf-qa hastip">?</span>
                                                        <input class="count-format" name="ProjectForm[limit_url_day]"
                                                               id="ProjectForm_limit_url_day" type="text" value=""/>
                                                        <div class="errorMessage" id="ProjectForm_limit_url_day_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </article>
                                                <article id="delay_anotate" class="notice pull-right"
                                                         style="display: none;">
                                                    <div class="wall">
                                                        <p id="descriptionDelay" style="display: none;">
                                                            Вы можете указать максимальное или случайное количество
                                                            работ которые необходимо выполнить за определенный период.
                                                            Выбрав случайное количество, каждый день будет
                                                            генерироваться новый лимит исходя из заданного диапозона.
                                                            Также, Вы можете самостоятельно менять задержку между
                                                            работами (рекомендуется для опытных заказчиков). </p>
                                                        <p id="delay_reccom" style="display: none;">
                                                            Рекомендуем установить задержку между работами
                                                            от <span id="delay_from_reccom"
                                                                     style="font-weight: bold"></span> до <span
                                                                id="delay_to_reccom" style="font-weight: bold"></span>
                                                            минут.
                                                            Иначе авторы не успеют выполнить необходимое количество
                                                            работ за установленное время. </p>
                                                        <p id="delay_not_reccom" style="display: none;">
                                                            Рекомендуем не устанавливать задержку между работами. Иначе
                                                            авторы не успеют выполнить необходимое количество работ за
                                                            установленное время. </p>
                                                        <p id="delay_set_tarif" style="display: none;">Для более точного
                                                            расчета выберите, пожалуйста, тариф.</p>
                                                        <p id="delay_warning" style="display: none;">
                                                            Задержка между работами слишком большая. Авторы не успеют
                                                            выполнить необходимое количество работ за выделенное
                                                            время. </p>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="tab-group clearfix">
                                                <h2>Лимиты по авторам</h2>
                                                <div id="rowLimitAuthor">
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                class="count-format" for="ProjectForm_limit_author">Лимит
                                                                от автора</label></div>
                                                        <span
                                                            title="Лимит работ от автора по проекту. Автор не сможет выполнять больше работ, чем указано. Не рекомендуем устанавливать, если требуется большое количество работ."
                                                            class="inf-qa hastip">?</span>
                                                        <input class="count-format" name="ProjectForm[limit_author]"
                                                               id="ProjectForm_limit_author" type="text" value=""/>
                                                        <div class="errorMessage" id="ProjectForm_limit_author_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="control-group half-control clearfix row"
                                                         style="width:415px;">
                                                        <div
                                                            style="float:left; margin-right:15px"><label
                                                                class="count-format" for="ProjectForm_limit_author_day">Лимит
                                                                в сутки от автора</label></div>
                                                        <span
                                                            title="Автору будет разрешено выполнять не больше установленного количества работ к Вашему проекту в сутки."
                                                            class="inf-qa hastip">?</span>
                                                        <input class="count-format" name="ProjectForm[limit_author_day]"
                                                               id="ProjectForm_limit_author_day" type="text" value=""/>
                                                        <div class="errorMessage" id="ProjectForm_limit_author_day_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div id="accaunt_limit"
                                                         class="control-group half-control clearfix row"
                                                         style="width:415px; display: none;">
                                                        <div style="float:left; margin-right:15px">
                                                            <label class="count-format"
                                                                   for="ProjectForm_limit_by_accaunt">Лимит на
                                                                аккаунт</label></div>
                                                        <!--                                        <span-->
                                                        <!--                                            title="-->
                                                        <!--"-->
                                                        <!--                                            class="inf-qa hastip">?</span>-->
                                                        <input class="count-format" name="ProjectForm[limit_by_accaunt]"
                                                               id="ProjectForm_limit_by_accaunt" type="text" value="1"/>
                                                        <div class="errorMessage" id="ProjectForm_limit_by_accaunt_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </div>
                                                <div class="control-group half-control clearfix row"
                                                     style="width:415px; margin-bottom:25px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            class="count-format" for="ProjectForm_limit_author_group">Лимит
                                                            от автора на группу проектов</label></div>
                                                    <span
                                                        title="Автору будет разрешено выполнять не больше установленного количества работ к группе проектов."
                                                        class="inf-qa hastip">?</span>
                                                    <input class="count-format" name="ProjectForm[limit_author_group]"
                                                           id="ProjectForm_limit_author_group" type="text" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_limit_author_group_em_"
                                                         style="display:none"></div>
                                                    <input id="ytProjectForm_group_to_all" type="hidden" value="0"
                                                           name="ProjectForm[group_to_all]"/><input
                                                        name="ProjectForm[group_to_all]" id="ProjectForm_group_to_all"
                                                        value="1" type="checkbox"/> <label
                                                        for="ProjectForm_group_to_all"
                                                        style="font-size:10px; display:inline; cursor:pointer"
                                                        class="text-grey">Установить для всех проектов группы</label>
                                                </div>
                                                <div class="control-group half-control clearfix row"
                                                     style="width:415px; margin-bottom:25px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            class="count-format"
                                                            for="ProjectForm_limit_author_group_day">Лимит в сутки от
                                                            автора, на группу проектов</label></div>
                                                    <span
                                                        title="Автору будет разрешено писать не больше установленного количества работ в сутки, к группе проектов."
                                                        class="inf-qa hastip">?</span>
                                                    <input class="count-format"
                                                           name="ProjectForm[limit_author_group_day]"
                                                           id="ProjectForm_limit_author_group_day" type="text"
                                                           value=""/>
                                                    <div class="errorMessage"
                                                         id="ProjectForm_limit_author_group_day_em_"
                                                         style="display:none"></div>
                                                    <input id="ytProjectForm_group_day_to_all" type="hidden" value="0"
                                                           name="ProjectForm[group_day_to_all]"/><input
                                                        name="ProjectForm[group_day_to_all]"
                                                        id="ProjectForm_group_day_to_all" value="1" type="checkbox"/>
                                                    <label
                                                        for="ProjectForm_group_day_to_all"
                                                        style="font-size:10px; display:inline; cursor:pointer"
                                                        class="text-grey">Установить для всех проектов группы</label>
                                                </div>
                                                <div class="control-group half-control clearfix row"
                                                     style="width:415px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_limit_ip">Лимит на 1 IP</label></div>
                                                    <span
                                                        title="Рекомендуем устанавливать только при реальной необходимости."
                                                        class="inf-qa hastip">?</span>
                                                    <input class="count-format" name="ProjectForm[limit_ip]"
                                                           id="ProjectForm_limit_ip" type="text" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_limit_ip_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="control-group half-control clearfix row"
                                                     style="width:415px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_max_turn">Максимум приступивших
                                                            авторов</label></div>
                                                    <span
                                                        title="Максимальное количество авторов, которые могут одновременно работать над Вашим проектом. Актуально, если у Вас не установлен лимит и пополнено большое количество работ."
                                                        class="inf-qa hastip">?</span>
                                                    <input class="count-format" name="ProjectForm[max_turn]"
                                                           id="ProjectForm_max_turn" type="text" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_max_turn_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="control-group half-control clearfix row"
                                                     style="width:415px">
                                                    <div
                                                        style="float:left; margin-right:15px"><label
                                                            for="ProjectForm_delay">Задержка перед повторным выполнением
                                                            (в мин.)</label></div>
                                                    <span
                                                        title="После выполнения проекта, автор не сможет приступить повторно, пока не пройдет указаное время. Обратите внимание, что задержка указывается в минутах. Например, можно разрешить автору ставить лайк только раз в 3 дня."
                                                        class="inf-qa hastip">?</span>
                                                    <input class="count-format" name="ProjectForm[delay]"
                                                           id="ProjectForm_delay" type="text" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_delay_em_"
                                                         style="display:none"></div>
                                                </div>
                                            </div>
                                            <div class="tab-group control-group clearfix">
                                                <h2>Устройства</h2>
                                                <div class="checkbox" id="service_only_mobile">
                                                    <input id="ytProjectForm_only_mobile" type="hidden" value="0"
                                                           name="ProjectForm[only_mobile]"/><input
                                                        name="ProjectForm[only_mobile]" id="ProjectForm_only_mobile"
                                                        value="1" type="checkbox"/> <label for="ProjectForm_only_mobile"
                                                                                           style="display:inline; margin-right:15px">
                                                        Только для мобильных устройств </label>
                                                </div>
                                                <p class="clearfix"></p>
                                                <p class="clearfix"></p>
                                            </div>
                                            <div class="tab-group clearfix">
                                                <div class="wall wall-half-margin clearfix row"
                                                     style="margin-bottom:20px">
                                                    <div class="control-group control-group-no-margin">
                                                        <label for="ProjectForm_stop_words">Стоп слова</label> <input
                                                            placeholder="запрещенные слова в комментариях через запятую"
                                                            name="ProjectForm[stop_words]" id="ProjectForm_stop_words"
                                                            type="text" maxlength="500" value=""/> <span
                                                            class="text-grey">Например: "спасибо, пожалуйста". Комментарии, в которых будут содержаться указанные слова не будут допущены на проверку.</span>
                                                        <div class="errorMessage" id="ProjectForm_stop_words_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </div>
                                                <p class="clearfix"></p>
                                            </div>
                                        </div>
                                        <div id="tab_4" class="tab_content">
                                            <p class="clearfix"></p>
                                            <div class="control-group row">
                                                <label for="ProjectForm_pages">Список страниц, с которыми можно
                                                    работать</label> <textarea
                                                    placeholder="Только прямые ссылки, каждую с новой строки."
                                                    style="width:100%" name="ProjectForm[pages]"
                                                    id="ProjectForm_pages"></textarea>
                                                <div class="errorMessage" id="ProjectForm_pages_em_"
                                                     style="display:none"></div>
                                            </div>
                                            <div class="wall" style="margin:20px 0">
                                                <h5>Важно</h5>
                                                <p>Список страниц, с которыми можно работать. Каждую ссылку с новой
                                                    строки. Другие страницы, система не пропустит в работу.</p>
                                                <p>Указывайте исключительно ссылки на страницы. Если хотите указать,
                                                    какие категории на
                                                    сайте необходимо комментировать, то пишите это в задании автору. В
                                                    поле "Ссылка на сайт
                                                    или страницу" укажите ссылку на главную страницу сайта.</p>
                                                <p>Если список ссылок не указан, то авторы будут самостоятельно выбирать
                                                    на сайте.</p>
                                            </div>
                                        </div>
                                        <div id="tab_5" class="tab_content">
                                            <p class="clearfix"></p>
                                            <div class="row control-group"
                                                 style="margin-bottom:23px; width: 450px; display: inline-block">
                                                <label for="ProjectForm_countries_id">Страна</label> <select
                                                    data-placeholder="Выберите страну" id="country_choose"
                                                    name="country">
                                                    <option value=""></option>
                                                    <option value="112">Украина</option>
                                                    <option value="20">Российская Федерация</option>
                                                    <option value="113">Беларусь</option>
                                                    <option value="138">Молдова</option>
                                                    <option value="16">Казахстан</option>
                                                    <option value="153">Азербайджан</option>
                                                    <option value="152">Узбекистан</option>
                                                    <option value="124">Грузия</option>
                                                    <option value="126">Армения</option>
                                                    <option value="111">Латвия</option>
                                                    <option value="144">Литва</option>
                                                    <option value="78">Ливия</option>
                                                    <option value="135">Таджикистан</option>
                                                    <option value="210">Кыргызстан</option>
                                                    <option value="140">Эстония</option>
                                                    <option value="209">Туркменистан</option>
                                                </select></div>
                                            <div class="row control-group"
                                                 style="margin-bottom:23px; width: 450px; display: inline-block">
                                                <label for="ProjectForm_cities_id">Город</label> <select
                                                    data-placeholder="Выберите город" id="city_choose" name="city">
                                                    <option value=""></option>
                                                </select></div>
                                            <br>
                                            <div id="dropDownForExceptCity" style="display: none;">
                                                <select data-placeholder="Добавить исключение"
                                                        class="city_except_choose" name="city_except" id="city_except">
                                                    <option value=""></option>
                                                </select></div>
                                            <br>
                                            <div style="display: block">
                                                <h2>Список стран и городов</h2>
                                                <ul id="list_geo" style="display: block">
                                                    <li id="withoutlimit"><b>Без ограничений</b></li>
                                                </ul>
                                            </div>
                                            <br><br><br>
                                        </div>
                                        <div id="tab_6" class="tab_content" style="display: none">
                                            <div class="list-social-acc">
                                                <!-- include the jQuery and jQuery UI scripts -->
                                                <div class="errorMessage" id="ProjectForm_selectedSocial_em_"
                                                     style="display:none"></div>
                                                <div style="position: relative; float: left; width: 100%;">
                                                    <div class="tab-group clearfix social-setting-group">
                                                        <h2>Vkontakte</h2>
                                                        <div class="social-checkbox simple checkBox-2" data-social="2">
                                                            <input id="ProjectForm_selectedSocial"
                                                                   name="ProjectForm[selectedSocial][]" value="2"
                                                                   type="checkbox">
                                                        </div>
                                                        <div class="elBlocl" style="display: block"></div>
                                                        <div class="one-soc-sett">
                                                            <label for="ProjectForm_vkontakte_friends">Количество
                                                                друзей</label> <input value="50"
                                                                                      name="ProjectForm[vkontakte_friends]"
                                                                                      id="ProjectForm_vkontakte_friends"
                                                                                      type="text"/>
                                                            <div class="errorMessage"
                                                                 id="ProjectForm_vkontakte_friends_em_"
                                                                 style="display:none"></div>
                                                        </div>
                                                        <div class="one-soc-sett">
                                                            <label for="ProjectForm_vkontakte_sex">Пол</label> <select
                                                                name="ProjectForm[vkontakte_sex]"
                                                                id="ProjectForm_vkontakte_sex">
                                                                <option value="0">Не важно</option>
                                                                <option value="1">Женский</option>
                                                                <option value="2">Мужской</option>
                                                            </select>
                                                            <div class="errorMessage" id="ProjectForm_vkontakte_sex_em_"
                                                                 style="display:none"></div>
                                                        </div>
                                                        <div class="timer clearfix">
                                                            <label style="top: 5px; position: relative"
                                                                   for="ProjectForm_start_time">Возраст</label>
                                                            <div style="position: relative; ">
                                                                <div>
                                                                    <input data-blockmin="ProjectForm_vkontakte_minAge"
                                                                           data-blockmax="ProjectForm_vkontakte_maxAge"
                                                                           type="text" class="range social-2"
                                                                           id="vk_range" value="" name="range"/>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" style="width:80px"
                                                                   id="ProjectForm_vkontakte_minAge"
                                                                   name="ProjectForm[vkontakte_minAge]" value="">
                                                            <input type="hidden" style="width:80px"
                                                                   id="ProjectForm_vkontakte_maxAge"
                                                                   name="ProjectForm[vkontakte_maxAge]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="tab-group clearfix social-setting-group">
                                                        <h2>Facebook</h2>
                                                        <div class="social-checkbox simple checkBox-1" data-social="1">
                                                            <input name="ProjectForm[selectedSocial][]" value="1"
                                                                   type="checkbox">
                                                        </div>
                                                        <div class="elBlocl" style="display: block"></div>
                                                        <div class="one-soc-sett">
                                                            <label for="ProjectForm_facebook_sex">Пол</label> <select
                                                                name="ProjectForm[facebook_sex]"
                                                                id="ProjectForm_facebook_sex">
                                                                <option value="0">Не важно</option>
                                                                <option value="1">Женский</option>
                                                                <option value="2">Мужской</option>
                                                            </select>
                                                            <div class="errorMessage" id="ProjectForm_facebook_sex_em_"
                                                                 style="display:none"></div>
                                                        </div>
                                                        <div class="timer clearfix">
                                                            <label style="top: 5px; position: relative"
                                                                   for="ProjectForm_start_time">Возраст</label>
                                                            <div style="position: relative; ">
                                                                <div>
                                                                    <input data-blockmin="ProjectForm_facebook_minAge"
                                                                           data-blockmax="ProjectForm_facebook_maxAge"
                                                                           type="text" class="range social-1"
                                                                           id="facebook_range" value="" name="range"/>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" style="width:80px"
                                                                   id="ProjectForm_facebook_minAge"
                                                                   name="ProjectForm[facebook_minAge]" value="">
                                                            <input type="hidden" style="width:80px"
                                                                   id="ProjectForm_facebook_maxAge"
                                                                   name="ProjectForm[facebook_maxAge]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="tab-group clearfix social-setting-group">
                                                        <h2>Instagram</h2>
                                                        <div class="social-checkbox simple checkBox-5" data-social="5">
                                                            <input name="ProjectForm[selectedSocial][]" value="5"
                                                                   type="checkbox">
                                                        </div>
                                                        <div class="elBlocl" style="display: block"></div>
                                                        <div class="one-soc-sett">
                                                            <label for="ProjectForm_instagram_subscribe">Количество
                                                                подписчиков</label> <input value="20"
                                                                                           name="ProjectForm[instagram_subscribe]"
                                                                                           id="ProjectForm_instagram_subscribe"
                                                                                           type="text"/>
                                                            <div class="errorMessage"
                                                                 id="ProjectForm_instagram_subscribe_em_"
                                                                 style="display:none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-group clearfix social-setting-group">
                                                    <h2>Одноклассники</h2>
                                                    <div class="social-checkbox simple checkBox-8" data-social="8">
                                                        <input name="ProjectForm[selectedSocial][]" value="8"
                                                               type="checkbox">
                                                    </div>
                                                    <div class="elBlocl" style="display: block"></div>
                                                    <div class="one-soc-sett">
                                                        <label for="ProjectForm_odnoklasniki_friends">Количество
                                                            друзей</label> <input value="30"
                                                                                  name="ProjectForm[odnoklasniki_friends]"
                                                                                  id="ProjectForm_odnoklasniki_friends"
                                                                                  type="text"/>
                                                        <div class="errorMessage"
                                                             id="ProjectForm_odnoklasniki_friends_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="one-soc-sett">
                                                        <label for="ProjectForm_odnoklasniki_sex">Пол</label> <select
                                                            name="ProjectForm[odnoklasniki_sex]"
                                                            id="ProjectForm_odnoklasniki_sex">
                                                            <option value="0">Не важно</option>
                                                            <option value="1">Женский</option>
                                                            <option value="2">Мужской</option>
                                                        </select>
                                                        <div class="errorMessage" id="ProjectForm_odnoklasniki_sex_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                    <div class="timer clearfix">
                                                        <label style="top: 5px; position: relative"
                                                               for="ProjectForm_start_time">Возраст</label>
                                                        <div style="position: relative; ">
                                                            <div>
                                                                <input data-blockmin="ProjectForm_odnoklasniki_minAge"
                                                                       data-blockmax="ProjectForm_odnoklasniki_maxAge"
                                                                       type="text" class="range social-8"
                                                                       id="odnoklasniki_range" value="" name="range"/>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" style="width:80px"
                                                               id="ProjectForm_odnoklasniki_minAge"
                                                               name="ProjectForm[odnoklasniki_minAge]" value="">
                                                        <input type="hidden" style="width:80px"
                                                               id="ProjectForm_odnoklasniki_maxAge"
                                                               name="ProjectForm[odnoklasniki_maxAge]" value="">
                                                    </div>
                                                </div>
                                                <div class="tab-group clearfix social-setting-group">
                                                    <h2>Twitter</h2>
                                                    <div class="social-checkbox simple checkBox-3" data-social="3">
                                                        <input name="ProjectForm[selectedSocial][]" value="3"
                                                               type="checkbox">
                                                    </div>
                                                    <div class="elBlocl" style="display: block"></div>
                                                    <div class="one-soc-sett">
                                                        <label for="ProjectForm_twitter_follower">Количество
                                                            фолловеров</label> <input value="10"
                                                                                      name="ProjectForm[twitter_follower]"
                                                                                      id="ProjectForm_twitter_follower"
                                                                                      type="text"/>
                                                        <div class="errorMessage" id="ProjectForm_twitter_follower_em_"
                                                             style="display:none"></div>
                                                    </div>
                                                </div>
                                                <div class="social-checkbox checkBox-7" data-social="7"
                                                     style="position: relative; float: left; width: 100%; left: 0px;">
                                                    <input id="otherSoc" name="ProjectForm[selectedSocial][]" value="7"
                                                           type="checkbox">
                                                    <label for="otherSoc" style="cursor: pointer">Отключить
                                                        проверку</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right btn-left goToAll">
                                            <a href="/advert" style="margin-top:0"><i class=""></i>&larr; к списку
                                                проектов</a>
                                        </div>
                                        <div class="pull-left btn-left" style="margin-bottom:20px">
                                            <input type="submit" name="yt0" value="Создать проект"/></div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
