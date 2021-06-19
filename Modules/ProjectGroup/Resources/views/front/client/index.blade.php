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
                    @include('projectgroup::front.client.block.group_tr',[
                        'projectGroup' => $projectGroup,
                        'delimiter' => ''
                        ])
                </tbody>
            </table>
        </div>
    @endif
    @include('projectgroup::front.client.block.add_projectGroup',['projectGroup' => $projectGroup, 'delimiter' => ''])
    @include('projectgroup::front.client.block.edit_projectGroup',['projectGroup' => $projectGroup, 'delimiter' => ''])

@endsection

@section('script')
    <script>
        $(document).on('click','a.submit_group',function (){
            $(this).parent().find('form button').click();
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
            $('#edit_projectGroup-form  #parent_id option[value='+parent_id+']').prop('selected', true);
            $('#edit_projectGroup-form  #show option[value='+show+']').prop('selected', true);
            $('#edit_projectGroup-form  #show_children_group option[value='+show_children_group+']').prop('selected', true);
        });
    </script>
@endsection
