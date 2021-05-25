@extends('mainpage::layouts.front.app')

@section('stylesheet')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.datetimepicker.min.css') }}">
@endsection

@section('content')
    <form style="margin-bottom: 30px" action="{{ route('client.projects.store') }}" method="POST">
        @csrf
        <input name="client_id" type="hidden" value="{{ auth()->id() }}">
        <input name="type_project" id="type_project-input" type="hidden" value="{{ old('type_project') }}">

        <div class="wrapper-type_project">
            @include('project::front.block.type_project')
        </div>
        <div class="create_project">
            <div class="project__title">
                @lang('project::project.page_title')
            </div>

            <nav class="create__project__navigation">
                <ul>
                    <li class="proj_nav_item active__nav first__open">@lang('project::all_users.project_the_main')</li>
                    <li class="proj_nav_item second__open">@lang('project::all_users.project_additional')</li>
                    <li class="proj_nav_item third__open">@lang('project::all_users.project_limitations')</li>
                    <li class="proj_nav_item fourth__open">@lang('project::all_users.project_pages')</li>
                    {{--<li class="proj_nav_item fifth__open">@lang('project::all_users.project_geo_targeting')</li>--}}
                    <li class="proj_nav_item sixth__open">@lang('project::all_users.project_account_requirements')</li>
                </ul>
            </nav>

            {{-- Основные --}}
            <div class="new__of__navigation first__navigation">
                <div>
                    <div class="inner__new__navigation">
                        <div class="left__main__nav" style="width: 411px;">
                            <div class="main__select__item">
                                <p>@lang('project::all_users.enter_title')
                                    @error('title')
                                        <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <input class="main__input__other @error('link') is-invalid validate__input @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="@lang('project::all_users.enter_title')">
                            </div>
                            <div class="main__select__item">
                                <p>@lang('project::all_users.enter_link_in_page')
                                    @error('link')
                                    <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <input class="main__input__other @error('link') is-invalid validate__input @enderror" type="link" name="link"  value="{{ old('link') }}" placeholder="@lang('project::all_users.enter_link_in_page')">
                            </div>
                            @if($subjects)
                                <div class="main__select__item">
                                    <p>@lang('project::all_users.enter_subject')
                                        @error('subject_id')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <select class="custom-select1 sources validate__input js-example-basic-single @error('subject_id') is-invalid validate__input @enderror"
                                            name="subject_id">
                                        <option value="0">--</option>
                                        @foreach($subjects as $subject)
                                            <option @if($subject->id == old('subject_id')) selected @endif value="{{ $subject->id }}">{{ $subject->subject_title_currentLang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="main__select__item">
                                <p>@lang('project::all_users.enter_language')
                                    @error('language')
                                    <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <select class="custom-select sources @error('language') is-invalid validate__input @enderror" name="language" placeholder="@lang('project::all_users.enter_'.old('language', 'russian'))" id="language">
                                    @foreach(app(\Modules\Project\Entities\Project::class)->getLanguagesComments() as $lan)
                                        <option @if($lan === old('language')) selected @endif value="{{$lan}}">@lang('project::all_users.enter_'.$lan) </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_assignment_to_authors')
                                    @error('description')
                                    <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <textarea name="description" id="description" class="@error('description') is-invalid validate__input @enderror" placeholder="@lang('project::project.enter_assignment_help')">{{ old('description') }}</textarea>
                            </div>

                            {{--<div class="choose__file">
                                <label class="filelabel">
                                    <img src="{{ asset('img/_src/choose__file.svg') }}" alt="choose__file">
                                    <span class="title">
                                                    Add File
                                                </span>
                                    <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file">
                                </label>
                                <span>@lang('project::project.enter_size_file_help')</span>
                            </div>--}}
                        </div>


                        <div class="right__main__nav" style="width: 555px; margin-top: 55px!important;">
                            <div class="first__right">
                                @if(!empty($currency) && count($currency))
                                    <div class="main__select__item">
                                        <p>@lang('project::project.enter_currency_to_bay')
                                            @error('currency_id')
                                            <span class="red__validate">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <select class="custom-select sources @error('currency_id') is-invalid validate__input @enderror" name="currency_id" placeholder="{{ $currency[0]->code }}" id="">
                                            @foreach($currency as $cur)
                                                <option  @if($cur->id === old('currency_id')) selected @endif value="{{ $cur->id }}">{{$cur->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if(!empty($rates) && count($rates))
                                    <div class="main__select__item">
                                        <p>@lang('project::project.enter_rates')
                                            @error('rate_id')
                                            <span class="red__validate">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <select class="custom-select1 sources validate__input js-example-basic-single
                                                @error('rate_id') is-invalid validate__input @enderror"
                                                name="rate_id" placeholder="@if(empty($project->rate_title)) @lang('project::project.enter_rates') @else {{$project->rate_title}} @endif" id="">
                                            <option data-price="" value="0">@lang('project::project.enter_rates_option')</option>
                                            @foreach($rates as $cat_rate)
                                                <optgroup label="{{ $cat_rate->content_current_lang->title }}">
                                                    @foreach($cat_rate->rates as $rate)
                                                        <option data-price="{{ $rate->price }}" @if($rate->id === old('rate_id')) selected @endif value="{{ $rate->id }}">{{$rate->content_current_lang_rate->title }} {{ $rate->price }} @if(count($currency)) {{ $currency[0]->symbol }} @endif</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="main__select__item" id="price_block">
                                        <p>@lang('project::project.enter_price')
                                            @error('price')
                                            <span class="red__validate">{{ $message }}</span>
                                            @enderror
                                        </p>
                                        <input class="main__input__other @error('price') is-invalid validate__input @enderror"
                                               type="text" name="price" value="{{ old('price') }}"
                                               placeholder="@lang('project::project.enter_price')">
                                        <div id="price_show_middle">
                                            <span id="average_price">@lang('project::project.enter_average_price')</span>
                                            <span id="min_price" style="display: none;">
                                                @lang('project::project.enter_average_min_price')
                                            </span>
                                            <span id="max_price" style="display: none;">
                                                @lang('project::project.enter_average_max_price')
                                            </span>
                                        </div>
                                    </div>
                                @endif

                                <div class="main__select__item">
                                    <p>@lang('project::project.enter_comments_moderation')
                                        @error('moderation_comments')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <select class="custom-select sources @error('moderation_comments') is-invalid validate__input @enderror" name="moderation_comments" id="moderation_comments" placeholder="@if(old('moderation_comments') == 1)
                                    @lang('project::project.select_immediately')
                                    @else
                                    @lang('project::project.select_after_approval')
                                    @endif">
                                        <option @if(old('moderation_comments') == 1) selected @endif value="1">@lang('project::project.select_immediately')</option>
                                        <option @if(old('moderation_comments') != 1) selected @endif value="0">@lang('project::project.select_after_approval')</option>
                                    </select>
                                </div>

                                <div class="checkbox__main">
                                    <div class="big__main__nav">
                                        <input class=" @error('small_comments') is-invalid validate__input @enderror" type="checkbox" @if(old('small_comments') == 1) checked @endif name="small_comments" id="main__check1" value="1">
                                        <label for="main__check1">@lang('project::project.enter_small_comments')</label>
                                        @error('small_comments')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" class=" @error('screenshot') is-invalid validate__input @enderror" id="main__check2" @if(old('screenshot') == 1) checked @endif name="screenshot" value="1">
                                        <label for="main__check2">@lang('project::project.enter_small_comments')</label>
                                        @error('screenshot')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" class=" @error('user_pro') is-invalid validate__input @enderror" id="main__check3" @if(old('user_pro') == 1) checked @endif name="user_pro" value="1">
                                        <label for="main__check3">@lang('project::project.enter_user_pro')</label>
                                        @error('user_pro')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="second__right">
                                <ul class="second__numeration">
                                    <li><span>5.6</span>Запрещено требовать в задании репост и комментарий в одном проекте. Для этого создаются разные проекты и оплачиваются отдельно.</li>

                                    <li><span>5.7</span>Запрещено требовать больше символов в комментарии, чем указано в выбранном тарифе. При необходимости дополнительного количества символов, заказчик обязывается установить надбавку.</li>

                                    <li><span>5.8</span>Если на сайте необходима активация аккаунта, посредством СМС, то заказчик обязывается указать это в задании и установить надбавку к стоимости комментария.</li>

                                    <li><span>5.9</span>Запрещено создавать проекты, затрагивающие политические темы.</li>

                                    <li><span>5.10</span>Для требования скриншота выполненной работы, Заказчик обязуется использовать соответствующую опцию в настройках проекта.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="create__project__btn" >
                        <button type="submit">
                            <span>
                                <img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon">
                            </span>
                            @lang('project::project.submit_edit')
                        </button>
                    </div>
                </div>
            </div>
            {{-- Дополнительные --}}
            <div class="new__of__navigation second__navigation">
                <div>
                    <div class="inner__new__navigation">
                        <div class="left__main__nav" style="width: 400px;">
                            @if(isset($project_group) && count($project_group))
                                <div class="main__select__item">
                                    <p>@lang('project::project.enter_project_group')
                                        @error('group_id')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <select class="custom-select1 sources validate__input js-example-basic-single  @error('group_id') is-invalid validate__input @enderror"
                                            name="group_id" id="group_id">
                                        @include('project::front.block.group', [
                                            'project_group' => $project_group,
                                            'project_id' => $project->id ?? 0,
                                            'delimiter' => $delimiter
                                        ])
                                    </select>
                                </div>
                            @endif
                            @if($user_group->count())
                                <div class="main__select__item">
                                    <p>@lang('project::project.enter_client_group')
                                        @error('author_group_id')
                                        <span class="red__validate">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <select class="custom-select1 sources validate__input js-example-basic-single  @error('author_group_id') is-invalid validate__input @enderror"
                                            name="author_group_id" id="author_group_id">
                                        {{--<select class="custom-select1 sources validate__input js-example-basic-multiple" name="author_group_id[]" multiple="multiple" id="client_id">--}}
                                        <option value="0">-- @lang('project::project.enter_client_group')</option>
                                        @foreach($user_group as $item)
                                            <option @if($item->id == old('author_group_id')) selected @endif value="{{$item->id}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            {{--<div class="main__select__item">
                                <p>Логин автора</p>
                                <input class="main__input__other" type="text" placeholder="Логин / Email">
                            </div>--}}

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_client_notifications')
                                    @error('notification')
                                    <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <select class="custom-select sources @error('notification') is-invalid validate__input @enderror"
                                        placeholder="@lang('project::project.enter_client_notification'.old('notification', '1'))"
                                        name="notification" id="notification">
                                    <option @if(old('notification') == 1) selected @endif value="1">@lang('project::project.enter_client_notification1')</option>
                                    <option @if(old('notification') == 0) selected @endif value="0">@lang('project::project.enter_client_notification0')</option>
                                </select>
                            </div>


                            <div class="first__right first__for__margin">
                                <div class="main__select__item">
                                    <p>@lang('project::project.enter_date_start')</p>

                                    <div class="with__hint__input">
                                        <input class="main__input__other datepicker @error('date_start') is-invalid validate__input @enderror"
                                               name="date_start" type="text"
                                               placeholder="Например: 2021/02/08 10:00:00" value="{{ old('date_start') }}">
                                        <span class="hint">?</span>
                                        <div class="text__hint">
                                            Подсказка
                                        </div>
                                    </div>
                                </div>
                                <div class="main__select__item">
                                    <p>@lang('project::project.enter_date_finish')</p>
                                    <div class="with__hint__input">

                                        <input class="main__input__other datepicker @error('date_finish') is-invalid validate__input @enderror"
                                               type="text" name="date_finish" placeholder="Например: 2021/02/08 10:00:00" value="{{ old('date_finish') }}">

                                        <span class="hint">?</span>
                                        <div class="text__hint">
                                            Подсказка
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="block_notifications" class="right__main__nav" style="width: 560px; margin-top: 50px!important;">
                            <div class="first__right">
                                <h3>@lang('project::project.email_notifications')</h3>
                                <div class="checkbox__main" style="margin-top: 21px;">
                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[review]"
                                               @if(old('email_notifications.review') == 1) checked @endif
                                               class="@error('email_notifications.review') is-invalid validate__input @enderror" id="review" value="1">
                                        <label for="review">@lang('project::project.enter_review')</label>
                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[question]" @if(old('email_notifications.question') == 1) checked @endif
                                        class="@error('email_notifications.question') is-invalid validate__input @enderror" id="question" value="1">
                                        <label for="question">@lang('project::project.enter_question')</label>
                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[positive]" @if(old('email_notifications.positive') == 1) checked @endif
                                        class="@error('email_notifications.positive') is-invalid validate__input @enderror" id="positive" value="1">
                                        <label for="positive">@lang('project::project.enter_positive')</label>
                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[neutral]" @if(old('email_notifications.neutral') == 1) checked @endif
                                        class="@error('email_notifications.neutral') is-invalid validate__input @enderror" id="neutral" value="1">
                                        <label for="neutral">@lang('project::project.enter_neutral')</label>
                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[negative]" @if(old('email_notifications.negative') == 1) checked @endif
                                        class="@error('email_notifications.negative') is-invalid validate__input @enderror" id="negative" value="1">
                                        <label for="negative">@lang('project::project.enter_negative')</label>
                                    </div>

                                    <div class="big__main__nav">
                                        <input type="checkbox" name="email_notifications[answer]" @if(old('email_notifications.answer') == 1) checked @endif
                                        class="@error('email_notifications.answer') is-invalid validate__input @enderror" id="answer" value="1">
                                        <label for="answer">@lang('project::project.enter_answer')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="second__right">
                                <ul class="second__numeration">
                                    <li><span>Пункт правил 5.13:</span> Запрещено заказывать негативные отзывы и оценки с целью ухудшения репутации 3-х лиц.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="create__project__btn" style="margin-top: 60px;">
                        <button type="submit"><span><img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon"></span>@lang('project::project.submit_edit')</button>
                    </div>
                </div>
            </div>
            {{-- Ограничения --}}
            <div class="new__of__navigation third__navigation">
                <div>
                    <div class="main__third__nav">
                        <div class="new__navigation__title">
                            @lang('project::project.active_project')
                        </div>

                        <div class="active__inner">
                            <div class="active__project">
                                <p>@lang('project::project.enter_active_day')</p>
                                <div class="label__week">

                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="monday" @if(old('day_active.monday') !== 0) checked @endif
                                        class="@error('day_active.monday') is-invalid validate__input @enderror" name="day_active[monday]">
                                        <label for="monday">
                                            <span>@lang('project::project.enter_monday')</span>
                                        </label>
                                    </div>


                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="tuesday" @if(old('day_active.tuesday') !== 0) checked @endif
                                        class="@error('day_active.tuesday') is-invalid validate__input @enderror" name="day_active[tuesday]">
                                        <label for="tuesday">
                                            <span>@lang('project::project.enter_tuesday')</span>
                                        </label>
                                    </div>

                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="wednesday" @if(old('day_active.wednesday') !== 0) checked @endif
                                        class="@error('day_active.wednesday') is-invalid validate__input @enderror" name="day_active[wednesday]">
                                        <label for="wednesday">
                                            <span>@lang('project::project.enter_wednesday')</span>
                                        </label>
                                    </div>


                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="thursday" @if(old('day_active.thursday') !== 0) checked @endif
                                        class="@error('day_active.thursday') is-invalid validate__input @enderror" name="day_active[thursday]">
                                        <label for="thursday">
                                            <span>@lang('project::project.enter_thursday')</span>
                                        </label>
                                    </div>


                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="friday" @if(old('day_active.friday') !== 0) checked @endif
                                        class="@error('day_active.friday') is-invalid validate__input @enderror" name="day_active[friday]">
                                        <label for="friday">
                                            <span>@lang('project::project.enter_friday')</span>
                                        </label>
                                    </div>

                                    <div class="week__item">
                                        <input type="checkbox" value="1" id="saturday" @if(old('day_active.saturday') !== 0) checked @endif
                                        class="@error('day_active.saturday') is-invalid validate__input @enderror" name="day_active[saturday]">
                                        <label for="saturday">
                                            <span>@lang('project::project.enter_saturday')</span>
                                        </label>
                                    </div>

                                    <div class="week__item">
                                        <input type="checkbox" id="sunday" value="1" @if(old('day_active.sunday') !== 0) checked @endif
                                        class="@error('day_active.sunday') is-invalid validate__input @enderror" name="day_active[sunday]">
                                        <label for="sunday">
                                            <span>@lang('project::project.enter_sunday')</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="active__project">
                                <p>@lang('project::project.enter_hours_of_activity')</p>
                                <div class="time__active">
                                    @lang('project::project.enter_hours_from') <input type="text" name="limit[time_start]" value="{{ old('limit.time_start') ?? '00:00:00' }}"
                                                                                      class="timepicker @error('limit.time_start') is-invalid validate__input @enderror" placeholder="00:00:00">
                                    @lang('project::project.enter_hours_to') <input type="text" name="limit[time_finish]" value="{{ old('limit.time_finish') ?? '23:59:59' }}"
                                                                                    class="timepicker @error('limit.time_start') is-invalid validate__input @enderror" placeholder="23:59:59">
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="limit__inner">
                            <div class="new__navigation__title">
                                @lang('project::project.enter_limit')
                            </div>
                            <div class="inner__kolvo">
                                <div class="kolvo__text">
                                    <span style="justify-content: left;">@lang('project::project.enter_max_count')</span>
                                   {{-- <span>Случайное кол-во</span>--}}
                                </div>

                                <div class="kolvo__input">
                                    @lang('project::project.enter_number_of_works') <input name="limit[max_works]" type="text" value="{{ old('limit.max_works') }}"
                                                                                           class="@error('limit.max_works') is-invalid validate__input @enderror" >
                                    @lang('project::project.enter_number_of_works_in') <input name="limit[max_works_day]" type="text" value="{{ old('limit.max_works_day') }}"
                                                                                              class="@error('limit.max_works_day') is-invalid validate__input @enderror" >
                                    @lang('project::project.enter_number_of_works_day')
                                </div>
                            </div>

                            <div class="inner__kolvo">
                                <div class="kolvo__text kolvo__text2">
                                    <span>@lang('project::project.enter_delay_jobs')</span>
                                </div>
                                <div class="kolvo__input">
                                    @lang('project::project.enter_hours_from') <input name="limit[time_off_min]" type="text" value="{{ old('limit.time_off_min') }}"
                                                                                      class="@error('limit.time_off_min') is-invalid validate__input @enderror">
                                    @lang('project::project.enter_hours_to') <input name="limit[time_off_max]" type="text" value="{{ old('limit.time_off_max') }}"
                                                                                    class="@error('limit.time_off_max') is-invalid validate__input @enderror">
                                </div>
                            </div>
                        </div>


                        <div class="main__select__item">
                            <div class="paragraph__div">
                                @lang('project::project.enter_limit_in_hour')
                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>

                            <input class="main__input__other @error('limit.in_hour') is-invalid validate__input @enderror" type="text" name="limit[in_hour]" value="{{ old('limit.in_hour') }}" placeholder="0">
                        </div>

                        <div class="main__select__item">
                            <div class="paragraph__div">
                                @lang('project::project.enter_limit_in_page')
                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>
                            <input class="main__input__other @error('limit.in_page') is-invalid validate__input @enderror" type="text" name="limit[in_page]" value="{{ old('limit.in_page') }}" placeholder="0">
                        </div>

                        <div class="main__select__item">
                            <div class="paragraph__div">
                                @lang('project::project.enter_limit_in_page_on_day')
                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>

                            <input class="main__input__other @error('limit.in_page_on_day') is-invalid validate__input @enderror" type="text" name="limit[in_page_on_day]" value="{{ old('limit.in_page_on_day') }}" placeholder="0">
                        </div>

                        <div class="limit__inner" style="margin-top: 26px;">
                            <div class="new__navigation__title" style="margin-bottom: 12px;">
                                @lang('project::project.limit_in_author')
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_author_count')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.author_count') is-invalid validate__input @enderror" type="text" name="limit[author_count]" value="{{ old('limit.author_count') }}" placeholder="3">
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_author_count_on_day')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.author_count_on_day') is-invalid validate__input @enderror" type="text" name="limit[author_count_on_day]"
                                       value="{{ old('limit.author_count_on_day') }}" placeholder="3">
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_author_count_in_akk')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.author_count_in_akk') is-invalid validate__input @enderror"
                                       name="limit[author_count_in_akk]" value="{{ old('limit.author_count_in_akk') }}" type="text" placeholder="3">
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_author_count_in_group_project')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.author_count_in_group_project') is-invalid validate__input @enderror" name="limit[author_count_in_group_project]"
                                       value="{{ old('limit.author_count_in_group_project') }}" type="text" placeholder="3">


                                <div class="all__project__checkbox all__check__create">
                                    <input class="@error('limit.author_count_in_group_project') is-invalid validate__input @enderror" type="checkbox" name="limit[limit_in_oll_group]"
                                           @if(old('limit.limit_in_oll_group') == 1) checked @endif value="1" id="all__project1">
                                    <label for="all__project1">
                                        @lang('project::project.enter_limit_in_oll_group')
                                    </label>
                                </div>
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_author_count_in_group_project_on_day')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.author_count_in_group_project_on_day') is-invalid validate__input @enderror" name="limit[author_count_in_group_project_on_day]"
                                       value="{{ old('limit.author_count_in_group_project_on_day') }}" type="text" placeholder="3">

                                <div class="all__project__checkbox all__check__create">
                                    <input class="@error('limit.in_author_on_project_on_group') is-invalid validate__input @enderror" type="checkbox" name="limit[in_author_on_project_on_group]"
                                           @if(old('limit.in_author_on_project_on_group') == 1) checked @endif value="1" id="all__project2">
                                    <label for="all__project2">
                                        @lang('project::project.enter_limit_in_author_on_project')
                                    </label>
                                </div>
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_count_in_ip')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.count_in_ip') is-invalid validate__input @enderror" name="limit[count_in_ip]" value="{{ old('limit.count_in_ip') }}" type="text" placeholder="7">
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_max_author_work')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.max_author_work') is-invalid validate__input @enderror" name="limit[max_author_work]" value="{{ old('limit.max_author_work') }}" type="text" placeholder="3">
                            </div>

                            <div class="main__select__item">
                                <div class="paragraph__div">
                                    @lang('project::project.enter_limit_time_off_in_work')
                                    <span class="hint">?</span>
                                    <div class="text__hint">
                                        Подсказка
                                    </div>
                                </div>

                                <input class="main__input__other @error('limit.time_off_in_work') is-invalid validate__input @enderror" name="limit[time_off_in_work]"
                                       value="{{ old('limit.time_off_in_work') }}" type="text" placeholder="3">
                            </div>
                        </div>

                        <div class="limit__inner">
                            <div class="new__navigation__title" style="margin-top: 27px; margin-bottom: 10px;">
                                @lang('project::project.devices')
                            </div>

                            <div class="all__project__checkbox all__check__create other__all__project__checkbox">
                                <input type="checkbox" @if(old('limit.mobile') == 1) checked @endif name="limit[mobile]" value="1" id="all__project3"
                                       class="@error('limit.mobile') is-invalid validate__input @enderror">
                                <label for="all__project3">
                                    @lang('project::project.enter_limit_mobile')
                                </label>
                                <span class="hint">?</span>
                                <div class="text__hint">
                                    Подсказка
                                </div>
                            </div>
                        </div>

                        <div class="stop__words__block">
                            <div class="main__select__item">
                                <p>@lang('project::project.enter_limit_stop_words')</p>
                                <textarea class="@error('limit.stop_words') is-invalid validate__input @enderror" name="limit[stop_words]" id="stop_words"
                                          placeholder="@lang('project::project.enter_limit_forbidden_words')">{{ old('limit.stop_words') }}</textarea>

                                <div class="for__example">
                                    @lang('project::project.enter_limit_forbidden_words_list')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create__project__btn" style="margin-top: 45px;">
                        <button type="submit"><span><img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon"></span>@lang('project::project.submit_edit')</button>
                    </div>
                </div>
            </div>
            {{-- Страницы --}}
            <div class="new__of__navigation fourth__navigation">
                <div>
                    <div class="inner__new__navigation">

                        <div class="left__main__nav">
                            <div class="main__select__item">
                                <p>@lang('project::project.enter_link_page')
                                    @error('page_link')
                                    <span class="red__validate">{{ $message }}</span>
                                    @enderror
                                </p>
                                <textarea name="page_link" class=" @error('page_link') is-invalid validate__input @enderror" id="page_link" placeholder="@lang('project::project.enter_link_page_place')">{{ old('page_link') }}</textarea>
                            </div>
                        </div>
                        <div class="right__main__nav" style="
            width: 567px;
            margin-top: 50px!important;
        ">
                            <div class="first__right" >
                                <span class="main__indivation">Важная информация</span>
                                <ul class="second__numeration">

                                    <li>Список страниц, с которыми можно работать. Каждую ссылку с новой строки. Другие страницы, система не пропустит в работу.</li>

                                    <li>Указывайте исключительно ссылки на страницы. Если хотите указать,какие категории на сайте необходимо комментировать, то пишите это в задании автору. В поле "Ссылка на сайт или страницу" укажите ссылку на главную страницу сайта.</li>

                                    <li>Если список ссылок не указан, то авторы будут самостоятельно выбирать на сайте.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="create__project__btn">
                        <button type="submit"><span><img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon"></span>@lang('project::project.submit_edit')</button>
                    </div>
                </div>
            </div>
            {{-- Геотаргетинг --}}
            <div class="new__of__navigation fifth__navigation">
                <div>
                    <div class="inner__new__navigation" style="margin-top: 29px;">

                        <div class="left__main__nav">
                            <div class="main__select__item">
                                <p style="margin-bottom: 15px;">Название *</p>
                                <select class="custom-select sources" placeholder="Project 1" id="">
                                    <option value="Команда1">Команда1</option>
                                    <option value="Команда3">Команда3</option>
                                    <option value="Команда2">Команда2</option>
                                </select>
                            </div>

                            <div class="country__list">
                                <p>Список стран и городов</p>

                                <ul class="list__ul">
                                    <li>
                                        <div class="list__russian">
                                            <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                            Российская федерация / Москва
                                        </div>

                                        <span><img src="img/_src/close__list.png" alt="close__list"></span>
                                    </li>

                                    <li>
                                        <div class="list__russian">
                                            <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                            Российская федерация / Москва
                                        </div>

                                        <span><img src="img/_src/close__list.png" alt="close__list"></span>
                                    </li>

                                    <li>
                                        <div class="list__russian">
                                            <span><img src="img/_src/flag__russian.png" alt="flag__author.png"></span>
                                            Российская федерация / Москва
                                        </div>

                                        <span><img src="img/_src/close__list.png" alt="close__list"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="right__main__nav">
                            <div class="main__select__item">
                                <p>Название *</p>
                                <select class="custom-select sources" placeholder="Project 1" id="">
                                    <option value="Команда1">Команда1</option>
                                    <option value="Команда3">Команда3</option>
                                    <option value="Команда2">Команда2</option>
                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="create__project__btn" style="margin-top: 52px;">
                        <button type="submit"><span><img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon"></span>@lang('project::project.submit_edit')</button>
                    </div>
                </div>
            </div>
            {{-- Требования к аккаунтам --}}
            <div class="new__of__navigation sixth__navigation">
                <div>
                    <div class="sixth__navigation__new">
                        <div class="item__sixth">
                            <div class="top__sixth">
                                <div class="title__sixth">
                                    @lang('project::project.enter_ar_vk')
                                </div>
                                <div class="item__sixth__checkbox">

                                    <input type="checkbox" id="checkbox__vk" @if(old('social.vk_check') == 1) checked @endif name="social[vk_check]" value="1" >
                                    <label for="checkbox__vk">
                                    </label>
                                </div>
                            </div>
                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_friends')</p>
                                <input class="main__input__other @error('social.vk_friends') is-invalid validate__input @enderror" type="text" name="social[vk_friends]" value="{{ old('social.vk_friends') }}"  placeholder="50">
                                @error('social.vk_friends')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_female')</p>
                                <select class="custom-select sources @error('social.vk_female') is-invalid validate__input @enderror"
                                        name="social[vk_female]"
                                        placeholder="@if(old('social.vk_female')) @lang('project::project.enter_ar_'.old('social.vk_female')) @else @lang('project::project.enter_ar_female_not') @endif" id="">
                                    <option @if(old('social.vk_female') != 'female_man' && old('social.vk_female') != 'female_women') selected @endif value="female_not">@lang('project::project.enter_ar_female_not')</option>
                                    <option @if(old('social.vk_female') != 'female_man') selected @endif value="female_man">@lang('project::project.enter_ar_female_man')</option>
                                    <option @if(old('social.vk_female') != 'female_women') selected @endif value="female_women">@lang('project::project.enter_ar_female_women')</option>
                                </select>
                                @error('social.vk_female')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_age')</p>
                                <input class="vk_age_min" type="hidden" name="social[vk_age_min]" value="{{ old('social.vk_age_min') }}">
                                <input class="vk_age_max" type="hidden" name="social[vk_age_max]" value="{{ old('social.vk_age_max') }}">
                                <div id="slider-range" class="slider__all__range"></div>

                                <ul class="slider__summa">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="numeration__slider">
                                    <li>10</li>
                                    <li>33</li>
                                    <li>55</li>
                                    <li>78</li>
                                    <li>100</li>
                                </ul>
                            </div>
                        </div>

                        <div class="item__sixth">
                            <div class="top__sixth">
                                <div class="title__sixth">
                                    @lang('project::project.enter_ar_ok')
                                </div>
                                <div class="item__sixth__checkbox">
                                    <input type="checkbox" id="checkbox__odn" @if(old('social.ok_check') == 1) checked @endif name="social[ok_check]" value="1" >
                                    <label for="checkbox__odn">
                                    </label>
                                </div>

                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_friends')</p>
                                <input class="main__input__other @error('social.ok_friends') is-invalid validate__input @enderror" type="text" name="social[ok_friends]" value="{{ old('social.ok_friends') }}"  placeholder="50">
                                @error('social.ok_friends')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_female')</p>
                                <select class="custom-select sources @error('social.ok_female') is-invalid validate__input @enderror"
                                        name="social[ok_female]"
                                        placeholder="@if(old('social.ok_female')) @lang('project::project.enter_ar_'.old('social.ok_female')) @else @lang('project::project.enter_ar_female_not') @endif" id="">
                                    <option @if(old('social.ok_female') != 'female_man' && old('social.ok_female') != 'female_women') selected @endif value="female_not">@lang('project::project.enter_ar_female_not')</option>
                                    <option @if(old('social.ok_female') != 'female_man') selected @endif value="female_man">@lang('project::project.enter_ar_female_man')</option>
                                    <option @if(old('social.ok_female') != 'female_women') selected @endif value="female_women">@lang('project::project.enter_ar_female_women')</option>
                                </select>
                                @error('social.ok_female')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_age')</p>
                                <input class="ok_age_min" type="hidden" name="social[ok_age_min]" value="{{ old('social.ok_age_min') }}">
                                <input class="ok_age_max" type="hidden" name="social[ok_age_max]" value="{{ old('social.ok_age_max') }}">
                                <div id="slider-range1" class="slider__all__range"></div>

                                <ul class="slider__summa">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="numeration__slider">
                                    <li>10</li>
                                    <li>33</li>
                                    <li>55</li>
                                    <li>78</li>
                                    <li>100</li>
                                </ul>
                            </div>
                        </div>


                        <div class="item__sixth">
                            <div class="top__sixth">

                                <div class="title__sixth">
                                    @lang('project::project.enter_ar_fb')
                                </div>
                                <div class="item__sixth__checkbox">
                                    <input type="checkbox" id="checkbox__fb" @if(old('social.fb_check') == 1) checked @endif name="social[fb_check]" value="1" >
                                    <label for="checkbox__fb">
                                    </label>
                                </div>
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_female')</p>
                                <select class="custom-select sources @error('social.fb_female') is-invalid validate__input @enderror"
                                        name="social[fb_female]"
                                        placeholder="@if(old('social.fb_female')) @lang('project::project.enter_ar_'.old('social.fb_female')) @else @lang('project::project.enter_ar_female_not') @endif" id="">
                                    <option @if(old('social.fb_female') != 'female_man' && old('social.fb_female') != 'female_women') selected @endif value="female_not">@lang('project::project.enter_ar_female_not')</option>
                                    <option @if(old('social.fb_female') != 'female_man') selected @endif value="female_man">@lang('project::project.enter_ar_female_man')</option>
                                    <option @if(old('social.fb_female') != 'female_women') selected @endif value="female_women">@lang('project::project.enter_ar_female_women')</option>
                                </select>
                                @error('social.fb_female')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_age')</p>
                                <input class="fb_age_min" type="hidden" name="social[fb_age_min]" value="{{ old('social.fb_age_min') }}">
                                <input class="fb_age_max" type="hidden" name="social[fb_age_max]" value="{{ old('social.fb_age_max') }}">
                                <div id="slider-range2" class="slider__all__range"></div>

                                <ul class="slider__summa">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul class="numeration__slider">
                                    <li>10</li>
                                    <li>33</li>
                                    <li>55</li>
                                    <li>78</li>
                                    <li>100</li>
                                </ul>
                            </div>
                        </div>

                        <div class="item__sixth">
                            <div class="top__sixth">
                                <div class="title__sixth">
                                    @lang('project::project.enter_ar_inst')
                                </div>
                                <div class="item__sixth__checkbox">
                                    <input type="checkbox" id="checkbox__inst" @if(old('social.inst_check') == 1) checked @endif name="social[inst_check]" value="1" >
                                    <label for="checkbox__fb">
                                    </label>
                                </div>
                            </div>

                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_count_subscribers')</p>
                                <input class="main__input__other" type="text" name="social[count_subscribers]" value="{{ old('social.count_subscribers') }}" placeholder="50">
                                @error('social.count_subscribers')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="item__sixth">
                            <div class="top__sixth">
                                <div class="title__sixth">
                                    @lang('project::project.enter_ar_tw')
                                </div>
                                <div class="item__sixth__checkbox">
                                    <input type="checkbox" id="checkbox__twitter" @if(old('social.tw_check') == 1) checked @endif name="social[tw_check]" value="1" >
                                    <label for="checkbox__twitter">
                                    </label>
                                </div>
                            </div>
                            <div class="main__select__item">
                                <p>@lang('project::project.enter_ar_count_followers')</p>
                                <input class="main__input__other" type="text" name="social[count_followers]" value="{{ old('social.count_followers') }}" placeholder="50">
                                @error('social.count_followers')
                                <span class="red__validate">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="all__check__create">
                        <input type="checkbox" id="disable_check" name="social[disable_check]" value="{{ old('social.disable_check') }}">
                        <label for="disable_check" class="disable_check">
                            @lang('project::project.enter_ar_disable')
                        </label>
                    </div>

                    <div class="create__project__btn">
                        <button type="submit"><span><img src="{{ asset('img/_src/create__project__icon.svg') }}" alt="create__project__icon"></span>@lang('project::project.submit_edit')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('frontend/datetimepicker-master/jquery.datetimepicker.full.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
        // 숫자 3자리마다 콤마 찍기
        function numberWithCommas(x) {
            if (x !== null) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        }

        $(function() {
            //slider range init set
            $( "#slider-range" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $('.vk_age_min').val(numberWithCommas(ui.values[ 0 ]) );
                    $('.vk_age_max').val(numberWithCommas(ui.values[ 1 ]) );
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            $('.vk_age_min').val(numberWithCommas($( "#slider-range" ).slider( "values", 0 )));
            $('.vk_age_max').val(numberWithCommas($( "#slider-range" ).slider( "values", 1 )));
            //slider range data tooltip set
            var $handler = $("#slider-range .ui-slider-handle");

            $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });


        $(function() {
            //slider range init set
            $( "#slider-range1" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $('.ok_age_min').val(numberWithCommas(ui.values[ 0 ]) );
                    $('.ok_age_max').val(numberWithCommas(ui.values[ 1 ]) );
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            //slider range data tooltip set
            var $handler = $("#slider-range1 .ui-slider-handle");

            $('.ok_age_min').val(numberWithCommas($( "#slider-range1" ).slider( "values", 0 )));
            $('.ok_age_max').val(numberWithCommas($( "#slider-range1" ).slider( "values", 1 )));
            $handler.eq(0).append("<b class='amount'><span class='min'>"+ numberWithCommas($( "#slider-range1" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+ numberWithCommas($( "#slider-range1" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });


        $(function() {
            //slider range init set
            $( "#slider-range2" ).slider({
                range: true,
                min: 1,
                max: 100,
                values: [ 1, 100 ],
                slide: function( event, ui ) {
                    $('.fb_age_min').val(numberWithCommas(ui.values[ 0 ]) );
                    $('.fb_age_max').val(numberWithCommas(ui.values[ 1 ]) );
                    $( ".min" ).html(numberWithCommas(ui.values[ 0 ]) );
                    $( ".max" ).html(numberWithCommas(ui.values[ 1 ]) );
                }
            });

            //slider range data tooltip set
            var $handler = $("#slider-range2 .ui-slider-handle");
            $('.fb_age_min').val(numberWithCommas($( "#slider-range1" ).slider( "values", 0 )));
            $('.fb_age_max').val(numberWithCommas($( "#slider-range1" ).slider( "values", 1 )));

            $handler.eq(0).append("<b class='amount'><span class='min'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 0 )) +"</span></b>");
            $handler.eq(1).append("<b class='amount'><span class='max'>"+numberWithCommas($( "#slider-range2" ).slider( "values", 1 )) +"</span></b>");

            //slider range pointer mousedown event
            $handler.on("mousedown",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeIn(300);
            });

            //slider range pointer mouseup event
            $handler.on("mouseup",function(e){
                e.preventDefault();
                $(this).children(".amount").fadeOut(300);
            });
        });
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        /* Локализация datepicker */
       /* $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: 'Предыдущий',
            nextText: 'Следующий',
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            weekHeader: 'Не',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['ru']);*/
        /* Локализация timepicker */
       /* $.timepicker.regional['ru'] = {
            timeOnlyTitle: 'Выберите время',
            timeText: 'Время',
            hourText: 'Часы',
            minuteText: 'Минуты',
            secondText: 'Секунды',
            millisecText: 'Миллисекунды',
            timezoneText: 'Часовой пояс',
            currentText: 'Сейчас',
            closeText: 'Закрыть',
            timeFormat: 'HH:mm',
            amNames: ['AM', 'A'],
            pmNames: ['PM', 'P'],
            isRTL: false
        };
        $.timepicker.setDefaults($.timepicker.regional['ru']);*/
        $(function(){

            $(document).on('change','select[name="rate_id"]', function(){
                let price = $(this).find(':selected').data('price');
                $('#price_block input').val(price);
                $('#price_block').show();
            });
            $(".datepicker").datetimepicker({
                format:'Y-m-d h:m:s',
            });
            $(document).ready(function(){

                let price = $('select[name="rate_id"]').find(':selected').data('price');
                $('#price_block input').val(price);
                $('input.timepicker').timepicker({
                    timeFormat: 'HH:mm',
                    startTime: $(this).val() ,
                    interval: 15 // 15 minutes
                });
            });
        });
        @if(old('type_project'))
            $(".item__type__project a.{{old('type_project')}}").trigger('click');
        @endif
        //$(".item__type__project a")
    </script>
@endsection
