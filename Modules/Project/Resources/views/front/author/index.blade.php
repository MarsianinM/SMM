@extends('mainpage::layouts.front.app')

@section('content')

    <div class="project__top project__top2">
        <div class="project__title">
            @lang('project::all_users.projects')
        </div>
        <div class="all__projecet__item ranks">
            <p>Ранг:</p>
            <span>10</span>
        </div>
        <div class="all__projecet__item statistics">
            <p>Статистика: </p>
            <ul>
                <li>30</li>
                <li>30</li>
                <li>30</li>
                <li>30</li>
            </ul>
        </div>
        <div class="all__projecet__item region">
            <p>Регион: <span>Москва</span></p>
        </div>
        <div class="project-buttons">
            <div class="poject-button">
                <a href="#" class="poject-btn-first">Персональные</a>
            </div>
            <div class="poject-button">
                <a href="#" class="poject-btn-second">Избранные</a>
            </div>
        </div>
    </div>

    <div class="warning__bottom__project">
        <h4>Внимание!</h4>

        <p>В данный момент Вам доступен заработок на лайках, репостах и подписках. <br>
            Для доступа к написанию комментариев Вам необходимо сдать экзамен ›</p>

    </div>

    @if(!empty($projects) && count($projects))

        <div class="comment__all__block">
            <ul class="comment__for__item">
                <li>
                    @lang('project::all_users.project_description')
                </li>
                <li>
                    @lang('project::all_users.project_rate')
                </li>
                <li>
                    Лимит
                </li>
                <li>
                    @lang('project::all_users.project_action')
                </li>
            </ul>

            @foreach($projects as $project)
                <div class="comment__item">
                    <div class="comment__describe">
                        <div class="describe__id">
                            <p>ID - {{ $project->id }}</p>
                            @if($project->pro)
                            <span class="vip__orange">
								vip
							</span>
                            @endif
                        </div>

                        <div class="bottom__comment__describe">
                            <p><a href="{{ route('author.projects.show',$project->id) }}">{{ $project->title }}</a></p>
                            <p>{{ $project->small_description }}</p>
                        </div>
                        <div class="name-social name-social-1">
                            <a href="#" class="back-0">
                                <img src="{{ asset('img/_src/flag__tariph.png') }}" alt="">
                            </a>
                            <a href="index.html#" class="back-1">
                                <img src="{{ asset('img/_src/gmail.svg') }}" alt="Гмаил" class="color-normal-1">
                            </a>
                            <a href="index.html#" class="back-2">
                                <img src="{{ asset('img/_src/instagram.svg') }}" alt="Инстаграм" class="color-normal-2">
                            </a>
                            <a href="index.html#" class="back-3">
                                <img src="{{ asset('img/_src/twitter.svg') }}" alt="Твиттер" class="color-normal-3">
                            </a>
                            <a href="index.html#" class="back-4">
                                <img src="{{ asset('img/_src/vk.svg') }}" alt="Вк" class="color-normal-4">
                            </a>
                            <a href="index.html#" class="back-5">
                                <img src="{{ asset('img/_src/youtube.svg') }}" alt="Ютуб" class="color-normal-5">
                            </a>
                            <a href="index.html#" class="back-6">
                                <img src="{{ asset('img/_src/telegram.svg') }}" alt="Телеграм" class="color-normal-6">
                            </a>
                            <a href="index.html#" class="back-7">
                                <img src="{{ asset('img/_src/facebook.svg') }}" alt="Фэйсбук" class="color-normal-7">
                            </a>
                        </div>
                    </div>

                    <div class="comment__tariph">
                        <p>
                            {{ $project->rate_title }}
                        </p>
                        <p>@lang('project::author.project_'.$project->currency->code, ['PRICE' => $project->price])</p>
                    </div>

                    <div class="comment__left">
                        <p>
                            @lang('project::author.project_count')
                        </p>
                        <p>{{ $project->projectCount->count }}</p>
                    </div>

                    <div class="comment__actions">
                        <ul>
                            <li><img src="{{ asset('img/_src/actions__comment1.png') }}" alt="comment__icon"></li>
                            <li><img src="{{ asset('img/_src/actions__comment2.png') }}" alt="comment__icon"></li>
                            <li><img src="{{ asset('img/_src/actions__comment3.png') }}" alt="comment__icon"></li>
                        </ul>
                    </div>
                    <div class="comment__button">
                        <a href="{{ route('author.projects.show',['project_id'=> $project->id]) }}">Выбрать проект</a>
                    </div>
                </div>

            @endforeach
            <div class="pagination-wrapper mb-5">
                {{ $projects->appends(Request::except('page'))->links('mainpage::vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#sort').on('change',function(){
               let option = $(this).val();
               let uri = '{{ route('client.projects.index') }}';
               if(option !== '0'){
                   uri += '?sort='+option;
               }
               console.log(uri);
                window.location.href = uri;
            });
        });
    </script>
@endsection
