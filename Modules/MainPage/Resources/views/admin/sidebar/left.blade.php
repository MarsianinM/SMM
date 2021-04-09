<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46">
            <use xlink:href="{{ asset("assets/brand/coreui.svg#full") }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46">
            <use xlink:href="{{ asset("assets/brand/coreui.svg#signet") }}"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.index') }}">
                <svg class="c-sidebar-nav-icon" id="cil-speedometer" viewBox="0 0 512 512">
                    <path fill="var(--ci-primary-color, currentColor)"
                          d="M425.706,142.294A240,240,0,0,0,16,312v88H160V368H48V312c0-114.691,93.309-208,208-208s208,93.309,208,208v56H352v32H496V312A238.432,238.432,0,0,0,425.706,142.294Z"
                          class="ci-primary"></path>
                    <rect width="32" height="32" x="80" y="264" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <rect width="32" height="32" x="240" y="128" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <rect width="32" height="32" x="136" y="168" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <rect width="32" height="32" x="400" y="264" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <path fill="var(--ci-primary-color, currentColor)"
                          d="M297.222,335.1l69.2-144.173-28.85-13.848L268.389,321.214A64.141,64.141,0,1,0,297.222,335.1ZM256,416a32,32,0,1,1,32-32A32.036,32.036,0,0,1,256,416Z"
                          class="ci-primary"></path>
                </svg>
                @lang('mainpage::sidebar.main')
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.page.index') }}">
                <i class="c-icon c-sidebar-nav-icon c-icon-1xl cil-library"></i>
                @lang('mainpage::sidebar.pages')
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.news.index') }}">
                <i class="c-icon c-sidebar-nav-icon c-icon-1xl cil-library"></i>
                @lang('mainpage::sidebar.news_link')
            </a>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('img/icons/free.svg#cil-puzzle') }}"></use>
                </svg> @lang('mainpage::sidebar.project')
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.project.index') }}">
                        <span class="c-sidebar-nav-icon"></span> @lang('mainpage::sidebar.project_list')</a>
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('img/icons/free.svg#cil-puzzle') }}"></use>
                </svg> @lang('mainpage::sidebar.rates')
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.category.index') }}">
                        <span class="c-sidebar-nav-icon"></span> @lang('mainpage::sidebar.rates_category_list')</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.category.create') }}">
                        <span class="c-sidebar-nav-icon"></span> @lang('mainpage::sidebar.rates_category_add')</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.rates.index') }}">
                        <span class="c-sidebar-nav-icon"></span> @lang('mainpage::sidebar.rates_list')</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.rates.create') }}">
                        <span class="c-sidebar-nav-icon"></span> @lang('mainpage::sidebar.rates_add')</a>
                </li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('img/icons/free.svg#cil-calculator') }}"></use>
                </svg>
                Пользователи
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.settings.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('img/icons/free.svg#cil-pencil') }}"></use>
                </svg>
                Настройки
            </a>
        </li>
    </ul>
</div>
