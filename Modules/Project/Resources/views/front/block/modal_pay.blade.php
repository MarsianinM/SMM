<div id="project_bay-form" class="modal">
    <div class="modal__title">
        <h4>@lang('project::project.title_modal_project_bay')</h4>
    </div>

    <form action="{{ route('client.projects.count_bay') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}" />
        <div class="label__form__modal">
            <div class="main__select__item">
                <p>@lang('project::project.enter_count')</p>
                <input class="main__input__other" name="count" type="text" placeholder="@lang('project::project.enter_count')" value="">
            </div>
        </div>
        <div class="label__form__modal">
            <div class="main__select__item">
                <p>@lang('project::project.enter_price')</p>
                <input class="main__input__other" name="price" type="text" value="{{ $project->price }}">
            </div>
        </div>
        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('project::project.submit_bay') ›</button>
        </div>
    </form>
</div>
