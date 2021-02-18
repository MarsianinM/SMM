@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите свою почту</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Мы отправили письмо с ссылкой на Вашу почту ещё раз.
                        </div>
                    @endif

                    Прежде чем продолжить, Вам необходимо подтвердить свою почту.
                    Если вы не получили письмо,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите чтобы отправить ещё раз</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
