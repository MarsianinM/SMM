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
                <tr>
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
                        <a href="#add_authorGroup-form" rel="modal:open">
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

@endsection

@section('script')
    <script>
        $(document).on('click','a.submit_group',function (){
            $(this).parent().find('form button').click();
            return false;
        });
        $(document).on('click','a[href="#edit_projectGroup-form"]',function (){
            let tr                  = $(this).parents('tr'),
                parent_id           = tr.data('parent_id'),
                show                = tr.data('show'),
                show_children_group = tr.data('show_children_group'),
                name                = tr.data('name'),
                id                  = tr.data('id');
            $('#edit_projectGroup-form input[name="name"]').val(name);
            $('#edit_projectGroup-form input[name="id"]').val(id);
            $('#edit_projectGroup-form  select option').prop('selected', false);
            $('#edit_projectGroup-form  #parent_id option[value='+parent_id+']').prop('selected', true);
            $('#edit_projectGroup-form  #show option[value='+show+']').prop('selected', true);
            $('#edit_projectGroup-form  #show_children_group option[value='+show_children_group+']').prop('selected', true);
        });

    </script>
@endsection
