<div id="edit_projectGroup-form" class="modal">
    <div class="modal__title">
        <h4>@lang('projectgroup::project_group.title_modal_project_group_edit')</h4>
    </div>
    <form action="{{ route('client.project-group-update') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
        <input type="hidden" name="id" value="" />
        <div class="main__select__item">
            <p>@lang('projectgroup::project_group.enter_name')
                @error('name')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <input class="main__input__other @error('name') is-invalid validate__input @enderror"
                   type="text" name="name" value="{{ old('name') }}"
                   placeholder="@lang('projectgroup::project_group.enter_name')">
        </div>
        @if($projectGroup)
            <div class="main__select__item">
                <p>@lang('projectgroup::project_group.enter_project_group')
                    @error('parent_id')
                    <span class="red__validate">{{ $message }}</span>
                    @enderror
                </p>

                <select id="parent_id" class="custom-select1 main__input__other sources validate__input js-example-basic-single
                @error('parent_id') is-invalid validate__input @enderror"
                        name="parent_id">
                    <option value="0">--</option>
                    @include('projectgroup::front.client.block.select_tree',['projectGroup' => $projectGroup, 'delimetr' => ''])
                </select>
            </div>
        @endif
        <div class="main__select__item">
            <p>@lang('projectgroup::project_group.enter_group_show')
                @error('show')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <select id="show" class="custom-select1 main__input__other sources validate__input js-example-basic-single
                @error('show') is-invalid validate__input @enderror"
                    name="show">
                <option value="0">@lang('projectgroup::project_group.option_group_show_off')</option>
                <option value="1">@lang('projectgroup::project_group.option_group_show_on')</option>
            </select>
        </div>
        <div class="main__select__item">
            <p>@lang('projectgroup::project_group.enter_group_show_children')
                @error('show_children_group')
                <span class="red__validate">{{ $message }}</span>
                @enderror
            </p>
            <select id="show_children_group" class="custom-select1 main__input__other sources validate__input js-example-basic-single
                @error('show_children_group') is-invalid validate__input @enderror"
                    name="show_children_group">
                <option value="0">@lang('projectgroup::project_group.option_group_show_children_off')</option>
                <option value="1">@lang('projectgroup::project_group.option_group_show_children_on')</option>
            </select>
        </div>

        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('project::project.submit_bay') ???</button>
        </div>
    </form>
</div>
