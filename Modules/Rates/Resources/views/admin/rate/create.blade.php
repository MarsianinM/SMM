@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> @lang('rates::rates.title_add')</div>
        </div>
        <form id="quickForm" action="{{ route('admin.rates.store') }}" method="POST" enctype="multipart/form-data" class="row">
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
                            <input type="hidden" value="{{$localeCode}}" name="rateDescription[{{$localeCode}}][lang_key]">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">@lang('rates::rates.enter_title')</label>
                                        <input type="text" name="rateDescription[{{$localeCode}}][title]" class="form-control" id="title" placeholder="@lang('rates::rates.enter_title')" value="{!! old('rateDescription.'.$localeCode.'.title') !!}">
                                        @error('rateDescription.'.$localeCode.'.title')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">@lang('rates::rates.enter_description')</label>
                                        <textarea name="rateDescription[{{$localeCode}}][description]" class="form-control" id="description" rows="4" placeholder="@lang('rates::rates.enter_description')">{!! old('rateDescription.'.$localeCode.'.description') !!}</textarea>
                                        @error('rateDescription.'.$localeCode.'.description')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">@lang('rates::rates.enter_help_text')</label>
                                        <textarea name="rateDescription[{{$localeCode}}][help_text]" class="form-control summernote" id="help_text" rows="8" placeholder="@lang('rates::rates.enter_help_text')">{!! old('rateDescription.'.$localeCode.'.help_text') !!}</textarea>
                                        @error('rateDescription.'.$localeCode.'.help_text')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" form="quickForm" type="submit">@lang('rates::rates.submit_add')</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">@lang('rates::rates.enter_price_min')</label>
                                    <input type="text" name="price_min" class="form-control" id="price_min" placeholder="@lang('rates::rates.enter_input_price_min')" value="{{ old('price_min') }}">
                                    @error('price_min')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">@lang('rates::rates.enter_price_max')</label>
                                    <input type="text" name="price_max" class="form-control" id="price_max" placeholder="@lang('rates::rates.enter_input_price_max')" value="{{ old('price_max') }}">
                                    @error('price_max')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            @if($categories)
                                <div class="col-lg-12">
                                    <label for="category_id">@lang('rates::category.enter_active')</label>
                                    <select id="category_id" class="form-control" name="category_id">
                                        <option value="0">@lang('rates::category.enter_tree_select')</option>
                                        @include('rates::admin.select.category_tree',['categories' => $categories, 'delimetr' => $delimetr])
                                    </select>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="sort_order">@lang('rates::rates.enter_sort_order')</label>
                                    <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="@lang('rates::rates.enter_sort_order')" value="{{ old('sort_order') }}">
                                    @error('sort_order')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="active">@lang('rates::rates.enter_active')</label>
                                <select class="form-control" id="active" name="active">
                                    <option value="0">@lang('rates::rates.active_off')</option>
                                    <option value="1">@lang('rates::rates.active_on')</option>
                                </select>
                            </div>
                        </div>
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
