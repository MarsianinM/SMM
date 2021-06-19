@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__top">
        <div class="project__title">

        </div>
    </div>
    <div class="project__title cabinet__flex">
        <p>@lang('projectgroup::project_group.title_page')</p>
        <div class="cabinet__all__right">

            <div class="cabinet__right">
                <a  href="#add_projectGroup-form" rel="modal:open">
                    <span>
                        <img src="{{ asset('img/_src/plus__icon.png') }}" alt="plus__icon">
                    </span>
                    @lang('projectgroup::project_group.add_group')
                </a>
            </div>
        </div>
    </div>

    @if(!empty($projectGroup))
        <div class="table-wrap group__project__table">
            <table>
                <thead>
                <tr>
                    <th>@lang('projectgroup::project_group.th_id')</th>
                    <th>@lang('projectgroup::project_group.th_title')</th>
                    <th>@lang('projectgroup::project_group.th_project_count')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @include('projectgroup::front.client.block.group_tr',['projectGroup' => $projectGroup, 'delimiter' => ''])
                </tbody>
            </table>
        </div>
    @endif
    @include('projectgroup::front.client.block.add_projectGroup',['projectGroup' => $projectGroup, 'delimiter' => ''])

@endsection

@section('script')
    <script>

    </script>
@endsection
