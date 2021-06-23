<div id="edit_authorGroup-form" class="modal">
    <div class="modal__title">
        <h4>@lang('authorgroup::author_group.title_modal_update')</h4>
    </div>
    <form action="{{ route('client.author-group.update') }}" method="POST">
        @csrf
        <input type="hidden" value="" name="id">
        <div class="main__select__item">
            <p>@lang('authorgroup::author_group.enter_name')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <input class="main__input__other @error('name') is-invalid validate__input @enderror"
                   type="text" name="name" value="{{ old('name') }}"
                   placeholder="@lang('authorgroup::author_group.enter_name')">
        </div>

        <div class="main__select__item">
            <p>@lang('authorgroup::author_group.enter_description')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <textarea class="main__input__other @error('name') is-invalid validate__input @enderror"
                      placeholder="@lang('authorgroup::author_group.enter_placeholder_description')"
                      name="description"
            >{{ old('description') }}</textarea>
        </div>
        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('authorgroup::author_group.submit_add') ›</button>
        </div>
    </form>
</div>
