<div id="add_blacklist-form" class="modal">
    <div class="modal__title">
        <h4>@lang('userblacklist::blacklist.title_modal_add_blacklist')</h4>
    </div>
    <form action="{{ route('client.blacklist.store') }}" method="POST">
        @csrf
        <div class="main__select__item">
            <p>@lang('userblacklist::blacklist.enter_name')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <input class="main__input__other @error('name') is-invalid validate__input @enderror"
                   type="text" name="name" value="{{ old('name') }}"
                   placeholder="@lang('userblacklist::blacklist.enter_name')">
        </div>
        @if(!empty($types))
            <div class="main__select__item">
                <p>@lang('userblacklist::blacklist.enter_type')
                    @error('parent_id')
                    <span class="red__validate">{{ $message }}</span>
                    @enderror
                </p>

                <select id="type" class="custom-select1 main__input__other sources validate__input js-example-basic-single
                @error('type') is-invalid validate__input @enderror"
                        name="type">
                @foreach($types as $type)
                    <option value="{{ $type }}" >@lang('userblacklist::blacklist.enter_option_'.$type)</option>
                @endforeach
                </select>
            </div>
        @endif

        <div class="main__select__item">
            <p>@lang('userblacklist::blacklist.enter_comment')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <textarea class="main__input__other @error('name') is-invalid validate__input @enderror"
                      placeholder="@lang('userblacklist::blacklist.enter_comment')"
                      name="description"
            >{{ old('description') }}</textarea>
        </div>
        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('userblacklist::blacklist.submit_add') ›</button>
        </div>
    </form>
</div>
