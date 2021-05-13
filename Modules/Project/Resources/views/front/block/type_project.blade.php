<div class="project__title">
    <p>@lang('project::project.type_title_block')</p>
</div>

<div class="item__type__project">
    <a href="#comments" class="type__item comments" data-show="comments">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_comments')
        </div>
    </a>

    <a href="#reposts" class="type__item reposts" data-show="reposts">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item1.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_reposts')
        </div>
    </a>


    <a href="#followers" class="type__item followers" data-show="followers">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item2.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_followers')
        </div>
    </a>


    <a href="#videos" class="type__item videos" data-show="videos">
        <div class="image__type">
            <img src="{{ asset('frontend/img/_src/type__item3.png') }}" alt="type__item">

        </div>
        <div class="text__type">
            @lang('project::project.type_videos')
        </div>
    </a>
</div>
