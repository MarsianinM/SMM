@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-header"><i class="fa fa-align-justify"></i> @lang('rates::category.title_add')</div>
                </div>
                <div class="col-md-3 text-right pt-2">
                    <button class="btn btn-sm btn-primary mr-2" form="quickForm" type="submit">@lang('rates::category.submit_edit')</button>
                </div>
            </div>
        </div>
        <form id="quickForm" action="{{ route('admin.category.update', ['category' => $categoryRate->id]) }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            @method('PUT')
            <div class="col-md-8 mb-4">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($array_localization as $localeCode => $properties)
                            <li class="nav-item">
                                <a class="nav-link
                                @if($localeCode == config('app.locale'))
                                     active
                                @endif" data-toggle="tab" href="#{{$localeCode}}" role="tab" aria-controls="home" aria-selected="true">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($array_localization as $localeCode => $properties)
                            <div class="tab-pane
                                @if($localeCode == config('app.locale'))
                                active
                                @endif" id="{{$localeCode}}" role="tabpanel">
                                <input type="hidden" value="{{$localeCode}}" name="categoryDescription[{{$localeCode}}][lang_key]">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">@lang('rates::category.enter_title')</label>
                                            <input type="text" name="categoryDescription[{{$localeCode}}][title]" class="form-control" id="title" placeholder="@lang('rates::category.enter_title')" value="{!! $categoryRate->content[$localeCode]['title'] ?? old('categoryDescription.'.$localeCode.'.title') !!}">
                                            @error('categoryDescription.'.$localeCode.'.title')
                                            <small class="text-red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content">@lang('rates::category.enter_content')</label>
                                            <textarea name="categoryDescription[{{$localeCode}}][content]" class="form-control summernote" id="content" rows="8" placeholder="@lang('rates::category.enter_content')">{!! $categoryRate->content[$localeCode]['content'] ?? old('categoryDescription.'.$localeCode.'.content') !!}</textarea>
                                            @error('content')
                                            <small class="text-red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_title">@lang('rates::category.enter_seo_title')</label>
                                            <input type="text" name="categoryDescription[{{$localeCode}}][seo_title]" class="form-control" id="seo_title" placeholder="@lang('rates::category.enter_seo_title')" value="{!! $categoryRate->content[$localeCode]['seo_title'] ?? old('categoryDescription.'.$localeCode.'.seo_title') !!}">
                                            @error('seo_title')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_description">@lang('rates::category.enter_seo_description')</label>
                                            <textarea name="categoryDescription[{{$localeCode}}][seo_description]" class="form-control" id="seo_description" rows="6" placeholder="@lang('rates::category.enter_seo_description')">{!! $categoryRate->content[$localeCode]['seo_description'] ?? old('categoryDescription.'.$localeCode.'.seo_description') !!}</textarea>
                                            @error('seo_description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_keywords">@lang('rates::category.enter_seo_keywords')</label>
                                            <textarea name="categoryDescription[{{$localeCode}}][seo_keywords]" class="form-control" id="seo_keywords" rows="6" placeholder="@lang('rates::category.enter_seo_keywords')">{!! $categoryRate->content[$localeCode]['seo_keywords'] ?? old('categoryDescription.'.$localeCode.'.seo_keywords') !!}</textarea>
                                            @error('seo_keywords')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-primary" form="quickForm" type="submit">@lang('rates::category.submit_edit')</button>
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
                                    <label for="name">@lang('rates::category.enter_slug')</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="@lang('rates::category.enter_slug')" value="{!! $categoryRate->slug ?? old('slug') !!}">
                                    @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            @if($categories)
                            <div class="col-lg-12">
                                <label for="name">@lang('rates::category.enter_active')</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">@lang('rates::category.enter_tree_select')</option>
                                    @include('rates::admin.select.category_tree',['categories' => $categories, 'delimetr' => $delimetr])
                                </select>
                            </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name">@lang('rates::category.enter_sort_order')</label>
                                    <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="@lang('rates::category.enter_sort_order')" value="{{ $categoryRate->sort_order ?? old('sort_order') }}">
                                    @error('sort_order')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="name">@lang('rates::category.enter_active')</label>
                                <select class="form-control" id="active" name="active">
                                    @if($categoryRate->active == "0")
                                        <option value="0" selected>@lang('rates::category.active_off')</option>
                                        <option value="1">@lang('rates::category.active_on')</option>
                                    @else
                                        <option value="0">@lang('rates::category.active_off')</option>
                                        <option value="1" selected>@lang('rates::category.active_on')</option>
                                    @endif
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
