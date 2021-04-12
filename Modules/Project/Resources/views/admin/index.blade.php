@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h2><i class="fa fa-align-justify cil-library"></i> @lang('project::project.name')</h2></div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.page.create') }}" class="btn btn-primary">
                        <i class="fa fa-align-justify cil-library-add"></i> @lang('project::project.add_user')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped" id="project">
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
               {{-- <tbody>
                @forelse($projects as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->client_name }}</td>
                        <td>
                            {!! $item->small_description !!}
                        </td>
                        <td>{!! $item->date_start_and_finish  !!}</td>
                        <td>Tarif</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.page.edit', $item->id) }}" class="btn btn-secondary btn-success"
                                   data-toggle="tooltip" data-html="true"
                                   data-original-title="@lang('project::project.action_edit', ['Id' => $item->id])">
                                    <i class="c-icon c-icon-1xl cil-pen"></i>
                                </a>
                                <button form="form-id_{{ $item->id }}" class="btn btn-secondary btn-danger"
                                        type="submit"
                                        data-toggle="tooltip" data-html="true"
                                        data-original-title="@lang('project::project.action_delete', ['Id' => $item->id])">
                                    <i class="c-icon c-icon-1xl cil-delete"></i>
                                </button>
                                <form id="form-id_{{ $item->id }}" action="{{ route('admin.page.destroy', ['page' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">@lang('pages.list_error')</td>
                    </tr>
                @endforelse
                </tbody>--}}
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
                ajax: '{!! route('admin.project.anyData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'client_name', name: 'client_name' },
                    { data: 'small_description', name: 'small_description' },
                    { data: 'updated_at', name: 'updated_at' },
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
    </script>
@endsection
