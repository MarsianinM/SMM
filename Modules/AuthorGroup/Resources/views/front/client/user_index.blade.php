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
                                <input type="hidden" name="user_id" value="{{ $item->user_id }}" />
                                <input type="hidden" name="group_id" value="{{ $item->group_id }}" />
                                <button type="submit" class="submit_group">
                                    <svg class="icon__blank" width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 4.47217V1.2334C22 0.877445 21.7114 0.588867 21.3555 0.588867H0.644531C0.288578 0.588867 0 0.877445 0 1.2334V4.47217H22Z"></path>
                                        <path d="M9.70557 9.6499H12.2944C12.6528 9.6499 12.9443 9.35836 12.9443 9C12.9443 8.64164 12.6528 8.3501 12.2944 8.3501H9.70557C9.34721 8.3501 9.05566 8.64164 9.05566 9C9.05566 9.35836 9.34721 9.6499 9.70557 9.6499Z"></path>
                                        <path d="M1.29443 5.76123V16.7666C1.29443 17.1226 1.58301 17.4111 1.93896 17.4111H20.061C20.417 17.4111 20.7056 17.1226 20.7056 16.7666V5.76123H1.29443ZM9.70557 7.06104H12.2944C13.3636 7.06104 14.2334 7.93085 14.2334 9C14.2334 10.0691 13.3636 10.939 12.2944 10.939H9.70557C8.63642 10.939 7.7666 10.0691 7.7666 9C7.7666 7.93085 8.63642 7.06104 9.70557 7.06104Z"></path>
                                    </svg>
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
