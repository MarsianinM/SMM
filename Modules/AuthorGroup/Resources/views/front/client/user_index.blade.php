@extends('mainpage::layouts.front.app',[
    'title' => trans('authorgroup::user_author_group.title_page',['NAME' => $group->name]),
    'description' => trans('authorgroup::user_author_group.title_page',['NAME' => $group->name]),
    ])

@section('content')
    <div class="project__title cabinet__flex">
        <p>@lang('authorgroup::user_author_group.title_page',['NAME' => $group->name])</p>
        <div class="cabinet__all__right">

            <div class="cabinet__right">
                <a href="#add_user_authorGroup-form" rel="modal:open">
                    <span>
                        <img src="{{ asset('img/_src/plus__icon.png') }}" alt="plus__icon">
                    </span>@lang('authorgroup::user_author_group.add_user')
                </a>
            </div>
        </div>
    </div>
    @if($usersAuthors->count())
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
                @foreach($usersAuthors as $item)
                    <tr data-id="{{ $item->id }}" data-name="{{ $item->user->name }}">
                        <td data-label="@lang('authorgroup::author_group.th_id')">{{ $item->id }}</td>
                        <td data-label="@lang('authorgroup::author_group.th_name')">
                            <p class="danger__green">{{ $item->user->name }}</p>
                        </td>
                        <td data-label="@lang('authorgroup::author_group.th_project')">

                        </td>
                        <td style="text-align: right;">
                            <form action="{{ route('client.author-group.user_destroy') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}" />
                                <input type="hidden" name="group_id" value="{{ $item->group_id }}" />
                                <button type="submit">
                                    <img class="icon__blank" src="{{ asset('img/_src/korzina__icon.png') }}" alt="korzina__icon">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>
            @lang('authorgroup::user_author_group.error_not_found')
        </p>
    @endif

    @include('authorgroup::front.client.modal.add_user_authorGroup-form')
    @include('authorgroup::front.client.modal.edit_authorGroup-form')

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
