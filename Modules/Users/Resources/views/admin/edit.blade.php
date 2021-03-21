@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> @lang('users::users.title_edit', ['Name' => $user->name])</div>
                <div class="card-body">
                    <form class="form-horizontal" id="users_update" action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('users::users.name_user')</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">@lang('users::users.enter_name')</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/brand/free.svg#cil-user") }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" id="input-name" type="text" name="name"
                                           placeholder="@lang('users::users.enter_name')"
                                           value="{{ old('name') ?? $user->name }}"
                                           autocomplete="username">
                                </div>{{--
                                <span class="help-block">This is a help text</span>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input">@lang('users::users.enter_email')</label>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="{{ asset("assets/brand/free.svg#cil-envelope-open") }}"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" id="input-name" type="text" name="email"
                                           placeholder="@lang('users::users.enter_email')"
                                           value="{{ old('email') ?? $user->email }}"
                                           autocomplete="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="active-input">@lang('users::users.enter_active')</label>
                            <div class="col-md-9">
                                <div>
                                    <label class="c-switch c-switch-label c-switch-opposite-primary"
                                           data-toggle="tooltip" data-html="true"
                                           data-original-title="@lang('users::users.action_off_on', ['Name' => $user->name])">
                                        <input id="active-input" class="c-switch-input" name="active" type="checkbox" {{ ($user->active == 1 ? 'checked' : '')  }}>
                                        <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                       {{-- <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email_valid-input">@lang('users::users.enter_email_valid')</label>
                            <div class="col-md-9">
                                <div>
                                    <label class="c-switch c-switch-label c-switch-opposite-primary"
                                           data-toggle="tooltip" data-html="true"
                                           data-original-title="@lang('users::users.action_off_on', ['Name' => $user->name])">
                                        <input id="email_valid-input" class="c-switch-input" name="'email_verified_at" type="checkbox" {{ ($user->email_valid ? 'checked' : '')  }}>
                                        <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                    </label>
                                </div>
                            </div>
                        </div>--}}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="image-input">@lang('users::users.enter_image')</label>
                            <div class="col-md-9">
                                <input id="image-input" type="file" name="image">
                                <div class="py-2">
                                    <img src="{{ $user->getFirstMediaUrl('user_icon', 'thumb') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" form="users_update" type="submit">Submit</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>
            </div>
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
    </script>
@endsection
