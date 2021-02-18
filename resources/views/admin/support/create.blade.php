@extends('admin.layouts.app')

@section('content')

    <main class="content">
        <div class="container">

            <h1 class="h4">Написать в поддержку</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('support.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="theme">Тема обращения</label>
                                    <input type="text" class="form-control" name="theme" id="theme" placeholder="Тема" autocomplete="off">
                                    @error('theme')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="message">Описание проблемы</label>
                                    <textarea class="form-control" rows="6" cols="10" name="message" id="message" autocomplete="off"></textarea>
                                    @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm float-right">Написать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
