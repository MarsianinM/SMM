@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Исполнители</h1>
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary d-inline-block">Предложить работу</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:10%;">Имя</th>
                                <th style="width:10%">Минимальная цена</th>
                                <th style="width:10%">Средняя цена</th>
                                <th style="width:10%">Статистика</th>
                                <th class="d-none d-md-table-cell" style="width:20%">Онлайн</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>12.00</td>
                                <td>0.00 $</td>
                                <td>0/0/0</td>
                                <td class="d-none d-md-table-cell">
                                    16 Фев 2021
                                    (4 часа назад)
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
