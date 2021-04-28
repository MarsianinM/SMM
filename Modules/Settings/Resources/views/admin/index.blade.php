@extends('mainpage::layouts.admin.admin')

@section('content')

    <div class="nav-tabs-boxed mb-4">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">@lang('settings::settings.oue_setting')</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">@lang('settings::settings.footer_setting')</a></li>
        </ul>

        <form class="form-horizontal tab-content" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-pane active" id="home" role="tabpanel">
                <div class="card">
                    <div class="card-header">@lang('settings::settings.oue_setting_title')</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('settings::settings.enter_site_name')</label>
                            <div class="col-md-9">
                                @foreach($array_localization as $localeCode => $properties)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">{{ strtoupper($localeCode) }}</span>
                                        </div>
                                        <input class="form-control" id="text-input" type="text" name="data[{{ $localeCode }}][site_name]" placeholder="@lang('settings::settings.enter_site_name') {{ $localeCode }}"
                                            value="{!! $settings->data[$localeCode]['site_name'] ?? old('data.'.$localeCode.'.site_name') !!}">
                                    </div>
                                @endforeach
                                <div style="margin-top: -.7rem" class="help-block">@lang('settings::settings.help_site_name')</div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('settings::settings.enter_site_description')</label>
                            <div class="col-md-9">
                                @foreach($array_localization as $localeCode => $properties)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ strtoupper($localeCode) }}</span>
                                        </div>
                                        <textarea class="form-control" name="data[{{ $localeCode }}][description]" aria-label="With textarea">{!! $settings->data[$localeCode]['description'] ?? old('data.'.$localeCode.'.description') !!}</textarea>
                                    </div>
                                @endforeach
                                <div style="margin-top: -.7rem" class="help-block">@lang('settings::settings.help_site_description')</div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">@lang('settings::settings.enter_site_keywords')</label>
                            <div class="col-md-9">
                                @foreach($array_localization as $localeCode => $properties)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ strtoupper($localeCode) }}</span>
                                        </div>
                                        <textarea class="form-control" name="data[{{ $localeCode }}][keywords]" aria-label="With textarea">{!! $settings->data[$localeCode]['keywords'] ?? old('data.'.$localeCode.'.keywords') !!}</textarea>
                                    </div>
                                @endforeach
                                <div style="margin-top: -.7rem" class="help-block">@lang('settings::settings.help_site_keywords')</div>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="file-input">@lang('settings::settings.enter_site_logo')</label>
                            <div class="col-md-9">
                                @if($settings && $settings->hasMedia('settings'))
                                    <div class="col-md-3 pb-4">
                                        <img src="{{ $settings->getFirstMediaUrl('settings', 'logo') }}" alt="">
                                    </div>
                                @endif
                                <input id="file-input" type="file" name="site_logo">
                            </div>
                        </div>
                        {{--<hr/>--}}
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">@lang('settings::settings.submit_edit')</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
        </form>
    </div>
{{--
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="email-input">Email Input</label>
    <div class="col-md-9">
        <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email"><span class="help-block">Please enter your email</span>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="date-input">Date Input</label>
    <div class="col-md-9">
        <input class="form-control" id="date-input" type="date" name="date-input" placeholder="date"><span class="help-block">Please enter a valid date</span>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="disabled-input">Disabled Input</label>
    <div class="col-md-9">
        <input class="form-control" id="disabled-input" type="text" name="disabled-input" placeholder="Disabled" disabled="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="textarea-input">Textarea</label>
    <div class="col-md-9">
        <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="select1">Select</label>
    <div class="col-md-9">
        <select class="form-control" id="select1" name="select1">
            <option value="0">Please select</option>
            <option value="1">Option #1</option>
            <option value="2">Option #2</option>
            <option value="3">Option #3</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="select2">Select Large</label>
    <div class="col-md-9">
        <select class="form-control form-control-lg" id="select2" name="select2">
            <option value="0">Please select</option>
            <option value="1">Option #1</option>
            <option value="2">Option #2</option>
            <option value="3">Option #3</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="select3">Select Small</label>
    <div class="col-md-9">
        <select class="form-control form-control-sm" id="select3" name="select3">
            <option value="0">Please select</option>
            <option value="1">Option #1</option>
            <option value="2">Option #2</option>
            <option value="3">Option #3</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="disabledSelect">Disabled Select</label>
    <div class="col-md-9">
        <select class="form-control" id="disabledSelect" disabled="">
            <option value="0">Please select</option>
            <option value="1">Option #1</option>
            <option value="2">Option #2</option>
            <option value="3">Option #3</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="multiple-select">Multiple select</label>
    <div class="col-md-9">
        <select class="form-control" id="multiple-select" name="multiple-select" size="5" multiple="">
            <option value="1">Option #1</option>
            <option value="2">Option #2</option>
            <option value="3">Option #3</option>
            <option value="4">Option #4</option>
            <option value="5">Option #5</option>
            <option value="6">Option #6</option>
            <option value="7">Option #7</option>
            <option value="8">Option #8</option>
            <option value="9">Option #9</option>
            <option value="10">Option #10</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">Radios</label>
    <div class="col-md-9 col-form-label">
        <div class="form-check">
            <input class="form-check-input" id="radio1" type="radio" value="radio1" name="radios">
            <label class="form-check-label" for="radio1">Option 1</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" id="radio2" type="radio" value="radio2" name="radios">
            <label class="form-check-label" for="radio2">Option 2</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" id="radio3" type="radio" value="radio2" name="radios">
            <label class="form-check-label" for="radio3">Option 3</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">Inline Radios</label>
    <div class="col-md-9 col-form-label">
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-radio1" type="radio" value="option1" name="inline-radios">
            <label class="form-check-label" for="inline-radio1">One</label>
        </div>
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-radio2" type="radio" value="option2" name="inline-radios">
            <label class="form-check-label" for="inline-radio2">Two</label>
        </div>
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-radio3" type="radio" value="option3" name="inline-radios">
            <label class="form-check-label" for="inline-radio3">Three</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">Checkboxes</label>
    <div class="col-md-9 col-form-label">
        <div class="form-check checkbox">
            <input class="form-check-input" id="check1" type="checkbox" value="">
            <label class="form-check-label" for="check1">Option 1</label>
        </div>
        <div class="form-check checkbox">
            <input class="form-check-input" id="check2" type="checkbox" value="">
            <label class="form-check-label" for="check2">Option 2</label>
        </div>
        <div class="form-check checkbox">
            <input class="form-check-input" id="check3" type="checkbox" value="">
            <label class="form-check-label" for="check3">Option 3</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label">Inline Checkboxes</label>
    <div class="col-md-9 col-form-label">
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-checkbox1" type="checkbox" value="check1">
            <label class="form-check-label" for="inline-checkbox1">One</label>
        </div>
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-checkbox2" type="checkbox" value="check2">
            <label class="form-check-label" for="inline-checkbox2">Two</label>
        </div>
        <div class="form-check form-check-inline mr-1">
            <input class="form-check-input" id="inline-checkbox3" type="checkbox" value="check3">
            <label class="form-check-label" for="inline-checkbox3">Three</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="file-multiple-input">Multiple File input</label>
    <div class="col-md-9">
        <input id="file-multiple-input" type="file" name="file-multiple-input" multiple="">
    </div>
</div>
--}}
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
