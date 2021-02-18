@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Список заявок</h1>
                <a href="{{ route('support.create') }}" class="btn btn-sm btn-primary d-inline-block">Написать</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:20%;">Дата/Время</th>
                                <th style="width:25%">Тема обращения</th>
                                <th class="d-none d-md-table-cell" style="width:45%">Сообщения</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($supports as $support)
                            <tr>
                                <td>{{ $support->created_at }}</td>
                                <td><a href="{{ route('support.show', ['support' => $support->id]) }}">{{ $support->theme }}</a></td>
                                <td class="d-none d-md-table-cell">
                                    {{ $support->message }}
                                </td>
                                <td class="table-action">
                                    <form action="{{ route('support.destroy', ['support' => $support->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                             Удалить
                                        </button>
                                    </form>
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
