<div id="project_bay_vip-form" class="modal">
    <div class="modal__title">
        <h4>@lang('project::project.title_modal_project_bay_vip')</h4>
    </div>
    <form action="{{ route('client.projects.count_bay') }}" method="POST">
        @csrf
        <input type="hidden" name="project_id" value="" />
        <div class="label__form__modal">
            <div class="main__select__item">
                <p>@lang('project::project.enter_count')</p>
                <input class="main__input__other" name="count" type="text" placeholder="@lang('project::project.enter_count')" value="">
            </div>
        </div>
        <div class="label__form__modal">
            <div class="main__select__item">
                <div class="row">
                    <div class="col-2">
                        <p>@lang('project::project.enter_price')</p>
                    </div>
                    <div class="col-4">
                        <input class="main__input__other" name="price" type="text" value="">
                    </div>
                    <div class="col-4" id="code">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal__btn" style="margin-top: 35px;">
            <button type="submit">@lang('project::project.submit_bay') ›</button>
        </div>
    </form>
</div>
