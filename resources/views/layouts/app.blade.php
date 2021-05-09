<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Track Your Shipment Here" />
    <meta name="keywords" content="transportation, logistics, cargo, business">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color-default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/retina.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>

<body>
    {{--    <div id="app">--}}

    <main>
        @yield('content')
    </main>
    {{--    </div>--}}
    @yield('scripts')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script><!-- jQuery library -->
    <script src="{{asset('plugins/jquery/jquery-migrate.min.js')}}"></script><!-- jQuery library -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.srcipts.min.js')}}"></script>
    <script src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/include.js')}}"></script>
    <script src="{{asset('js/jquery.dlmenu.min.js')}}"></script>
    <script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
    <script src="{{asset('plugins/masterslider/js/masterslider.min.js')}}"></script>
</body>

</html>
