<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ $websiteTitle }} </title>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js" defer></script>

    <link rel="stylesheet" href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
</head>
<body class="c-app">
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
                Главная
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon" id="cil-calculator" viewBox="0 0 512 512">
                    <path fill="var(--ci-primary-color, currentColor)"
                          d="M472,40H40A24.028,24.028,0,0,0,16,64V448a24.028,24.028,0,0,0,24,24H472a24.028,24.028,0,0,0,24-24V64A24.028,24.028,0,0,0,472,40Zm-8,400H48V72H464Z"
                          class="ci-primary"></path>
                    <polygon fill="var(--ci-primary-color, currentColor)"
                             points="152 240 184 240 184 200 224 200 224 168 184 168 184 128 152 128 152 168 112 168 112 200 152 200 152 240"
                             class="ci-primary"></polygon>
                    <polygon fill="var(--ci-primary-color, currentColor)"
                             points="196.284 285.089 168 313.373 139.716 285.089 117.089 307.716 145.373 336 117.089 364.284 139.716 386.911 168 358.627 196.284 386.911 218.911 364.284 190.627 336 218.911 307.716 196.284 285.089"
                             class="ci-primary"></polygon>
                    <rect width="112" height="32" x="288" y="168" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <rect width="112" height="32" x="288" y="288" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                    <rect width="112" height="32" x="288" y="352" fill="var(--ci-primary-color, currentColor)"
                          class="ci-primary"></rect>
                </svg>
                Пользователи
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.settings.index') }}">
                <svg class="c-sidebar-nav-icon" id="cil-pencil" viewBox="0 0 512 512">
                    <path fill="var(--ci-primary-color, currentColor)"
                          d="M29.663,482.25l.087.087a24.847,24.847,0,0,0,17.612,7.342,25.178,25.178,0,0,0,8.1-1.345l142.006-48.172,272.5-272.5A88.832,88.832,0,0,0,344.334,42.039l-272.5,272.5L23.666,456.541A24.844,24.844,0,0,0,29.663,482.25Zm337.3-417.584a56.832,56.832,0,0,1,80.371,80.373L411.5,180.873,331.127,100.5ZM99.744,331.884,308.5,123.127,388.873,203.5,180.116,412.256,58.482,453.518Z"
                          class="ci-primary"></path>
                </svg>
                Настройки
            </a>
        </li>
    </ul>
</div>
<div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
            {{--<svg class="c-icon c-icon-lg">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>
            </svg>--}}
        </button>
        <a class="c-header-brand d-lg-none" href="#">
            <svg width="118" height="46">
                <use xlink:href="{{ asset("assets/brand/coreui.svg#full") }}"></use>
            </svg>
        </a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                data-class="c-sidebar-lg-show" responsive="true">
            {{--<svg class="c-icon c-icon-lg">
                <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-menu"></use>
            </svg>--}}
        </button>
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg class="c-icon mr-2" id="cil-account-logout" viewBox="0 0 512 512">
                            <polygon fill="var(--ci-primary-color, currentColor)"
                                     points="77.155 272.034 351.75 272.034 351.75 272.033 351.75 240.034 351.75 240.033 77.155 240.033 152.208 164.98 152.208 164.98 152.208 164.979 129.58 142.353 15.899 256.033 15.9 256.034 15.899 256.034 129.58 369.715 152.208 347.088 152.208 347.087 152.208 347.087 77.155 272.034"
                                     class="ci-primary"></polygon>
                            <polygon fill="var(--ci-primary-color, currentColor)"
                                     points="160 16 160 48 464 48 464 464 160 464 160 496 496 496 496 16 160 16"
                                     class="ci-primary"></polygon>
                        </svg>
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </header>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="c-footer">
            <div><a href="https://coreui.io">{{ $websiteTitle }}</a> &copy; {{ date('Y') }}.</div>
        </footer>
    </div>
</div>



<script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<!--[if IE]><!-->
<script src="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/js/svgxuse.min.js"></script>
<!--<![endif]-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
