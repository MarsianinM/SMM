@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">Не могу вывести деньги</h1>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <small class="d-block text-muted">Дата сообщения: 2021-02-16 19:31</small>
                                    <div>
                                        Привет, поддержка!
                                        Я искал эту функцию и не мог ее найти. Есть ли она у вас? Если нет, не могли бы вы добавить ее в список предложений?
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label" for="message">Ваше сообщения</label>
                                    <textarea class="form-control" rows="4" cols="10" name="message" id="message" autocomplete="off"></textarea>
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
