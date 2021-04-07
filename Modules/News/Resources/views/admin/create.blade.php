@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> @lang('news::news.title_add')</div>
        </div>
        <form id="quickForm" action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="row">
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
                        <div class="tab-pane active" id="{{$localeCode}}" role="tabpanel">
                            <input type="hidden" value="{{$localeCode}}" name="newsDescription[{{$localeCode}}][lang_key]">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">@lang('news::news.enter_title')</label>
                                        <input type="text" name="newsDescription[{{$localeCode}}][title]" class="form-control" id="title" placeholder="@lang('news::news.enter_title')" value="{!! old('newsDescription.'.$localeCode.'.title') !!}">
                                        @error('newsDescription.'.$localeCode.'.title')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="quote">@lang('news::news.enter_quote')</label>
                                        <textarea name="newsDescription[{{$localeCode}}][quote]" class="form-control" id="quote" rows="4" placeholder="@lang('news::news.enter_quote')">{!! old('newsDescription.'.$localeCode.'.quote') !!}</textarea>
                                        @error('quote')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">@lang('news::news.enter_content')</label>
                                        <textarea name="newsDescription[{{$localeCode}}][content]" class="form-control summernote" id="content" rows="8" placeholder="@lang('news::news.enter_content')">{!! old('newsDescription.'.$localeCode.'.content') !!}</textarea>
                                        @error('content')
                                        <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_title">@lang('news::news.enter_seo_title')</label>
                                        <input type="text" name="newsDescription[{{$localeCode}}][seo_title]" class="form-control" id="seo_title" placeholder="@lang('news::news.enter_seo_title')" value="{!! old('newsDescription.'.$localeCode.'.seo_title') !!}">
                                        @error('seo_title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_description">@lang('news::news.enter_seo_description')</label>
                                        <textarea name="newsDescription[{{$localeCode}}][seo_description]" class="form-control" id="seo_description" rows="6" placeholder="@lang('news::news.enter_seo_description')">{!! old('newsDescription.'.$localeCode.'.seo_description') !!}</textarea>
                                        @error('seo_description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="seo_keywords">@lang('news::news.enter_seo_keywords')</label>
                                        <textarea name="newsDescription[{{$localeCode}}][seo_keywords]" class="form-control" id="seo_keywords" rows="6" placeholder="@lang('news::news.enter_seo_keywords')">{!! old('newsDescription.'.$localeCode.'.seo_keywords') !!}</textarea>
                                        @error('seo_keywords')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" form="quickForm" type="submit">@lang('news::news.submit_add')</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--<div class="tab-pane" id="profile" role="tabpanel">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image">@lang('news::news.enter_image')</label>
                                    <input type="file" name="image" class="form-control" id="image" placeholder="@lang('news::news.enter_image')">
                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            @foreach($array_localization as $localeCode => $properties)
                            <div class="tab-pane active" id="{{$localeCode}}" role="tabpanel" style="width: 100%;">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">({{$localeCode}}) - @lang('news::news.enter_alt_image')</label>
                                        <input type="text" name="newsDescription[{{$localeCode}}][alt_img]" class="form-control" id="alt_img" placeholder="@lang('news::news.enter_alt_image')" value="{!! old('newsDescription.'.$localeCode.'.alt_img') !!}">
                                        @error('alt_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">({{$localeCode}}) - @lang('news::news.enter_title_image')</label>
                                        <input type="text" name="newsDescription[{{$localeCode}}][title_img]" class="form-control" id="title_img" placeholder="@lang('news::news.enter_title_image')" value="{!! old('newsDescription.'.$localeCode.'.title_img') !!}">
                                        @error('title_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">@lang('news::news.enter_sort_order')</label>
                                    <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="@lang('news::news.enter_sort_order')" value="{{ old('sort_order') }}">
                                    @error('sort_order')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="name">@lang('news::news.enter_active')</label>
                                <select class="form-control" id="active" name="active">
                                    <option value="0">@lang('news::news.active_off')</option>
                                    <option value="1">@lang('news::news.active_on')</option>
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
