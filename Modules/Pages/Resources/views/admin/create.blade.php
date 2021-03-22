@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> @lang('users::users.title_add')</div>
                <div class="card-body">
                    <form id="quickForm" action="{{ route('admin.page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Введите название" value="{{ old('name') }}">
                                @error('name')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Выбрать родительскую страницу</label>
                                <select name="parent_id" class="form-control" >
                                    <option value="0">-Выбрать страницу</option>
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
                                        <label for="image">@lang('app.enter_image')</label>
                                        <input type="file" name="image" class="form-control" id="image" placeholder="Изображения">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">@lang('app.enter_alt_image')</label>
                                        <input type="text" name="alt_img" class="form-control" id="alt_img" placeholder="Введите название" value="{{ old('alt_img') }}">
                                        @error('alt_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">@lang('app.enter_alt_image')</label>
                                        <input type="text" name="title_img" class="form-control" id="title_img" placeholder="Введите название" value="{{ old('title_img') }}">
                                        @error('title_img')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quote">Краткое описание</label>
                                <textarea name="quote" class="form-control" id="quote" rows="4" placeholder="Краткое описание">{{ old('quote') }}</textarea>
                                @error('quote')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Описание</label>
                                <textarea name="content" class="form-control summernote" id="content" rows="8" placeholder="Описание">{{ old('content') }}</textarea>
                                @error('content')
                                <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="seo_title">SEO Заголовок</label>
                                <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Краткое описание" value="{{ old('seo_title') }}">
                                @error('seo_title')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO Описание</label>
                                <textarea name="seo_description" class="form-control" id="seo_description" rows="6" placeholder="Описание">{{ old('seo_description') }}</textarea>
                                @error('seo_description')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords">SEO Ключевые слова</label>
                                <textarea name="seo_keywords" class="form-control" id="seo_keywords" rows="6" placeholder="Описание">{{ old('seo_keywords') }}</textarea>
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
