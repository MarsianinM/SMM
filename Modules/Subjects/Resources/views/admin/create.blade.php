@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> @lang('subjects::subject.title_add')</div>
        </div>
        <form id="quickForm" action="{{ route('admin.subject.store') }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-md-8 mb-4">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($array_localization as $localeCode => $properties)
                            <li class="nav-item">
                                <a class="nav-link
                                @if($localeCode == config('app.locale'))
                                 active
                                 @endif
                                " data-toggle="tab" href="#{{$localeCode}}" role="tab" aria-controls="home" aria-selected="true">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                        {{--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a></li>--}}
                    </ul>
                    <div class="tab-content">
                        @foreach($array_localization as $localeCode => $properties)
                        <div class="tab-pane
                            @if($localeCode == config('app.locale'))
                            active
                            @endif" id="{{$localeCode}}" role="tabpanel">
                            <input type="hidden" value="{{$localeCode}}" name="newsDescription[{{$localeCode}}][lang_key]">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">@lang('subjects::subject.enter_title')</label>
                                        <input type="text" name="title[{{$localeCode}}]" class="form-control" id="title" placeholder="@lang('subjects::subject.enter_title')" value="{!! old('title.'.$localeCode) !!}">
                                        @error('newsDescription.'.$localeCode.'.title')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--<div class="tab-pane" id="profile" role="tabpanel">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>--}}
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <label for="name">@lang('subjects::subject.enter_active')</label>
                            <select class="form-control col-6" id="active" name="active">
                                <option value="0">@lang('subjects::subject.active_off')</option>
                                <option value="1">@lang('subjects::subject.active_on')</option>
                            </select>
                        </div>
                        <button class="btn btn-sm btn-primary" form="quickForm" type="submit">@lang('subjects::subject.submit_add')</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('js')
    <script>

        //# sourceMappingURL=tooltips.js.map
    </script>
@endsection
