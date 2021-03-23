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
    @include('mainpage::admin.sidebar.left')
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 420,
                /*airMode: true,*/
                lang: 'ru-RU' // default: 'en-US'
            });
        });
    </script>
    @yield('js')
</body>
</html>
