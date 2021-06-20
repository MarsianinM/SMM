<div id="transfer_project-form" class="modal">
    <div class="modal__title">
        <h4>@lang('projectgroup::project_group.title_modal_transfer_project')</h4>
    </div>
    <form action="{{ route('client.project-group-transfer') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
        <input type="hidden" name="id" value="" />

        @if($projectGroup)
            <div class="main__select__item">
                <p>@lang('projectgroup::project_group.enter_select_group')
                    @error('parent_id')
                    <span class="red__validate">{{ $message }}</span>
                    @enderror
                </p>

                <select id="group_id" class="custom-select1 main__input__other sources validate__input js-example-basic-single
                @error('parent_id') is-invalid validate__input @enderror"
                        name="group_id">
                    <option value="0">--</option>
                    @include('projectgroup::front.client.block.select_tree',['projectGroup' => $projectGroup, 'delimetr' => ''])
                </select>
            </div>
        @endif

        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('project::project.submit_bay') ›</button>
        </div>
    </form>
</div>
