<!DOCTYPE HTML>
<!--[if IE 7 ]>
<html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>
<html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>
<html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@section('title') Lilishop @show</title>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('author')">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    {{--<link rel="stylesheet" href="{{ asset('vendor/bower_dl/bootstrap/dist/css/bootstrap.min.css') }}">--}}
    <link href="{{ asset('resources/assets/kidslife/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('resources/assets/kidslife/css/shortcodes.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('resources/assets/kidslife/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bower_dl/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('resources/assets/kidslife/css/shortcodes.css') }}" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    @include('index.layout.font')
    <!--jquery-->
    <script src="{{ asset('resources/assets/kidslife/js/modernizr-2.6.2.min.js') }}"></script>
    @yield('head', '')
</head>
<body class="{{ $body_class }}">
<!--wrapper starts-->
<div class="wrapper">
    @include('index.layout.topmenu')
    <!--End top-menu-->
    @include('index.layout.header')
    <!--header ends-->

    <div id="main">
        @yield('content')
    </div>
    <!--main ends-->
    @include('index.layout.footer')
    <!--footer ends-->
</div>
<!--wrapper ends-->
<a href="#" title="Go to Top" class="back-to-top">To Top ↑</a>
<!--Java Scripts-->
<script type="text/javascript" src="{{ asset('vendor/bower_dl/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bower_dl/jquery-migrate/jquery-migrate.min.js') }}"></script>
@yield('footer')
</body>
</html>