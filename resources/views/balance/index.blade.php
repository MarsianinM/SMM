@extends('layouts.app')

@section('content')
    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">История баланса</h1>
                <a href="{{ route('finance.index') }}" class="btn btn-sm btn-primary d-inline-block">Пополнить баланс или вывести средства</a>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:10%;">Операция</th>
                                <th style="width:10%">Количество</th>
                                <th style="width:10%">Валюта</th>
                                <th style="width:20%">ID транзакции</th>
                                <th style="width:10%">Время</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($balances as $balance)
                                    <tr>
                                        <td>{{ $balance->operation }}</td>
                                        <td>{{ $balance->amount }}</td>
                                        <td>{{ $balance->currency }}</td>
                                        <td>{{ $balance->transaction_id }}</td>
                                        <td>{{ $balance->reated_at }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">Ваша история пуста!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
