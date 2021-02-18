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
                                <td>Комментарии на женский блог</td>
                                <td>12.00</td>
                                <td>50 минут</td>
                                <td>0/5</td>
                                <td class="d-none d-md-table-cell">
                                    02 Сен 2020
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
