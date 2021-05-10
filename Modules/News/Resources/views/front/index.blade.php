@extends('mainpage::layouts.front.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    @forelse($news as $item)
        <article class="uk-article row">
            <div class="col-3">
                <a href="{{ route('news.show', $item->slug) }}">
                    <img src="{{$item->getFirstMediaUrl('news', 'thumb') }}">
                </a>
            </div>
            <div class="col-9">
                <h3 class="uk-h3">
                    <a style="color: #4fa12c" href="{{ route('news.show', $item->slug) }}">{{$item->content_current_lang->title}}</a>
                </h3>
                <p class="uk-article-meta" style="color: #1b1e21">{{$item->created_at->format('d.m.Y')}}</p>
                {!!   mb_substr(strip_tags($item->content_current_lang->content), 0, 400) !!}...
            </div>
        </article>
    @empty
        <p>News not found</p>
    @endforelse
@endsection
