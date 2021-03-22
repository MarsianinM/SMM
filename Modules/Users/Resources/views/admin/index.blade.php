@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> @lang('users::users.name')</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>@lang('users::users.th_id')</th>
                    <th>@lang('users::users.th_name')</th>
                    <th>@lang('users::users.th_email')</th>
                    <th>@lang('users::users.th_balance')</th>
                    <th>@lang('users::users.th_has_admin')</th>
                    <th>@lang('users::users.th_email_verified_at')</th>
                    <th>@lang('users::users.th_action')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->getBalanceByCurrency('RUB') }} RUB / {{ $user->getBalanceByCurrency('USD') }} USD
                        </td>
                        <td>
                            @if($user->hasRole('admin'))
                                <span class="badge badge-success">@lang('users.yes')</span>
                            @else
                                <span class="badge badge-danger">@lang('users.no')</span>
                            @endif
                        </td>
                        <td>
                            @if(is_null($user->email_verified_at))
                                <span class="badge badge-danger">@lang('users.email_verified_no')</span>
                            @else
                                <span class="badge badge-success">@lang('users.email_verified_yes')</span>
                            @endif
                        </td>

                        <td>
                            <div>
                                <label class="c-switch c-switch-label c-switch-opposite-primary"
                                       data-toggle="tooltip" data-html="true"
                                       data-original-title="@lang('users::users.action_off_on', ['Name' => $user->name])">
                                    <input class="c-switch-input" type="checkbox" {{ ($user->active == 1 ? 'checked' : '')  }}>
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>

                                <form id="form_show-id_{{ $user->id }}" action="{{ route('admin.users.hidden', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="{{$user->active}}" name="action" />
                                </form>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary btn-success"
                                       data-toggle="tooltip" data-html="true"
                                       data-original-title="@lang('users::users.action_edit', ['Name' => $user->name])">
                                   <i class="c-icon c-icon-1xl cil-pen"></i>
                               </a>
                                <button form="form-id_{{ $user->id }}" class="btn btn-secondary btn-danger"
                                        type="submit"
                                        data-toggle="tooltip" data-html="true"
                                        data-original-title="@lang('users::users.action_delete', ['Name' => $user->name])">
                                    <i class="c-icon c-icon-1xl cil-delete"></i>
                                </button>
                                <form id="form-id_{{ $user->id }}" action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">@lang('users.list_error')</td>
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

        $(document).on('shange','.c-switch-input',function(){
            let chek = $(this).val();
            $(this).parents('label').next('form').find('input[name="action"]').val(chek)
            alert(chek);
        });
    </script>
@endsection
