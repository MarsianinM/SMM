@extends('mainpage::layouts.front.app',[
    'title' => trans('authorgroup::author_group.title_page'),
    'description' => trans('authorgroup::author_group.title_page'),
    ])

@section('content')
    <div class="project__title cabinet__flex">
        <p>@lang('authorgroup::author_group.title_page')</p>
        <div class="cabinet__all__right">

            <div class="cabinet__right">
                <a href="#add_authorGroup-form" rel="modal:open">
                    <span>
                        <img src="{{ asset('img/_src/plus__icon.png') }}" alt="plus__icon">
                    </span>@lang('authorgroup::author_group.add_group')
                </a>
            </div>
        </div>
    </div>
    @if($authorGroups->count())
        <div class="table-wrap comand__author__table">
            <table>
                <thead>
                <tr>
                    <th>@lang('authorgroup::author_group.th_id')</th>
                    <th>@lang('authorgroup::author_group.th_name')</th>
                    <th>@lang('authorgroup::author_group.th_project')</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($authorGroups as $item)
                <tr data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                    <td data-label="@lang('authorgroup::author_group.th_id')">{{ $item->id }}</td>
                    <td data-label="@lang('authorgroup::author_group.th_name')">
                        <p class="danger__green">{{ $item->name }}</p>
                        <span>@lang('authorgroup::author_group.td_count_author'){{ $item->count_project }}</span>
                    </td>
                    <td data-label="@lang('authorgroup::author_group.th_project')">
                        @if($item->projects->count())
                            @foreach($item->projects as $project)
                                <p>
                                    {{ $project->title }} - id({{ $project->id }})
                                </p>
                            @endforeach
                        @else
                            <p>
                                @lang('authorgroup::author_group.td_not_projects')
                            </p>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        @if($item->description)
                            <a href="#description" rel="modal:open">
                                <div class="description hidden">
                                    {{ $item->description }}
                                </div>
                                <img class="icon__blank" src="{{ asset('img/_src/comment__icon.png') }}" alt="comment__icon">
                            </a>
                        @endif
                        <a href="#edit_authorGroup-form" rel="modal:open">
                        <img class="icon__blank" src="{{ asset('img/_src/pancel__icon.png') }}" alt="korzina__icon">
                        </a>
                        <a href="{{ route('client.author-group.destroy',['authorGroup' => $item->id]) }}">
                        <img class="icon__blank" src="{{ asset('img/_src/korzina__icon.png') }}" alt="korzina__icon">
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>
            @lang('authorgroup::author_group.error_not_found')
        </p>
    @endif

    @include('authorgroup::front.client.modal.add_authorGroup-form')
    @include('authorgroup::front.client.modal.edit_authorGroup-form')
    @include('authorgroup::front.client.modal.desription')

@endsection

@section('script')
    <script>
        $(document).on('click','a.submit_group',function (){
            $(this).parent().find('form button').click();
            return false;
        });
        $(document).on('click','a[href="#description"]',function (){
            let tr                  = $(this).parents('tr'),
                description         = tr.find('.description').text(),
                name                = tr.data('name');
            $('#description #text_description').text(description);
            $('#description #title_description').text(name);
        });
        $(document).on('click','a[href="#edit_authorGroup-form"]',function (){
            let tr                  = $(this).parents('tr'),
                id                  = tr.data('id'),
                description         = tr.find('.description').text(),
                name                = tr.data('name');
            $('#edit_authorGroup-form input[name="name"]').val(name);
            $('#edit_authorGroup-form input[name="id"]').val(id);
            $('#edit_authorGroup-form textarea[name="description"]').val(description);
        });

    </script>
@endsection
