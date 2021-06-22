@extends('mainpage::layouts.front.app',[
    'title' => trans('authorgroup::author_group.title_page'),
    'description' => trans('authorgroup::author_group.title_page'),
    ])

@section('content')
    <div class="project__title cabinet__flex">
        <p>@lang('authorgroup::author_group.title_page')</p>
        <div class="cabinet__all__right">

            <div class="cabinet__right">
                <a href="#">
                    <span>
                        <img src="{{ asset('img/_src/plus__icon.png') }}" alt="plus__icon">
                    </span>@lang('authorgroup::author_group.add_group')
                </a>
            </div>
        </div>
    </div>


    @if($authorGroups->count())
    <div class="table-wrap group__project__table">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название группы</th>
                <th>Проектов</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($authorGroups as $item)
            <tr>
                <td data-label="ID">{{ $item->id }}</td>
                <td data-label="Название группы">
                    {{ $item->name }}
                </td>
                <td data-label="Проектов">250</td>
                <td style="text-align: right;">
                    <img class="icon__blank" src="{{ asset('img/_src/comment__icon.png') }}" alt="comment__icon">
                    <img class="icon__blank" src="{{ asset('img/_src/pancel__icon.png') }}" alt="korzina__icon">
                    <img class="icon__blank" src="{{ asset('img/_src/korzina__icon.png') }}" alt="korzina__icon">
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
