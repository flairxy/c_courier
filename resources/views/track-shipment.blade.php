<!DOCTYPE html>
<html>

<!-- Mirrored from event-theme.com/themes/GO-Courier/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 06:36:06 GMT -->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Track Your Shipment Here" />
    <meta name="keywords" content="transportation, logistics, cargo, business">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ext/plugins/bootstrap-3.3.6/css/bootstrap.min.css') }}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ext/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}">
    <!-- Fonts Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ext/plugins/font-awesome-4.6.1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ext/plugins/font-elegant/elegant.css') }}">
    <!-- OwlCarousel2 Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ext/plugins/owl.carousel.2/assets/owl.carousel.css') }}">
    @stack('styles')


    <!-- Animate Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ext/css/animate.css') }}">

    <!-- Main Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ext/css/theme.css') }}">

    <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
</head>

<body id="home">
    <!-- Preloader -->
    <div id="preloader">

        <div class="small1">
            <div class="small ball smallball1"></div>
            <div class="small ball smallball2"></div>
            <div class="small ball smallball3"></div>
            <div class="small ball smallball4"></div>
        </div>


        <div class="small2">
            <div class="small ball smallball5"></div>
            <div class="small ball smallball6"></div>
            <div class="small ball smallball7"></div>
            <div class="small ball smallball8"></div>
        </div>

        <div class="bigcon">
            <div class="big ball"></div>
        </div>

    </div>
    <!-- /.Preloader -->


    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Header -->
        <header class="header-main header-style3">

            <div class="top-bar2">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <a class="navbar-logo" href="#"> <img src="assets/img/logo/logo-black.png" alt="logo" />
                            </a>
                        </div>
                        <div class="col-md-10 col-sm-12 fs-12 text-right">
                            <ul class="list-inline">
                                <li>
                                    <h6 class="font2-light"> Office </h6>
                                    <p class="text-muted  font2-title1"> 65 Church Street
                                        Birmingham
                                        West Midlands
                                        B3 2DP </p>
                                </li>

                                <li>
                                    <h6 class="font2-light"> Need a help? </h6>
                                    <p class="text-muted font2-title1"> +44 7451271727</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <nav class="menu-bar font2-title1 white-clr">
                <div class="theme-container container">
                    <div class="row">

                        <div class="col-md-10 col-sm-10 col-xs-12 fs-12">
                            <a class="sticky-logo hidden-sm" href="index.html"> <img alt=""
                                    src="assets/img/logo/logo-white.png" />
                            </a>
                            <div id="navbar" class="collapse navbar-collapse no-pad">
                                <ul class="navbar-nav theme-menu">

                                    <li> <a href="/">Home</a> </li>
                                    <li> <a href="{{ route('track-shipment') }}"> tracking </a> </li>

                                    <li><span class="search fa fa-search white-clr transition"> </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </header>
        <!-- /.Header -->

        <!-- Content Wrapper -->
        <article>
            <!-- Banner -->
            <section class="banner mask-overlay pad-120 white-clr">
                <div class="container theme-container rel-div">
                    <img class="pt-10 effect animated fadeInLeft" alt=""
                        src="{{ asset('ext//img/icons/icon-1.png') }}" />
                    <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50"
                        data-wow-delay=".20s">
                        <li><a href="#">fast</a></li>
                        <li><a href="#">secured</a></li>
                        <li><a href="#">worldwide</a></li>
                    </ul>
                    <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50"
                        data-wow-delay=".20s"> Courier <br> <span class="theme-clr"> courier </span> &
                        <span class="theme-clr"> delivery </span> services </h2>
                </div>
                <div class="pad-50 visible-lg"></div>
            </section>
            <!-- /.Banner -->

            <!-- Track Product -->
            <section>
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 track-prod clrbg-before wow slideInUp" data-wow-offset="50"
                            data-wow-delay=".20s">
                            <h2 class="title-1"> track your product </h2> <span class="font2-light fs-12">Now you can
                                track your product easily</span>
                            <div class="row">
                                <form action="{{route('track')}}" method="post" name="form">
                                    @csrf
                                    <div class="col-md-7 col-sm-7">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter your product ID" required
                                                name="number" class="form-control box-shadow">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <div class="form-group">
                                            <button type="submit" class="btn-1">track your product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.Track Product -->



        </article>
        <!-- /.Content Wrapper -->

        <!-- Footer -->
        <footer>
            <div class="footer-main  white-clr">
                <div class="theme-container container">
                    <div class="row">



                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="theme-container container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p> © Copyright 2020, All rights reserved </p>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <p> Design <span class="theme-clr"></span> by <a href="#" class="main-clr">
                                    Courier</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.Footer -->


    </main>
    <!-- / Main Wrapper -->

    <!-- Top -->
    <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>



    <!-- Main Jquery JS -->
    <script src="{{ asset('ext/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('ext/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Select JS -->
    <script src="{{ asset('ext/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}"
        type="text/javascript">
    </script>
    <!-- OwlCarousel2 Slider JS -->
    <script src="{{ asset('ext/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- Sticky Header -->
    <script src="{{ asset('ext/js/jquery.sticky.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('ext/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>
    <!-- Data binder -->
    <script src="{{ asset('ext/plugins/data.binder.js/data.binder.js') }}" type="text/javascript"></script>

    <!-- Slider JS -->


    <!-- Theme JS -->
    <script src="{{ asset('ext/js/theme.js') }}" type="text/javascript"></script>

</body>

<!-- Mirrored from event-theme.com/themes/GO-Courier/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Oct 2020 06:37:35 GMT -->

</html>
