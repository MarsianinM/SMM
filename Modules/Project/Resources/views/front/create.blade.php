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

        select {
            padding: 7px 10px;
            max-width: 100%;
            font-size: 13px;
            width: 70%;
        }

        label {
            display: block;
            width: 100%;
            clear: both;
        }

        .control-group input {
            width: 70%;
            padding: 5px 10px;
            max-width: 100%;
            font-size: 13px;
        }

        textarea {
            height: 200px;
            margin-bottom: 20px;
        }
    </style>
    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">@lang('project::client.create_project_title')</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        <form action="{{ route('client.projects.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div id="step_2" class="form" style="display:block">
                                <div class="container">
                                    <div class="information-line clearfix line-n-margin">
                                        <div class="head_author_line pull-left">
                                            Создание нового проекта
                                        </div>
                                    </div>
                                    <div class="extra-line-switch clearfix">
                                        <ul>
                                            <li class="active"><a href="#tab_1" id="forerrors1">Основные</a></li>
                                            <li><a href="#tab_2" id="forerrors2">Дополнительные</a></li>
                                            <li><a href="#tab_4" id="forerrors4">Страницы</a></li>
                                        </ul>
                                    </div>
                                    <div class="tabs">
                                        <div id="tab_1" class="tab_content" style="display: block">
                                            <article class="edit-persona">
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_Copy" style="margin-bottom:9px">Скопировать
                                                        настройки проекта</label>
                                                    <select id="doCopy">
                                                        <option>Выберите проект, с которого скопировать настройки
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_title" class="required">Название <span
                                                            class="required">*</span></label>

                                                    <input
                                                        placeholder="название видно авторам" name="title"
                                                        id="ProjectForm_title" type="text" maxlength="150" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_title_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_url">Ссылка на сайт или страницу</label>


                                                    <input
                                                        placeholder="ссылка на сайт или отдельную страницу, с http://"
                                                        name="link" id="ProjectForm_url" type="text"
                                                        maxlength="1000" value=""/>
                                                    <div class="errorMessage" id="ProjectForm_url_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_subjects" class="required">Тематика <span
                                                            class="required">*</span></label>
                                                    <select id="ProjectForm_subjects">
                                                        <option value="49">Азартные игры</option>
                                                        <option value="1">Блог</option>
                                                        <option value="2">Интернет магазин</option>
                                                        <option value="44">Форум</option>
                                                        <option value="0">Универсальная</option>
                                                        <option value="3">Hi-Tech</option>
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_subjects_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" id="rowLanguage"
                                                     style="margin-bottom:23px">
                                                    <label for="ProjectForm_language_id" class="required">Язык
                                                        комментариев <span class="required">*</span></label>
                                                    <select id="ProjectForm_language_id">
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
                                                                    <select id="newProject_currency_id" class="languageSelect" style="width:216px">
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
                                                                class="required">*</span></label>
                                                        <select id="ProjectForm_tarif_id" data-placeholder="Выберите тариф">
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
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="row control-group" id="video_price">
                                                        <label for="ProjectForm_minutes">Длительность видео в
                                                            минутах</label>

                                                        <input style="width:200px"
                                                               id="ProjectForm_minutes" type="text"
                                                               value="2"/>

                                                    </div>
                                                    <div class="row control-group " id="rowPremoderation"
                                                         style="margin-bottom:20px;">
                                                        <div style="float:left; margin-right:15px"><label
                                                                for="ProjectForm_premoderation">Премодерация
                                                                комментариев</label>
                                                        </div>
                                                        <select name="moderation_comments"
                                                                id="ProjectForm_premoderation">
                                                            <option value="0">Авторы публикуют сразу на Ваш сайт
                                                            </option>
                                                            <option value="1">Публикуют на сайт после Вашего одобрения
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="checkbox" id="rowNotlong">
                                                        <input id="ytProjectForm_notlong" type="hidden" value="0" name="small_comments"/>
                                                        <input name="small_comments" id="ProjectForm_notlong" value="1" type="checkbox"/>
                                                        <label  for="ProjectForm_notlong" style="display:inline; margin-right:15px">
                                                            Разрешить комментарии меньшего размера
                                                        </label>
                                                    </div>
                                                    <div class="checkbox  " id="service_screenshot">
                                                        <input id="ytProjectForm_screenshot" type="hidden" value="0" name="screenshot"/>
                                                        <input name="screenshot" id="ProjectForm_screenshot" value="1" type="checkbox"/>
                                                        <label for="ProjectForm_screenshot" style="display:inline; margin-right:15px">
                                                            Требовать скриншот от автора (
                                                            + <span class="currency-name screenshot_am"> RUB)</span>
                                                            )
                                                        </label>
                                                    </div>
                                                    <div class="checkbox" id="service_verification">
                                                        <input id="ytProjectForm_user_verification" type="hidden" value="0" name="user_pro"/>
                                                        <input name="user_pro" id="ProjectForm_user_verification" value="1" type="checkbox"/>
                                                        <label for="ProjectForm_user_verification" style="display:inline; margin-right:15px">
                                                            Только для верифицированных авторов (
                                                            + <span class="currency-name verification_am"> RUB)</span>
                                                            )
                                                        </label>
                                                    </div>
                                                </div>
                                            </article>
                                            <!--END FINANCE BLOCK-->
                                            <p class="clearfix"></p>
                                            <div class="row control-group">
                                                <label for="ProjectForm_task" class="required">Задание авторам <span
                                                        class="required">*</span></label>
                                                <textarea placeholder="Опишите задание для автора. В каком настроении комментарии, какие темы охватывать, что запрещено обсуждать и т.д..
                                                                        ВНИМАНИЕ! Готовые комментарии сюда не пишите, их сможете загрузить после создания проекта. Если необходимо, то указывайте список соц.
                                                                        сетей и требований к аккаунтам." style="width:100%" name="description" id="ProjectForm_task"></textarea>
                                            </div>

                                        </div>
                                        <div id="tab_2" class="tab_content">
                                            <article class="edit-persona">
                                                <div class="row control-group" style="margin-bottom:23px">

                                                        <label for="ProjectForm_group_id">Группа</label>
                                                    <select id="ProjectForm_group_id">
                                                        <option value="0" selected="selected">Без группы</option>
                                                        <option value="103174">Новая група</option>
                                                    </select>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_team_id">Команда авторов</label>
                                                    <select multiple="multiple" data-placeholder="Выберите команду"  id="ProjectForm_team_id">
                                                    </select>
                                                    <div class="errorMessage" id="ProjectForm_team_id_em_"
                                                         style="display:none"></div>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_author">Логин автора</label>
                                                    <input placeholder="Логин / Email" id="ProjectForm_author" type="text" value=""/>
                                                </div>
                                                <div class="row control-group" style="margin-bottom:23px">
                                                    <label for="ProjectForm_send_email">Уведомления о новых заявках</label>
                                                    <select id="ProjectForm_send_email">
                                                        <option value="1">Получать уведомления</option>
                                                        <option value="0">Не получать</option>
                                                    </select>
                                                </div>
                                            </article>
                                            <article class='notice notice-2 pull-right' id="comment_configs">
                                                <div class="wall white-wall row">
                                                    <div for="ProjectForm_comment_configs" style="width: 100%">Типы
                                                            комментариев</div>
                                                    <input id="ytProjectForm_comment_configs" type="hidden" value="" />
                                                    <div id="ProjectForm_comment_configs">
                                                        <div class="checkbox conficheck">
                                                            <span class="pull-left"><label for="ProjectForm_comment_configs_0">Отзывы</label></span>
                                                            <span class="pull-right">
                                                                <input id="ProjectForm_comment_configs_0" value="0" checked="checked" type="checkbox" />
                                                            </span>
                                                        </div>
                                                        <div class="checkbox conficheck">
                                                            <span class="pull-left"><label for="ProjectForm_comment_configs_1">Вопросы</label></span>
                                                            <span class="pull-right">
                                                                <input id="ProjectForm_comment_configs_1" value="1" checked="checked" type="checkbox"/>
                                                            </span>
                                                        </div>
                                                        <div class="checkbox conficheck">
                                                            <span class="pull-left"><label for="ProjectForm_comment_configs_2">Положительные</label></span>
                                                            <span class="pull-right">
                                                                <input id="ProjectForm_comment_configs_2" value="2" checked="checked" type="checkbox"/>
                                                            </span>
                                                        </div>
                                                        <div class="checkbox conficheck">
                                                            <span class="pull-left"><label for="ProjectForm_comment_configs_3">Нейтральные</label></span>
                                                            <span class="pull-right"><input id="ProjectForm_comment_configs_3" value="3" checked="checked" type="checkbox" />
                                                            </span>
                                                        </div>
                                                        <div class="checkbox conficheck">
                                                            <span class="pull-left"><label for="ProjectForm_comment_configs_4">Отрицательные</label></span>
                                                            <span class="pull-right"><input id="ProjectForm_comment_configs_4" value="4" type="checkbox" /></span>
                                                        </div>
                                                    </div>
                                                    <div class="errorMessage" id="ProjectForm_comment_configs_em_" style="display:none"></div>
                                                    <p>
                                                        <b>Пункт правил 5.13: Запрещено заказывать негативные отзывы и
                                                            оценки с целью ухудшения репутации 3-х лиц. </b>
                                                    </p>
                                                </div>
                                            </article>
                                            <p class="clearfix"></p>
                                            <div class="wall wall-half-margin clearfix">
                                                <div class="control-group">
                                                    <div class="clearfix"></div>
                                                    <div class="half-int pull-left row" style="float:left">
                                                        <label for="ProjectForm_date_start">Отложенный запуск проекта</label>
                                                        <div style="float:left">
                                                            <input placeholder="например: 2014-03-21 10:00:00" style="width:100%" name="date_start" id="ProjectForm_date_start" type="text" value=""/>
                                                        </div>
                                                    </div>
                                                    <div class="half-int pull-right row" style="float:left">
                                                        <label for="ProjectForm_date_end">Время, в которое проект будет приостановлен</label>
                                                        <div style="float:left">
                                                            <input placeholder="например: 2014-03-22 10:00:00"  style="width:100%" name="date_end" id="ProjectForm_date_end" type="text" value=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_4" class="tab_content">
                                            <p class="clearfix"></p>
                                            <div class="control-group row">
                                                <label for="ProjectForm_pages">Список страниц, с которыми можно работать</label>
                                                <textarea placeholder="Только прямые ссылки, каждую с новой строки." style="width:100%" name="page_link" id="ProjectForm_pages"></textarea>
                                                <div class="errorMessage" id="ProjectForm_pages_em_" style="display:none"></div>
                                            </div>
                                            <div class="wall" style="margin:20px 0">
                                                <h5>Важно</h5>
                                                <p>Список страниц, с которыми можно работать. Каждую ссылку с новой строки. Другие страницы, система не пропустит в работу.</p>
                                                <p>Указывайте исключительно ссылки на страницы. Если хотите указать, какие категории на
                                                    сайте необходимо комментировать, то пишите это в задании автору. В поле "Ссылка на сайт
                                                    или страницу" укажите ссылку на главную страницу сайта.</p>
                                                <p>Если список ссылок не указан, то авторы будут самостоятельно выбирать на сайте.</p>
                                            </div>
                                        </div>
                                        <div class="pull-left btn-left" style="margin-bottom:20px">
                                            <input type="submit" name="yt0" value="Создать проект"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function tabOrganizer() {
            $(".extra-line-switch li").click(function () {
                $(".extra-line-switch li").removeClass('active');
                $(this).addClass("active");
                $(".tab_content").hide();
                var selected_tab = $(this).find("a").attr("href");
                $(selected_tab).fadeIn();
                return false
            })
        }

        tabOrganizer();
    </script>

    <script>
        /*$(document).ready(function () {
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
        })*/
    </script>
@endsection
