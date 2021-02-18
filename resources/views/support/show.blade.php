@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">{{ $support->theme }}</h1>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="float-right text-right" style="width: 70%">
                                        <small class="d-block text-muted">Дата сообщения: {{ $support->created_at }}</small>
                                        <div>
                                            {{ $support->message }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($messages as $message)
                            <tr>
                                <td>
                                    @if ($message->sender_id == Auth::id())
                                    <div class="float-right text-right" style="width: 70%">
                                        <small class="d-block text-muted">Дата сообщения: {{ $message->created_at }}</small>
                                        <div>
                                            {{ $message->message }}
                                        </div>
                                    </div>
                                    @else
                                        <div>
                                            <small class="d-block text-muted">Дата сообщения: {{ $message->created_at }}</small>
                                            <div>
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('support.message', ['support' => $support->id]) }}" method="POST">
                                @csrf
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
