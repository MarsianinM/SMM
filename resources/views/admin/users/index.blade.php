@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> Пользователи</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Баланс</th>
                    <th>Активная роль</th>
                    <th>Администратор?</th>
                    <th>Почта подтверждена?</th>
                    <th>Дата регистрации</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->getBalanceByCurrency('RUB') }} RUB / {{ $user->getBalanceByCurrency('USD') }} USD
                        </td>
                        <td>{{ $user->activeRole()->name }}</td>
                        <td>
                            @if($user->hasRole('admin'))
                                <span class="badge badge-success">Да</span>
                            @else
                                <span class="badge badge-danger">Нет</span>
                            @endif
                        </td>
                        <td>
                            @if(is_null($user->email_verified_at))
                                <span class="badge badge-danger">Не подтверждена</span>
                            @else
                                <span class="badge badge-success">Подтверждена</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Данные отсутствуют.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection