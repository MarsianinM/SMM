@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Сообщения</h1>
                <a href="{{ route('messages.create') }}" class="btn btn-sm btn-primary d-inline-block">Написать</a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:20%;">Логин</th>
                                <th class="d-none d-md-table-cell" style="width:45%">Сообщения</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->user->email }}</td>
                                    <td><a href="{{ route('messages.show', ['message' => $message->id]) }}">{{ $message->message }}</a></td>
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
