@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">Написать</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label" for="login">Кому</label>
                                    <input type="text" class="form-control" name="login" id="login" placeholder="Логин пользователя" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="theme">Тема обращения</label>
                                    <input type="text" class="form-control" name="theme" id="theme" placeholder="Тема" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="message">Сообщения</label>
                                    <textarea class="form-control" rows="6" cols="10" name="message" id="message" autocomplete="off"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm float-right">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
