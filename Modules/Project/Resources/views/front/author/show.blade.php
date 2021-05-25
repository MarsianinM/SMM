@extends('mainpage::layouts.front.app')

@section('content')
            <div class="life__work">
                <div class="project__title">
                    {{ $project->title }}
                </div>

                <div class="right__life">
                    <div class="id__life">
                        ID {{ $project->id }}   /   {{ $project->updated_at->format('d M Y') }}
                    </div>

                    <ul class="some__life__icon">
                        <li><img src="{{ asset('img/_src/life__icon1.png') }}" alt="life__icon"></li>
                        <li><img src="{{ asset('img/_src/life__icon2.png') }}" alt="life__icon"></li>
                        <li><img src="{{ asset('img/_src/life__icon3.png') }}" alt="life__icon"></li>
                        <li><img src="{{ asset('img/_src/life__icon4.png') }}" alt="life__icon"></li>
                    </ul>
                </div>
            </div>

            <div class="work__block">
                <ul class="work__ul">
                    <li>Клиент: <span>{{ $project->client->name }}</span></li>
                    <li>Адрес сайта: <span><a href="{{ $project->link }}" target="_blank">Перейти на сайт заказчика ›</a></span></li>
                    <li>Тематика: <span>{{ $project->subject->subject_title_current_lang }}</span></li>
                </ul>

                <div class="right__work">
                    <ul class="ul__right__work">
                        <li><img src="{{ asset('img/_src/right__work1.png') }}" alt="right__work"></li>
                        <li><img src="{{ asset('img/_src/right__work2.png') }}" alt="right__work"></li>
                        <li><img src="{{ asset('img/_src/right__work3.png') }}" alt="right__work"></li>
                    </ul>

                    <div class="repost__right__work">
                        <div class="repost__text">{{ $project->rate->content_current_lang_rate->title }}: <span>$250</span></div>
                    </div>
                </div>
            </div>

            <div class="restrictions__section">
                <div class="rest__left">
                    <div class="restriction__subtitle">{{ $project->description }}</div>

                    <p class="warning">Внимание!</p>

                    <p class="restiction__parag">Заказчикам не нужны лайки, репосты и подписчики с фейковых аккаунтов. У Вас должно быть реальное имя, фотографии, друзья.</p>

                    <p class="restiction__parag">Необходимо, чтобы аккаунт выглядел живым. Заказчики не будут оплачивать работы с аккаунтов Барак Обама и без фотографии. Жалобы по отклоненным работам с подобных аккаунтов не рассматриваются!</p>

                    <p class="restiction__parag">У Вас есть 25 минут для выполнения проекта. На это время для Вас будет зарезервирована оплата.</p>

                    <p class="restiction__parag">Вы не можете приступать к работе одновременно над несколькими проектами.</p>

                    @if($project->projectSocialLimits)
                    <div class="minimum__title">
                        Минимальные требования к аккаунтам:
                    </div>
                    <div class="flex__minimum">

                        @if($project->projectSocialLimits->vk_check)
                        <div class="minimum__item">
                            <div class="subtitle__soc">
                                <img src="{{ asset('img/_src/vk_icon.png') }}" alt="vk_icon"><span>Вконтакте</span>
                            </div>

                            <nav class="minimum__block">
                                <ul>
                                    <li><span class="text__min__left">Количество друзей:</span><span class="text__min__right">{{ $project->projectSocialLimits->vk_friends }}</span></li>
                                    <li><span class="text__min__left">Пол:</span><span class="text__min__right">{{ $project->projectSocialLimits->vk_female }}</span></li>
                                    <li><span class="text__min__left">Возраст:</span><span class="text__min__right">от {{ $project->projectSocialLimits->vk_age_min }} до {{ $project->projectSocialLimits->vk_age_max }} лет</span></li>
                                </ul>
                            </nav>
                        </div>
                        @endif

                        @if($project->projectSocialLimits->ok_check)
                            <div class="minimum__item">
                                <div class="subtitle__soc">
                                    <img src="{{ asset('img/_src/odn__icon.png') }}" alt="vk_icon"><span>Одноклассники</span>
                                </div>

                                <nav class="minimum__block">
                                    <ul>
                                        <li><span class="text__min__left">Количество друзей:</span><span class="text__min__right">{{ $project->projectSocialLimits->ok_friends }}</span></li>
                                        <li><span class="text__min__left">Пол:</span><span class="text__min__right">{{ $project->projectSocialLimits->ok_female }}</span></li>
                                        <li><span class="text__min__left">Возраст:</span><span class="text__min__right">от {{ $project->projectSocialLimits->ok_age_min }} до {{ $project->projectSocialLimits->ok_age_max }} лет</span></li>
                                    </ul>
                                </nav>
                            </div>
                        @endif

                        @if($project->projectSocialLimits->fb_check)
                            <div class="minimum__item">
                                <div class="subtitle__soc">
                                    <img src="{{ asset('img/_src/odn__icon.png') }}" alt="vk_icon"><span>Одноклассники</span>
                                </div>

                                <nav class="minimum__block">
                                    <ul>
                                        <li><span class="text__min__left">Количество друзей:</span><span class="text__min__right">{{ $project->projectSocialLimits->ok_friends }}</span></li>
                                        <li><span class="text__min__left">Пол:</span><span class="text__min__right">{{ $project->projectSocialLimits->ok_female }}</span></li>
                                        <li><span class="text__min__left">Возраст:</span><span class="text__min__right">от {{ $project->projectSocialLimits->ok_age_min }} до {{ $project->projectSocialLimits->ok_age_max }} лет</span></li>
                                    </ul>
                                </nav>
                            </div>
                        @endif

                        @if($project->projectSocialLimits->inst_check)
                            <div class="minimum__item">
                                <div class="subtitle__soc">
                                    <img src="{{ asset('img/_src/odn__icon.png') }}" alt="vk_icon"><span>Одноклассники</span>
                                </div>

                                <nav class="minimum__block">
                                    <ul>
                                        <li><span class="text__min__left">Количество друзей:</span><span class="text__min__right">{{ $project->projectSocialLimits->count_subscribers }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        @endif
                        @if($project->projectSocialLimits->tw_check)
                            <div class="minimum__item">
                                <div class="subtitle__soc">
                                    <img src="{{ asset('img/_src/odn__icon.png') }}" alt="vk_icon"><span>Одноклассники</span>
                                </div>

                                <nav class="minimum__block">
                                    <ul>
                                        <li><span class="text__min__left">Количество друзей:</span><span class="text__min__right">{{ $project->projectSocialLimits->count_followers }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="rest__right">
                    <div class="project__title">
                        Ограничения

                    </div>
                    <nav class="rest__block">
                        <ul>
                            <li>
                                <span class="left__li-rest">В сутки:</span>
                                <span class="right__li-rest">{!! $project->projectLimits->in_page_on_day ?? 'не установлены' !!} </span>
                            </li>

                            <li>
                                <span class="left__li-rest">В час:</span>
                                <span class="right__li-rest">{!! $project->projectLimits->in_hour ?? 'не установлены' !!}</span>
                            </li>


                            <li>
                                <span class="left__li-rest">От автора:</span>
                                <span class="right__li-rest">{!! $project->projectLimits->author_count ?? 'не установлены' !!}</span>
                            </li>

                            <li>
                                <span class="left__li-rest">В сутки от автора</span>
                                <span class="right__li-rest">{!! $project->projectLimits->author_count_on_day ?? 'не установлены' !!}</span>
                            </li>

                            <li>
                                <span class="left__li-rest">От автора по группе проектов:</span>
                                <span class="right__li-rest">{!! $project->projectLimits->author_count_in_group_project ?? 'не установлены' !!}</span>
                            </li>

                            <li>
                                <span class="left__li-rest">От автора в сутки по группе проектов:</span>
                                <span class="right__li-rest">{!! $project->projectLimits->author_count_in_group_project_on_day ?? 'не установлены' !!}</span>
                            </li>
                        </ul>
                    </nav>
                    @if(!$project->IsWorkAuthor)
                        <div class="start__to__play">
                            <button form="create_in_work"><span><img src="{{ asset('img/_src/play__btn.png') }}" alt="play__btn"></span>Приступить к выполнению проекта</button>
                        </div>
                        <form id="create_in_work" method="POST" action="{{route('author.projects.projectInWork')}}" class="hide">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <input type="hidden" name="client_id"  value="{{ $project->client->id }}">
                            <input type="hidden" name="author_id"  value="{{ auth()->id() }}">
                        </form>
                    @else
                        <div id="wrapper_class" class="start__to__play">
                            <div class="just__clock">
                                <span id="clock"></span>  из 25 мин
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="minimum__inner">
                @if($project->page_link)

                <div class="minimum__bottom__block">
                    <div class="bottom__minimum__title">
                        СПИСОК СТРАНИЦ, НАД КОТОРЫМИ МОЖНО РАБОТАТЬ
                    </div>
                    {{--<p><a href="https://******/wall15648712_1627">https://******/wall15648712_1627</a></p>--}}
                    <p>{{$project->page_link}}</p>
                    <p>Другие страницы сайта не будут приняты.</p>
                </div>
                @endif
                @if($project->IsWorkAuthor)
                    <div class="next__page__project" style="margin-bottom: 30px">
                        <div class="next__title">
                            Публикуйте отзывы от разных людей.
                        </div>

                        <div class="next__subtitle">
                            Ссылка на запись, которой сделали репост
                        </div>

                        <form action="/" class="next__form">
                            <div class="analog__input">
                                <span>https://prnt.sc/10itg3u</span>
                                <a href="#">Выбрать аккаунт</a>
                            </div>

                            <div class="text__analog__input">Работа разрешена только над страницами из списка выше.</div>

                            <div class="under__analog">
                                <a href="#">Необходимо указать дополнительную информацию заказчику?</a>
                                <span>Черновик сохранен в 16:12</span>
                            </div>


                            <div class="btns__next">
                                <button><img src="{{ asset('img/_src/okey__btn__next.png') }}" alt="okey__btn__next">ОТПРАВИТЬ ›</button>
                                <a href="#">Отказаться от проекта</a>
                            </div>
                        </form>
                    </div>
                @endif
                <div class="minimum__bottom__block">
                    <div class="bottom__minimum__title">
                        Общие правила
                    </div>

                    <ul class="minimum__ul">
                        <li>• Перед выполнением проекта ознакомьтесь с условиями, установленными заказчиком.</li>
                        <li>• Обязательно следуйте правилам, иначе заказчик вправе отказать в оплате.</li>
                        <li>• Запрещено делать больше 1 репоста в 1 аккаунт социальной сети, если в проекте не установлены свои ограничения.</li>
                        <li>• Внимание! Если Вы не сделаете лайк/репост/ретвит и будете отправлять работу на проверку - Вам будет заблокирован доступ к разделу автора.</li>
                        <li>• Если лайк/репост/ретвит будет удален ранее, чем через 3 недели после публикации - Вам будет заблокирован доступ к разделу автора.</li>
                        <li>• Работа будет автоматически принята по истечении 3-х суток, если заказчик не проверит ранее.</li>
                        <li>• Если заказчик отклонил Вашу работу, а Вы следовали правилам, оставьте жалобу, кнопка справа вверху.</li>
                    </ul>
                </div>
            </div>
@endsection

@section('script')
    <script>
        @if($project->IsWorkAuthor)

            var upgradeTime = {{ (int)$project->timer_work }};
            var seconds = upgradeTime;
            function timer() {
                var days        = Math.floor(seconds/24/60/60);
                var hoursLeft   = Math.floor((seconds) - (days*86400));
                var hours       = Math.floor(hoursLeft/3600);
                var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                var minutes     = Math.floor(minutesLeft/60);
                var remainingSeconds = seconds % 60;
                function pad(n) {
                    return (n < 10 ? "0" + n : n);
                }
                document.getElementById('clock').innerHTML = /*pad(days) + ":" + pad(hours) + ":" + */pad(minutes) + ":" + pad(remainingSeconds);
                if (seconds == 0) {
                    clearInterval(countdownTimer);
                    document.getElementById('clock').innerHTML = "00:00";

                    alert('ремя на выполнение проекта закончилось!!!');
                } else {
                    seconds--;
                }
            }
            var countdownTimer = setInterval('timer()', 1000);
        @endif
    </script>
@endsection
