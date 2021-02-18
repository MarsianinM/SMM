@extends('layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">{{ $message->user->email }}</h1>

            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    @if ($message->sender_id == Auth::id())
                                        <div class="float-right text-right" style="width: 70%">
                                            <small class="d-block text-muted">Дата
                                                сообщения: {{ $message->created_at }}</small>
                                            <div>
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="float-left" style="width: 70%">
                                            <small class="d-block text-muted">Дата
                                                сообщения: {{ $message->created_at }}</small>
                                            <div>
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            @foreach ($messages as $item)
                                <tr>
                                    <td>
                                        @if ($item->sender_id == Auth::id())
                                            <div class="float-right text-right" style="width: 70%">
                                                <small class="d-block text-muted">Дата
                                                    сообщения: {{ $item->created_at }}</small>
                                                <div>
                                                    {{ $item->message }}
                                                </div>
                                            </div>
                                        @else
                                            <div>
                                                <small class="d-block text-muted">Дата
                                                    сообщения: {{ $item->created_at }}</small>
                                                <div>
                                                    {{ $item->message }}
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
                            <form action="{{ route('message.message', ['message' => $message->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $message->sender_id }}">
                                <div class="form-group">
                                    <label class="form-label" for="message">Ваше сообщения</label>
                                    <textarea class="form-control" rows="4" cols="10" name="message" id="message"
                                              autocomplete="off"></textarea>
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
