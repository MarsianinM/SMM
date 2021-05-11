<div class="project__title">
    <p>@lang('project::project.type_title_block')</p>
</div>

<div class="item__type__project">
    <a href="#" class="type__item" data-show="comments">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_comments')
        </div>
    </a>

    <a href="#" class="type__item" data-show="reposts">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item1.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_reposts')
        </div>
    </a>


    <a href="#" class="type__item" data-show="followers">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item2.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_followers')
        </div>
    </a>


    <a href="#" class="type__item" data-show="videos">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item3.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_videos')
        </div>
    </a>
</div>
