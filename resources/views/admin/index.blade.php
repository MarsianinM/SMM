@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-value-lg">195</div>
                    <div>Новых пользователей</div>
                    <div class="progress progress-xs my-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-muted">За текущий месяц</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-value-lg">940</div>
                    <div>Новых тикетов</div>
                    <div class="progress progress-xs my-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 94%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-muted">За текущий месяц</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-value-lg">14 300 RUB</div>
                    <div>Выручка с комиссий</div>
                    <div class="progress progress-xs my-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-muted">За текущий месяц</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-value-lg">511</div>
                    <div>Сообщений в тех. поддержку</div>
                    <div class="progress progress-xs my-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 78%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-muted">За текущий месяц</small>
                </div>
            </div>
        </div>

    </div>
@endsection