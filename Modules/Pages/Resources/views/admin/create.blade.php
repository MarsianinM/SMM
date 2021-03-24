@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> @lang('pages::pages.title_add')</div>
                <div class="card-body">
                    <form id="quickForm" action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">@lang('pages::pages.enter_title')</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="@lang('pages::pages.enter_title')" value="{{ old('title') }}">
                                @error('title')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_id">@lang('pages::pages.enter_parent')</label>
                                <select name="parent_id" class="form-control" >
                                    <option value="0">-@lang('pages::pages.enter_parent')</option>
                                    @if(collect($allPages)->count())
                                        @foreach($allPages as $key => $page)
                                            <option value="{{ $page->id }}">{{ $page->id }} - {{ $page->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('parent_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">@lang('pages::pages.enter_image')</label>
                                        <input type="file" name="image" class="form-control" id="image" placeholder="@lang('pages::pages.enter_image')">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">@lang('pages::pages.enter_alt_image')</label>
                                        <input type="text" name="alt_img" class="form-control" id="alt_img" placeholder="@lang('pages::pages.enter_alt_image')" value="{{ old('alt_img') }}">
                                        @error('alt_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">@lang('pages::pages.enter_title_image')</label>
                                        <input type="text" name="title_img" class="form-control" id="title_img" placeholder="@lang('pages::pages.enter_title_image')" value="{{ old('title_img') }}">
                                        @error('title_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                {{-- 'title','slug','quote','content','active','parent_id','seo_title','seo_description','seo_keywords',--}}
                            </div>
                            <div class="form-group">
                                <label for="quote">@lang('pages::pages.enter_quote')</label>
                                <textarea name="quote" class="form-control" id="quote" rows="4" placeholder="@lang('pages::pages.enter_quote')">{{ old('quote') }}</textarea>
                                @error('quote')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">@lang('pages::pages.enter_content')</label>
                                <textarea name="content" class="form-control summernote" id="content" rows="8" placeholder="@lang('pages::pages.enter_content')">{{ old('content') }}</textarea>
                                @error('content')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="seo_title">@lang('pages::pages.enter_seo_title')</label>
                                <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="@lang('pages::pages.enter_seo_title')" value="{{ old('seo_title') }}">
                                @error('seo_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seo_description">@lang('pages::pages.enter_seo_description')</label>
                                <textarea name="seo_description" class="form-control" id="seo_description" rows="6" placeholder="@lang('pages::pages.enter_seo_description')">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords">@lang('pages::pages.enter_seo_keywords')</label>
                                <textarea name="seo_keywords" class="form-control" id="seo_keywords" rows="6" placeholder="@lang('pages::pages.enter_seo_keywords')">{{ old('seo_keywords') }}</textarea>
                                @error('seo_keywords')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" form="quickForm" type="submit">@lang('pages::pages.submit_add')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        //# sourceMappingURL=tooltips.js.map
    </script>
@endsection
