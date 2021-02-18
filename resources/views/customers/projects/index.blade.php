@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Список проектов</h1>
                <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary d-inline-block">Создать проект</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:20%;">Название проекта</th>
                                <th style="width:10%">Цена</th>
                                <th style="width:10%">Время</th>
                                <th style="width:10%">Задания</th>
                                <th class="d-none d-md-table-cell" style="width:10%">Запуск</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Создать темы на вопроснике</td>
                                <td>7.00</td>
                                <td>30 минут</td>
                                <td>0/5</td>
                                <td class="d-none d-md-table-cell">
                                    03 Сен 2020
                                </td>
                            </tr>
                            <tr>
                                <td>Написать ком коммменты</td>
                                <td>5.00</td>
                                <td>20 минут</td>
                                <td>0/2</td>
                                <td class="d-none d-md-table-cell">
                                    04 Сен 2020
                                </td>
                            </tr>
                            <tr>
                                <td>Несколько комментариев для статьи</td>
                                <td>9.00</td>
                                <td>40 минут</td>
                                <td>0/2</td>
                                <td class="d-none d-md-table-cell">
                                    10 Сен 2020
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
