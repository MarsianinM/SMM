@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i> @lang('users.admin_name')</div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>@lang('users.th_id')</th>
                    <th>@lang('users.th_name')</th>
                    <th>@lang('users.th_email')</th>
                    <th>@lang('users.th_balance')</th>
                    <th>@lang('users.th_active_role')</th>
                    <th>@lang('users.th_has_admin')</th>
                    <th>@lang('users.th_email_verified_at')</th>
                    <th>@lang('users.th_email_verified_at')</th>
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
                        <td>{{ $user->activeRole()->name }}</td>
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
                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
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
