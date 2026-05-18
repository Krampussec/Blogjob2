<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Markedia - Marketing Blog')</title>
    <meta name="keywords" content="@yield('keywords', 'marketing, blog, earn')">
    <meta name="description" content="@yield('description', 'Блог о маркетинге и заработке')">

    <!-- Favicon (если есть в assets/marketing/images/) -->
    <link rel="shortcut icon" href="{{ asset('assets/marketing/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/marketing/images/apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <!-- Bootstrap + FontAwesome + кастомные стили шаблона -->
    <link href="{{ asset('assets/marketing/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/marketing/css/version/marketing.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
<div id="wrapper">
    @include('layouts.navbar')
    @yield('page-title')
    <section class="section lb">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    @include('layouts.footer')
</div>

<script src="{{ asset('assets/marketing/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/marketing/js/animate.js') }}"></script>
<script src="{{ asset('assets/marketing/js/custom.js') }}"></script>
@stack('scripts')
</body>
</html>
