<div class="container">
    <div class="header-wrapper header-transparent">
        <!-- .header.header-style01 start -->
        <header id="header" class="header-style01">
            <!-- .container start -->
            <div class="container">
                <!-- .main-nav start -->
                <div class="main-nav">
                    <!-- .row start -->
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-default nav-left" role="navigation">

                                <!-- .navbar-header start -->
                                <div class="navbar-header">
                                    <div class="logo">
                                        <a href="/">
                                            <img style="height:42px;" src="logo.png" />
                                        </a>
                                    </div><!-- .logo end -->
                                    <!-- RESPONSIVE MENU -->
                                    <div id="dl-menu" class="dl-menuwrapper">
                                        <button class=" dl-trigger">Open Menu</button>
                                        <ul class="dl-menu">
                                            <li><a href="/">Home</a></li>
                                        </ul><!-- .dl-menu end -->
                                        <div style="margin-top: 10px">
                                            <form action="{{route('track')}}" method="post" name="form" id="form">
                                                @csrf
                                                {{--                                            <input type="hidden" id="Consignment" name="Consignment">--}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <input type="text"
                                                                style="font-size:100%; padding:4px 5px; text-align:center; margin:2px auto;"
                                                                class="form-control" name="number" id="number"
                                                                placeholder="ENTER TRACKING CODE" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="padding:5px 50%;">
                                                            <input type="submit" class="btn btn-info btn-xl col-md-12"
                                                                value="track now">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- #dl-menu end -->

                                </div><!-- .navbar-header start -->

                                <!-- MAIN NAVIGATION -->
                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="/">Home</a></li>
                                        {{--                                    <li><a href="info/contact-us">Contacts Us</a></li>--}}
                                    </ul><!-- .nav.navbar-nav end -->


                                    <!-- #search start -->
                                    <div id="search">
                                        <div>
                                            <form action="{{route('track')}}" method="post" name="form" id="form"
                                                class="form-inline">
                                                {{--                                            <input type="hidden" id="number" name="number">--}}
                                                @csrf
                                                <div class="form-group"
                                                    style="margin:0 auto; width:200px; display:inline;">
                                                    <input type="text"
                                                        style="width:160px; display:inline-block; font-size:100%; padding:4px 5px; text-align:center; margin:2px auto;"
                                                        class="form-control" name="number" id="number"
                                                        placeholder="ENTER TRACKING CODE" maxlength="50">
                                                </div>
                                                <div class="form-group" style="padding-top:5px;">
                                                    <input type="submit" class="btn btn-info btn-xl col-md-12"
                                                        value="track now" role="button" src="../../img/track.png">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- #search end -->

                                </div>
                                <!-- MAIN NAVIGATION END -->
                            </nav><!-- .navbar.navbar-default end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->
                </div><!-- .main-nav end -->
            </div><!-- .container end -->
        </header><!-- .header.header-style01 -->
    </div>
    {{-- <div style="margin-bottom: 50px;"></div> --}}
</div>
