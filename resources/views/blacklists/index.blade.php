@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Черный список</h1>
                <a href="{{ route('blacklist.create') }}" class="btn btn-sm btn-primary d-inline-block">Добавить</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:20%;">Логин</th>
                                <th style="width:65%">Тип пользователя</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>customer</td>
                                <td>Заблокировать заказчика</td>
                                <td class="table-action">
                                    <a href="#" class="btn btn-sm btn-danger">
                                        Убрать
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>admin</td>
                                <td>Заблокировать пользователя</td>
                                <td class="table-action">
                                    <a href="#" class="btn btn-sm btn-danger">
                                        Убрать
                                    </a>
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
