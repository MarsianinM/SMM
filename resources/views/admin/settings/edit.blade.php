@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Редактирование настройки "{{ $setting->key }}"</div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update', $setting) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="form-label">Ключ</label>
                            <input type="text" class="form-control" value="{{ $setting->key }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Значение</label>
                            <input type="text" class="form-control" placeholder="Значение настройки" autocomplete="off" value="{{ $setting->value }}" name="value">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection