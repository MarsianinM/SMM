@extends('mainpage::layouts.front.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <article class="uk-article row">
        <div class="col-3">

                <img src="{{ $page->getFirstMediaUrl('news', 'thumb') }}">
        </div>
        <div class="col-9">
            <h1 class="uk-h3">
                {{$page->content_current_lang->title}}
            </h1>
            <p class="uk-article-meta" style="color: #1b1e21">{{$page->created_at->format('d.m.Y')}}</p>
            {!! $page->content_current_lang->content !!}
        </div>
    </article>
@endsection
