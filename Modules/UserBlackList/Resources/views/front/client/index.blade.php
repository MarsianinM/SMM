@extends('mainpage::layouts.front.app',[
    'title' => trans('userblacklist::blacklist.title_page'),
    'description' => trans('userblacklist::blacklist.title_page'),
    ])

@section('content')

    <div class="project__title cabinet__flex">
        <p>@lang('userblacklist::blacklist.title_page')</p>
        <div class="cabinet__right">
            <a href="#add_blacklist-form" rel="modal:open">
                <span>
                    <img src="{{ asset('img/_src/plus__icon.png') }}" alt="plus__icon">
                </span> @lang('userblacklist::blacklist.btn_add')
            </a>
        </div>
    </div>

    @if($blacklist->count())
    <form action="{{ route('client.blacklist.multiple-remove') }}" method="POST" class="table-wrap type__project__table" id="multiple-remove">
        @csrf
        <table>
            <thead>
            <tr>
                <th>@lang('userblacklist::blacklist.th_login')</th>
                <th>@lang('userblacklist::blacklist.th_type')</th>
                <th><input type="checkbox"> <span class="table__span">@lang('userblacklist::blacklist.th_all')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($blacklist as $user)
            <tr>
                <td data-label="@lang('userblacklist::blacklist.th_login')">{{ $user->name }}</td>
                <td data-label="@lang('userblacklist::blacklist.th_type')">
                    @lang('userblacklist::blacklist.td_'.$user->type)
                    @if(!empty($user->description))
                    <p>
                        {{ $user->description }}
                    </p>
                    @endif
                </td>
                <td data-label="@lang('userblacklist::blacklist.th_all')">
                    <a href="{{ route('client.blacklist.remove', ['blackList' => $user->id ]) }}">
                        <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 4.47217V1.2334C22 0.877445 21.7114 0.588867 21.3555 0.588867H0.644531C0.288578 0.588867 0 0.877445 0 1.2334V4.47217H22Z" fill="#92A2BB"></path>
                            <path d="M9.70557 9.6499H12.2944C12.6528 9.6499 12.9443 9.35836 12.9443 9C12.9443 8.64164 12.6528 8.3501 12.2944 8.3501H9.70557C9.34721 8.3501 9.05566 8.64164 9.05566 9C9.05566 9.35836 9.34721 9.6499 9.70557 9.6499Z" fill="#92A2BB"></path>
                            <path d="M1.29443 5.76123V16.7666C1.29443 17.1226 1.58301 17.4111 1.93896 17.4111H20.061C20.417 17.4111 20.7056 17.1226 20.7056 16.7666V5.76123H1.29443ZM9.70557 7.06104H12.2944C13.3636 7.06104 14.2334 7.93085 14.2334 9C14.2334 10.0691 13.3636 10.939 12.2944 10.939H9.70557C8.63642 10.939 7.7666 10.0691 7.7666 9C7.7666 7.93085 8.63642 7.06104 9.70557 7.06104Z" fill="#92A2BB"></path>
                        </svg>
                    </a>
                     <input type="checkbox" name="delete[]" value="{{ $user->id }}">
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    @else
    <p>
        @lang('userblacklist::blacklist.error_not_found')
    </p>
    @endif

    @include('userblacklist::front.client.modal.add_blacklist-form')

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
