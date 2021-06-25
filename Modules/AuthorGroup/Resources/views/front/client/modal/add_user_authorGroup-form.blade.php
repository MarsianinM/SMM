<div id="add_user_authorGroup-form" class="modal">
    <div class="modal__title">
        <h4>@lang('authorgroup::user_author_group.title_modal_add',['NAME'  => $group->name])</h4>
    </div>
    <form action="{{ route('client.author-group.user_store') }}" method="POST">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}" />
        <div class="main__select__item">
            <p>@lang('authorgroup::user_author_group.enter_name')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <input class="main__input__other @error('name') is-invalid validate__input @enderror"
                   type="text" name="name" value="{{ old('name') }}"
                   placeholder="@lang('authorgroup::user_author_group.enter_name')">
        </div>

        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('authorgroup::user_author_group.submit_add') ›</button>
        </div>
    </form>
</div>
