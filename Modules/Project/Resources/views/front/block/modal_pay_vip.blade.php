<div id="project_bay_vip-form" class="modal">
    <div class="modal__title">
        <h4>@lang('project::project.title_modal_project_bay_vip')</h4>
    </div>
    <div class="main__select__item">
        <p>@lang('project::project.vip_modal_text')</p>
        <h3>@lang('project::project.vip_modal_plus')</h3>
        <p>@lang('project::project.vip_modal_plus_text')</p>
        <h3>@lang('project::project.text_title_activate')</h3>
        <p>@lang('project::project.text_project_activate',['PROJECT' => $activeProject])</p>
        <br/>
        <p>@lang('project::project.text_project_vip_activate',['VIP' => $activeVipProject])</p>
    </div>
    <form action="{{ route('client.projects.count_bay') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="" />
        @if($project_tariffs)
            <div class="main__select__item">
                <p>@lang('project::all_users.enter_subject')
                    @error('subject_id')
                    <span class="red__validate">{{ $message }}</span>
                    @enderror
                </p>
                <select class="custom-select1 sources validate__input js-example-basic-single @error('subject_id') is-invalid validate__input @enderror"
                        name="subject_id">
                    <option value="0">--</option>
                    @foreach($project_tariffs as $tarif)
                        <option @if($tarif->id == old('subject_id')) selected @endif value="{{ $tarif->id }}">{{ $tarif->days }} - Дней ({{ $tarif->amount }})</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('project::project.submit_bay') ›</button>
        </div>
    </form>
</div>
