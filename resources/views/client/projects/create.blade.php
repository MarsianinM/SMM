@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Создать проект</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-3">
                        <form action="">
                            <div class="form-group">
                                <label for="name">Название проекта</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Название проекта">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="category_id">Выберите категорию</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option value="">-- Тип задания --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="comment_length">Длина комментария</label>
                                        <select name="comment_length" class="form-control" id="comment_length">
                                            <option value="">-- Кол-во знаков --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="domain">Ссылка на сайт/страницу</label>
                                        <input type="text" name="domain" class="form-control" id="domain" placeholder="https://google.com">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="comment_length">На каком языке постинг?</label>
                                        <select name="comment_length" class="form-control" id="comment_length">
                                            <option value="">Русский</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Описание задания для исполнителей</label>
                                <textarea name="content" class="form-control" id="content" cols="10" rows="6" placeholder="Опишите задание для исполнителей, что и как делать и в какой последовательности."></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="plan">Тарифный план</label>
                                        <select type="text" name="plan" class="form-control" id="plan">
                                            <option value="">Выберите тарифный план</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="price">Цена выполнения</label>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="$20">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="currency">Валюта оплаты</label>
                                        <select name="currency" class="form-control" id="currency">
                                            <option value="">UAH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="countries">Задание доступно исполнителям из стран? </label>
                                        <select name="countries" class="form-control" id="countries">
                                            <option value="">Все</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="screenshot" class="form-check-input" id="screenshot" value="1">
                                    <label for="screenshot" class="form-check-label">Требовать screenshot от автора</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="verified" class="form-check-input" id="verified" value="1">
                                    <label for="verified" class="form-check-label">Только верифицированным пользователям</label>
                                </div>
                            </div>
                            <h2 class="h4 mt-3">Дополнительно</h2>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="group_id">Группа заданий</label>
                                        <select name="group_id" class="form-control" id="group_id">
                                            <option value="">Без группы</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="author_group_id">Команда авторов</label>
                                        <select name="author_group_id" class="form-control" id="author_group_id">
                                            <option value="">Выбрать группу авторов</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="notification">Уведомления о новых заявках</label>
                                        <select name="notification" class="form-control" id="notification">
                                            <option value="">Получать уведомления</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">Создать проект</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
