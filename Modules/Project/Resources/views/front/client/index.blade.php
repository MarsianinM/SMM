@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__top">
        <div class="project__title">
            @lang('project::all_users.projects')
        </div>
        @role('client')
        <ul class="project__top__menu">
            <li><a href="#">@lang('project::all_users.project_groups')</a></li>
            <li><a href="#">@lang('project::all_users.authors_blacklist')</a></li>
            <li><a href="#">@lang('project::all_users.author_teams')</a></li>
            <li><a href="#" class="btn__top-menu green__btntop">@lang('project::all_users.your_manager')</a></li>
            <li><a href="{{ route('client.projects.create') }}" class="btn__top-menu red__btntop">@lang('project::all_users.add_projects')</a></li>
        </ul>
        @endrole
    </div>

    @if(!empty($projects) && count($projects))
        <div class="project__top2">
            @if(!empty($projects->group))
                <div class="control__input">

                    <select class="custom-select sources" placeholder="Все группы" id="">
                        <option value="Группа1">Группа1</option>
                        <option value="Группа2">Группа2</option>
                        <option value="Группа3">Группа3</option>
                        <option value="Группа4">Группа4</option>
                    </select>
                </div>
            @endif
            <div class="control__input">
                <select class="custom-select sources" placeholder="@lang('project::all_users.sort_'.$request_sort)" id="sort">
                    <option @if($request_sort == 'default') selected @endif value="0">@lang('project::all_users.sort_default')</option>
                    <option @if($request_sort == 'title') selected @endif value="title">@lang('project::all_users.sort_title')</option>
                    <option @if($request_sort == 'created_at') selected @endif value="created_at">@lang('project::all_users.sort_created_at')</option>
                </select>
            </div>
            <div class="control__input">
                <div class="name__project">
                    <input type="text" placeholder="ID, название проекта или тариф">
                    <span>
                        <button type="submit">
                            <img src="{{ asset('img/_src/magnifying-glass.svg') }}" width="16" alt="search__project">
                        </button>
                    </span>
                </div>
            </div>

            <div class="control__input">
                <input style="width: 12px;" type="checkbox" class="allcheckbox" id="all__project__check">
                <label for="all__project__check" class="all__label__input"><span class="for__label">@lang('project::all_users.checked_all_projects')</span>
                </label>
            </div>

        </div>

        <div class="project__top3">
            <div class="flex__top3">
                <div class="text__flex">@lang('project::all_users.total_completed')</div>
                <div class="text__cifra green__data">{{ $projectStatistic->finish_project }}</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">@lang('project::all_users.paid')</div>
                <div class="text__cifra green__data">{{ $projectStatistic->project_count_bay_sum }}</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">@lang('project::all_users.on_check')</div>
                <div class="text__cifra red__data">{{ $projectStatistic->project_in_check }}</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex">@lang('project::all_users.on_completion')</div>
                <div class="text__cifra black__data">{{ $projectStatistic->project_for_revision }}</div>
            </div>

            <div class="flex__top3">
                <div class="text__flex"><span><img src="{{ asset('img/_src/standing-up-man-.svg') }}" width="22" alt="man__icon"></span>@lang('project::all_users.contributing_authors')</div>
                <div class="text__cifra blue__data">{{ $projectStatistic->project_user_work }}</div>
            </div>
        </div>

        <div class="desc__project__item">
            <ul class="desc__ul">
                <li><span><img src="{{ asset('img/_src/desc__icon1.svg') }}" width="15"></span>@lang('project::all_users.project_description')</li>
                <li><span><img src="{{ asset('img/_src/flag.svg') }}"></span>@lang('project::all_users.project_data')</li>
                <li><span><img src="{{ asset('img/_src/tag.svg') }}"></span>@lang('project::all_users.project_rate')</li>
                <li><span><img src="{{ asset('img/_src/equalizer.svg') }}"></span>@lang('project::all_users.project_action')</li>
            </ul>
        </div>
        <div class="all__project">
        @foreach($projects as $project)
            <div class="project__item {{ $project->class_css }}">
                <div class="describe__project">
                    <div class="describe__id">
                        <p>ID - <span class="project_id">{{ $project->id }}</span></p>
                        <span class="status__project active__status">{{ $project->status }}</span>
                    </div>

                    <div class="describe__inner">
                        <a href="{{ route('client.projects.show', $project->id) }}" class="describe__title">{{ $project->title }}</a>
                        <p class="paragraph__describe">
                           {{ $project->description }}
                        </p>

                        <div class="zametka__title">
                            @lang('project::client.project_the_note')
                        </div>
                        <p class="paragraph__describe">
                            @if($project->author_group_id && !empty($project->group->name))
                                 {{ $project->group->name }}
                            @else
                                @lang('project::client.project_not_group')
                            @endif
                        </p>

                        <div class="name-social name-social-1">
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
                </div>

                <div class="data__project">
                    <div class="item__data">
                        <div class="data__text">
                            @lang('project::client.project_count_bay')
                        </div>
                        <a class="data_shifr green__data" href="#project_bay-form" rel="modal:open">{{ $project->count_bay }}</a>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            @lang('project::client.project_in_check')
                        </div>
                        <a href="{{ route('client.projects.projectInCheck', ['project' => $project->id]) }}" class="data_shifr red__data">
                            {{ $project->projectInCheck->count() }}
                        </a>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            @lang('project::client.project_for_revision')
                        </div>
                        <span class="data_shifr black__data">{{ $project->projectForRevision->count() }}</span>
                    </div>

                    <div class="item__data">
                        <div class="data__text">
                            @lang('project::client.project_author_work')
                        </div>
                        <span class="data_shifr blue__data">{{ $project->projectInWork->count() }}</span>
                    </div>

                    <div class="item__data top__border">
                        <div class="data__text">
                            @lang('project::client.project_verified')
                        </div>
                        <span class="data_shifr green__data">{{ $project->projectVerified->count() }}</span>
                    </div>

                    <div class="last__work">
                        <div class="work__text">
                            @lang('project::client.project_last_work')
                        </div>

                        <div class="work__under">
                            10 сентября 2020г <br>09:27:13
                        </div>
                    </div>
                </div>
                <div class="tariph__project">
                    <div class="tariph__title">
                        {{ $project->rate->content_current_lang_rate->description }}
                    </div>

                    <div class="tariph__usd">
                        <span class="price">{{ $project->price }}</span> <span class="code">{{ $project->currency->code ?? '' }}</span>
                    </div>

                    <div class="tariph__btn">
                        <a  href="#project_bay-form" rel="modal:open">@lang('project::all_users.project_bay_sub')</a>
                    </div>

                    <div class="tariph__icon">
                        <div class="icon__tariph"><img src="{{ asset('img/_src/chat.svg') }}" width="17" alt="icon__tariph"><span>2</span></div>
                        <div class="icon__tariph"><img src="{{ asset('img/_src/sad.svg') }}" width="16" alt="icon__tariph"><span>5</span></div>
                    </div>
                    <div class="tariph__flag">
                        <span><img src="{{ asset('img/_src/flag__tariph.png') }}" alt="flag__tariph"></span>
                    </div>
                </div>

                <div class="actions__project">
                    <ul class="actions__icons">
                        <li>
                            <a href="{{ route('client.projects.edit', $project->id) }}">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00186 14.8736L2.14596 11.0177L11.4721 1.69156L15.328 5.54746L6.00186 14.8736ZM1.78553 11.6969L5.32264 15.234L0.0195312 17L1.78553 11.6969ZM16.514 4.36659L15.8452 5.03539L11.9842 1.17439L12.653 0.505585C13.3267 -0.168528 14.4192 -0.168528 15.0929 0.505585L16.514 1.92667C17.1828 2.60262 17.1828 3.69084 16.514 4.36659Z" fill="#92A2BB"/>
                                </svg>
                            </a>
                        </li>
                        @if($project->count_bay)
                        <li>
                            <button class="a_link" form="form_moneyBack_{{ $project->id }}">
                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.1249 4.64058H15.2809V2.06798C15.2809 0.976769 14.4398 0.0888672 13.4058 0.0888672H4.59384C3.55993 0.0888672 2.71895 0.976769 2.71895 2.06798V4.64065H1.87495C0.839724 4.64058 0 5.52676 0 6.61983V14.9322C0 16.0253 0.83941 16.9112 1.87495 16.9112H16.1249C17.1602 16.9112 18 16.0252 18 14.9322V6.61983C18 5.52676 17.1605 4.64058 16.1249 4.64058ZM12.6908 11.7188C12.6908 12.0349 12.4482 12.2906 12.1491 12.2906H10.4346V14.0993C10.4346 14.4154 10.192 14.6715 9.89294 14.6715H8.10725C7.80815 14.6715 7.56569 14.4154 7.56569 14.0993V12.2906H5.8511C5.55231 12.2906 5.30935 12.0348 5.30935 11.7188V9.83389C5.30935 9.51744 5.55193 9.26177 5.8511 9.26177H7.56556V7.45279C7.56556 7.13707 7.80802 6.88067 8.10713 6.88067H9.89281C10.1919 6.88067 10.4345 7.13707 10.4345 7.45279V9.26177H12.149C12.4481 9.26177 12.6907 9.51751 12.6907 9.83389V11.7188H12.6908ZM13.7813 4.64058H4.21861V2.06798C4.21861 1.84934 4.38696 1.67224 4.59352 1.67224H13.4058C13.6127 1.67224 13.7813 1.84967 13.7813 2.06798V4.64058Z" fill="#92A2BB"/>
                                </svg>
                            </button>
                            <form id="form_moneyBack_{{ $project->id }}" action="{{ route('client.projects.moneyBack') }}" method="POST">
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                @csrf
                            </form>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('client.projects.clone', $project->id) }}">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip3)">
                                        <path d="M11.5148 0H1.47314C1.21427 0 1.00439 0.222992 1.00439 0.498047V13.3012C1.00439 13.5763 1.21427 13.7993 1.47314 13.7993H11.5148C11.7737 13.7993 11.9836 13.5763 11.9836 13.3012V0.498047C11.9836 0.222992 11.7737 0 11.5148 0Z" fill="#92A2BB"/>
                                        <path d="M14.527 3.20081H12.9208V13.3012C12.9208 14.1251 12.29 14.7953 11.5145 14.7953H4.0166V16.502C4.0166 16.777 4.22648 17 4.48535 17H14.527C14.7859 17 14.9958 16.777 14.9958 16.502V3.69885C14.9958 3.4238 14.7859 3.20081 14.527 3.20081Z" fill="#92A2BB"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip3">
                                            <rect width="16" height="17" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.50002 0C3.81317 0 0 3.81317 0 8.50002C0 13.1869 3.81317 17 8.50002 17C13.1869 17 17 13.1869 17 8.50002C17 3.81317 13.1868 0 8.50002 0ZM9.05292 13.5433C8.64909 13.6106 7.84555 13.7787 7.43751 13.8125C7.09211 13.8411 6.76618 13.6434 6.56749 13.3596C6.36828 13.0758 6.32055 12.7127 6.43881 12.3869L8.04554 7.96878H6.375C6.37357 7.04817 7.0641 6.37127 7.94728 6.11148C8.36875 5.98748 9.154 5.81778 9.56249 5.84379C9.80723 5.85935 10.2338 6.0129 10.4325 6.29671C10.6317 6.58049 10.6795 6.94366 10.5612 7.26946L8.95446 11.6875H10.6245C10.6248 12.6071 9.96003 13.3921 9.05292 13.5433ZM9.56249 5.31252C8.97567 5.31252 8.49998 4.83676 8.49998 4.25001C8.49998 3.66319 8.97567 3.1875 9.56249 3.1875C10.1493 3.1875 10.625 3.66319 10.625 4.25001C10.625 4.8368 10.1493 5.31252 9.56249 5.31252Z" fill="#92A2BB"/>
                            </svg>
                        </li>
                        <li>
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 6.66797C10.6892 6.66797 12.0586 5.22251 12.0586 3.43945C12.0586 1.65639 10.6892 0.210938 9 0.210938C7.31079 0.210938 5.94141 1.65639 5.94141 3.43945C5.94141 5.22251 7.31079 6.66797 9 6.66797Z" fill="#92A2BB"/>
                                <path d="M15.1875 6.66797C16.2554 6.66797 17.1211 5.75418 17.1211 4.62696C17.1211 3.49973 16.2554 2.58594 15.1875 2.58594C14.1196 2.58594 13.2539 3.49973 13.2539 4.62696C13.2539 5.75418 14.1196 6.66797 15.1875 6.66797Z" fill="#92A2BB"/>
                                <path d="M2.8125 6.66797C3.88039 6.66797 4.74609 5.75418 4.74609 4.62696C4.74609 3.49973 3.88039 2.58594 2.8125 2.58594C1.74461 2.58594 0.878906 3.49973 0.878906 4.62696C0.878906 5.75418 1.74461 6.66797 2.8125 6.66797Z" fill="#92A2BB"/>
                                <path d="M4.71762 8.50083C3.95648 7.84259 3.26718 7.92972 2.38711 7.92972C1.07086 7.92972 0 9.05339 0 10.4342V14.4869C0 15.0866 0.463711 15.5743 1.03395 15.5743C3.4958 15.5743 3.19922 15.6213 3.19922 15.4622C3.19922 12.5904 2.87698 10.4844 4.71762 8.50083Z" fill="#92A2BB"/>
                                <path d="M9.83693 7.94454C8.29976 7.80921 6.96364 7.9461 5.81119 8.95021C3.88262 10.5808 4.25377 12.7763 4.25377 15.4622C4.25377 16.1728 4.8015 16.7617 5.48494 16.7617C12.9058 16.7617 13.2011 17.0144 13.6412 15.9858C13.7855 15.6379 13.746 15.7485 13.746 12.4207C13.746 9.77752 11.5778 7.94454 9.83693 7.94454Z" fill="#92A2BB"/>
                                <path d="M15.6127 7.92963C14.7279 7.92963 14.0423 7.84339 13.2822 8.50074C15.1091 10.4696 14.8006 12.4319 14.8006 15.4621C14.8006 15.6222 14.5544 15.5742 16.929 15.5742C17.5196 15.5742 17.9998 15.0691 17.9998 14.4483V10.4341C17.9998 9.0533 16.929 7.92963 15.6127 7.92963Z" fill="#92A2BB"/>
                            </svg>
                        </li>
                        <li>
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.51953 17H13.4805C14.3044 17 14.9746 16.3298 14.9746 15.5059V4.98047H11.4883C10.6644 4.98047 9.99414 4.31023 9.99414 3.48633V0H3.51953C2.69563 0 2.02539 0.670238 2.02539 1.49414V15.5059C2.02539 16.3298 2.69563 17 3.51953 17ZM5.51172 7.00586H11.4883C11.7636 7.00586 11.9863 7.22862 11.9863 7.50391C11.9863 7.77919 11.7636 8.00195 11.4883 8.00195H5.51172C5.23643 8.00195 5.01367 7.77919 5.01367 7.50391C5.01367 7.22862 5.23643 7.00586 5.51172 7.00586ZM5.51172 8.99805H11.4883C11.7636 8.99805 11.9863 9.22081 11.9863 9.49609C11.9863 9.77138 11.7636 9.99414 11.4883 9.99414H5.51172C5.23643 9.99414 5.01367 9.77138 5.01367 9.49609C5.01367 9.22081 5.23643 8.99805 5.51172 8.99805ZM5.51172 10.9902H11.4883C11.7636 10.9902 11.9863 11.213 11.9863 11.4883C11.9863 11.7636 11.7636 11.9863 11.4883 11.9863H5.51172C5.23643 11.9863 5.01367 11.7636 5.01367 11.4883C5.01367 11.213 5.23643 10.9902 5.51172 10.9902ZM5.51172 12.9824H9.49609C9.77138 12.9824 9.99414 13.2052 9.99414 13.4805C9.99414 13.7558 9.77138 13.9785 9.49609 13.9785H5.51172C5.23643 13.9785 5.01367 13.7558 5.01367 13.4805C5.01367 13.2052 5.23643 12.9824 5.51172 12.9824Z" fill="#92A2BB"/>
                                <path d="M11.4883 3.98442H14.6828L10.9902 0.29187V3.48638C10.9902 3.76116 11.2135 3.98442 11.4883 3.98442Z" fill="#92A2BB"/>
                            </svg>
                        </li>
                        <li data-toggle="tooltip" data-html="true"
                            data-tippy-content="@lang('project::project.project_deleted', ['title' => $project->title])">
                            <a href="{{ route('client.projects.destroy',$project->id) }}">
                                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 4.47217V1.2334C22 0.877445 21.7114 0.588867 21.3555 0.588867H0.644531C0.288578 0.588867 0 0.877445 0 1.2334V4.47217H22Z" fill="#92A2BB"/>
                                    <path d="M9.70557 9.6499H12.2944C12.6528 9.6499 12.9443 9.35836 12.9443 9C12.9443 8.64164 12.6528 8.3501 12.2944 8.3501H9.70557C9.34721 8.3501 9.05566 8.64164 9.05566 9C9.05566 9.35836 9.34721 9.6499 9.70557 9.6499Z" fill="#92A2BB"/>
                                    <path d="M1.29443 5.76123V16.7666C1.29443 17.1226 1.58301 17.4111 1.93896 17.4111H20.061C20.417 17.4111 20.7056 17.1226 20.7056 16.7666V5.76123H1.29443ZM9.70557 7.06104H12.2944C13.3636 7.06104 14.2334 7.93085 14.2334 9C14.2334 10.0691 13.3636 10.939 12.2944 10.939H9.70557C8.63642 10.939 7.7666 10.0691 7.7666 9C7.7666 7.93085 8.63642 7.06104 9.70557 7.06104Z" fill="#92A2BB"/>
                                </svg>
                            </a>
                        </li>
                    </ul>

                    <a  href="#project_bay_vip-form" rel="modal:open" class="vip__span @if($project->vip_status) active__vip @endif">vip</a>

                    <div class="action__describe">
                        @if($project->user_pro)
                        до 10 сентября 2021 года
                        @endif
                    </div>
                    <div class="enter__btn">
                        @if($project->status == 'off' or $project->status == 'on_moderation')
                        <a href="{{ route('client.projects.activate', $project->id) }}">
                            <span>
                                <img src="{{ asset('img/_src/play.svg') }}" alt="zapusk__img">
                            </span>
                            @lang('project::all_users.project_run')
                        </a>
                        @elseif($project->status == 'active')
                            <a class="off" href="{{ route('client.projects.off', $project->id) }}">
                            <span>
                                {{--<img src="{{ asset('img/_src/play.svg') }}" alt="zapusk__img">--}}
                            </span>
                                @lang('project::all_users.project_off')
                            </a>
                        @endif
                    </div>
                    <div class="absolute__checkbox">
                        <input type="checkbox" id="choose__check1">
                        <label for="choose__check1">@lang('project::client.project_app')</label>
                    </div>

                </div>
            </div>
        @endforeach
            <div class="pagination-wrapper mb-5">
                {{ $projects->appends(Request::except('page'))->links('mainpage::vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        @include('project::front.block.modal_pay')
        @include('project::front.block.modal_pay_vip')
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
                window.location.href = uri;
            });
        });

        $(document).on('click','a[href="#project_bay-form"]',function (){
            let price = $(this).parents('.project__item').find('.price').text();
            let code = $(this).parents('.project__item').find('.code').text();
            let project_id = $(this).parents('.project__item').find('.project_id').text();
            $('#project_bay-form input[name="price"]').val(price);
            $('#project_bay-form input[name="project_id"]').val(project_id);
            $('#project_bay-form #code').html('<p>'+code+'</p>');
        });
    </script>
@endsection
