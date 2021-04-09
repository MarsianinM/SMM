@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h2><i class="fa fa-align-justify cil-library"></i> @lang('rates::category.name')</h2></div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fa fa-align-justify cil-library-add"></i> @lang('rates::category.title_add')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>@lang('rates::category.th_id')</th>
                    <th>@lang('rates::category.th_title')</th>
                    <th>@lang('rates::category.th_create_date')</th>
                    <th>@lang('rates::category.th_action')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="title">{{ $item->content_current_lang->title }}</td>
                        <td>{{ $item->created_date }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-secondary btn-success"
                                       data-toggle="tooltip" data-html="true"
                                       data-original-title="@lang('rates::category.action_edit', ['Id' => $item->id])">
                                   <i class="c-icon c-icon-1xl cil-pen"></i>
                               </a>
                                <button form="form-id_{{ $item->id }}" class="btn btn-secondary btn-danger"
                                        type="submit"
                                        data-toggle="tooltip" data-html="true"
                                        data-original-title="@lang('rates::category.action_delete', ['Id' => $item->id])">
                                    <i class="c-icon c-icon-1xl cil-delete"></i>
                                </button>
                                <form id="form-id_{{ $item->id }}" action="{{ route('admin.category.destroy', ['category' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">@lang('rates::category.list_error')</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        /* global coreui */

        /**
         * --------------------------------------------------------------------------
         * CoreUI Free Boostrap Admin Template (v3.2.0): tooltips.js
         * Licensed under MIT (https://coreui.io/license)
         * --------------------------------------------------------------------------
         */
        document.querySelectorAll('[data-toggle="tooltip"]').forEach(function (element) {
            // eslint-disable-next-line no-new
            new coreui.Tooltip(element);
        });
        //# sourceMappingURL=tooltips.js.map

        $(document).on('change','.c-switch-input',function(){
            let chek = 'off';
            if($(this).is(':checked')){
                chek = 'on';
            }
            $(this).parents('label').next('form').find('input[name="active"]').val(chek);
            $(this).parents('label').next('form').find("#sendButton").click();
        });
    </script>
@endsection
