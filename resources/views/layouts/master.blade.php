<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

    <style>
        body {
            background-color: rgb(255, 255, 255) !important;
        }
    </style>


    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/themify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div id="page-container" class="main-content-boxed">
            <main id="main-container">
                @yield('content')
            </main>

            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-left">
                        <a class="font-w600" href="#" target="_blank">courier</a> &copy; <span
                            class="js-year-copy">2021</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>


</body>
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
<script src="{{ asset('js/codebase.app.js') }}"></script>
<script src="{{ asset('js/laravel.app.js') }}"></script>
@yield('script')

</html>
