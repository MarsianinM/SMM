@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h2><i class="fa fa-align-justify cil-library"></i> @lang('project::project.name')</h2></div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.project.create') }}" class="btn btn-primary">
                        <i class="fa fa-align-justify cil-library-add"></i> @lang('project::project.add_user')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped display responsive" width="100%" id="project">
                <thead>
                <tr>
                    <th>@lang('project::project.th_id')</th>
                    <th>@lang('project::project.th_title')</th>
                    <th>@lang('project::project.th_client')</th>
                    <th>@lang('project::project.th_description')</th>
                    <th>@lang('project::project.th_date_start_and_finish')</th>
                    <th>@lang('project::project.th_rate')</th>
                    <th>@lang('project::project.th_action')</th>
                </tr>
                </thead>
            </table>

            {{--<div class="pagination-wrapper mb-5">
                {{ $projects->links('mainpage::admin.pagination.theme_admin') }}
            </div>--}}
        </div>
    </div>
@endsection
@section('js')

    <script>
        $(function() {
            $('#project').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('admin.project.anyData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'client_name', name: 'client.name' },
                    { data: 'small_description', name: 'description' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'rate', name: 'rate.rateDescription.title', orderable: false},
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
    </script>
@endsection
