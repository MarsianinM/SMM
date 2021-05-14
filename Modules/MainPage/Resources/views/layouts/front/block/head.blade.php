<meta charset="utf-8">
<!-- <base href="/"> -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $websiteSetting->title ?? '' }}</title>
<meta name="description" content="">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Template Basic Images Start -->
<meta property="og:image" content="{{ asset('frontend/path/to/image.jpg') }}">
<link rel="icon" href="{{ asset('frontend/img/favicon/favicon.ico') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/img/favicon/apple-touch-icon-180x180.png') }}">
<!-- Template Basic Images End -->

<!-- Custom Browsers Color Start -->
<meta name="theme-color" content="#000">
<!-- Custom Browsers Color End -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<link href="{{ asset('frontend/css/main.min.css') }}" rel="stylesheet">
@yield('stylesheet')
