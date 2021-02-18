@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">Добавить в Черный список</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Логин</label>
                                    <input type="email" class="form-control" placeholder="Логин" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Тип пользователя</label>
                                    <select class="form-control" autocomplete="off">
                                        <option value="1">Заблокировать автора</option>
                                        <option value="2">Заблокировать заказчика</option>
                                        <option value="3">Заблокировать сообщения</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm float-right">Заблокировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
