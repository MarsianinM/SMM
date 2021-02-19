@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> Настройки</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>Ключ</th>
                    <th>Значение</th>
                    <th>Тип</th>
                    <th style="width: 200px">Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($settings as $setting)
                    <tr>
                        <td>{{ $setting->key }}</td>
                        <td>{{ $setting->value }}</td>
                        <td>{{ $setting->type }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.settings.edit', $setting) }}">Редактировать</a>
                        </td>
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