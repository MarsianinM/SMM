@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h2><i class="fa fa-align-justify cil-library"></i> @lang('subjects::subject.name')</h2></div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.subject.create') }}" class="btn btn-primary">
                        <i class="fa fa-align-justify cil-library-add"></i> @lang('subjects::subject.title_add')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="subject" class="table table-responsive-sm table-striped display responsive" width="100%">
                <thead>
                <tr>
                    <th>@lang('subjects::subject.th_id')</th>
                    <th>@lang('subjects::subject.th_title')</th>
                    <th>@lang('subjects::subject.th_create_date')</th>
                    <th>@lang('subjects::subject.th_action')</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')

    <script>
        $(function() {
            $('#subject').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('admin.subject.anyData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
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
            let chek = '0';
            if($(this).is(':checked')){
                chek = '1';
            }
            $(this).parents('label').next('form').find('input[name="active"]').val(chek);
            $(this).parents('label').next('form').find("#sendButton").click();
        });
    </script>
@endsection
