@extends('mainpage::layouts.front.app')

@section('content')
    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Мои проекты</h1>
                <a href="{{ route('client.projects.create') }}" class="btn btn-sm btn-primary d-inline-block">Создать проект</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if(count($projects))
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
                           @foreach($projects as $project)
                            <tr>
                                <td><a href="{{ route('client.projects.show', $project->id) }}">{{ $project->title }}</a></td>
                                <td>7.00</td>
                                <td>30 минут</td>
                                <td>0/5</td>
                                <td class="d-none d-md-table-cell">
                                    03 Сен 2020
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="p-2">
                                <p>
                                    @lang('project::client.error_not_found_project')
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
