@extends('mainpage::layouts.admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"><h2><i class="fa fa-align-justify cil-library"></i> @lang('news::news.name')</h2></div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="fa fa-align-justify cil-library-add"></i> @lang('news::news.title_add')
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                <tr>
                    <th>@lang('news::news.th_id')</th>
                    <th>@lang('news::news.th_title')</th>
                    <th>@lang('news::news.th_image')</th>
                    <th>@lang('news::news.th_quote')</th>
                    <th>@lang('news::news.th_action')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <div class="py-2">
                                <img src="{{ $item->getFirstMediaUrl('news', 'thumb') }}" alt="{{ $item->alt_img }}" title="{{ $item->title_img }}">
                            </div>
                        </td>
                        <td>{{ $item->quote }}</td>
                        <td>
                            <div>
                                <label class="c-switch c-switch-label c-switch-opposite-primary"
                                       data-toggle="tooltip" data-html="true"
                                       data-original-title="@lang('news::news.action_off_on', ['Id' => $item->id])">
                                    <input class="c-switch-input" type="checkbox" {{ ($item->active == 1 ? 'checked' : '')  }}>
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>

                                <form id="form_show-id_{{ $item->id }}" action="{{ route('admin.page.hidden', ['page' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="{{$item->active}}" name="active" />
                                    <input type="submit" id="sendButton" style="display: none;" />
                                </form>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{ route('admin.page.edit', $item->id) }}" class="btn btn-secondary btn-success"
                                       data-toggle="tooltip" data-html="true"
                                       data-original-title="@lang('news::news.action_edit', ['Id' => $item->id])">
                                   <i class="c-icon c-icon-1xl cil-pen"></i>
                               </a>
                                <button form="form-id_{{ $item->id }}" class="btn btn-secondary btn-danger"
                                        type="submit"
                                        data-toggle="tooltip" data-html="true"
                                        data-original-title="@lang('news::news.action_delete', ['Id' => $item->id])">
                                    <i class="c-icon c-icon-1xl cil-delete"></i>
                                </button>
                                <form id="form-id_{{ $item->id }}" action="{{ route('admin.page.destroy', ['page' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">@lang('news::news.list_error')</td>
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

        $(document).on('change','.c-switch-input',function(){
            let chek = 'off';
            if($(this).is(':checked')){
                chek = 'on';
            }
            $(this).parents('label').next('form').find('input[name="active"]').val(chek);
            $(this).parents('label').next('form').find("#sendButton").click();
        });
    </script>
@endsection
