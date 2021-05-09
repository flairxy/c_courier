<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}} | @yield('title') </title>

    <meta property="og:type" content="website" />
    <meta property="og:title" content=" Courier " />
    <meta property="og:url" content="/" />


    <link rel="preload" href="{{ asset('Shared/assets/fonts/340f9982-e8f7-4fa5-95eb-c8c1f6ecf402.woff2') }}" as="font"
        type="font/woff2" crossorigin />
    <link rel="preload" href="{{ asset('Shared/assets/fonts/abc-custom56e8.ttf?m4a1t6') }}" as="font" type="font/ttf"
        crossorigin />
    <link rel="stylesheet" href="{{ asset('Shared/assets/css/site.minb029.css?7627-40104') }}" />
    <link rel="stylesheet" href="{{ asset('Shared/assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('Shared/assets/images/favicon.png') }}" />

    @stack('styles')





</head>

<body>
    <div class="">


        <header class="header">
            <div class="header__left">


                <a href="/" class="logo"><img
                        src="-/media/assets/worldcourier/english/images/homepage/world_courier_cmykfe40.png?bc=ffffff&amp;h=60&amp;la=en&amp;w=250&amp;hash=6DAEDF7A3341593F40634FDA70C3889ACD86B7D2"
                        class="logo__image" alt=" Courier Logo" width="250" height="60" /></a>
            </div>
            <div class="header__right">


                <nav class="header-navigation">
                    <ul class="header-navigation__items">


                        <li class="header-navigation-link">
                            <div class="header-navigation-link__frame"><a class="header-navigation-link__link"
                                    href="{{ route('track-ur-shipment') }}">Tracking</a></div>
                        </li>

                        @guest
                        <li class="header-navigation-link">
                            <div class="header-navigation-link__frame"><a class="header-navigation-link__link"
                                    href="{{ route('login') }}">Login</a></div>
                        </li>
                        <li class="header-navigation-link">
                            <div class="header-navigation-link__frame"><a class="header-navigation-link__link"
                                    href="{{ route('register') }}">Register</a></div>
                        </li>
                        @else
                        <li class="header-navigation-link">
                            <div class="header-navigation-link__frame"><a class="header-navigation-link__link"
                                    href="{{ route('user.dashboard') }}">Dashboard</a></div>
                        </li>
                        <li class="header-navigation-link">
                            <div class="header-navigation-link__frame">
                                <a class="header-navigation-link__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    <i class="si si-power bky-color"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>
                </nav>

            </div>
            <div class="header__navicon-wrapper">
                <button class="header__navicon pull-right" aria-controls="91f63e63-fb23-46c0-8cf8-4784bdc9286e"
                    aria-expanded="false" aria-label="open menu">
                    <i class="abc abc-bars"></i>
                </button>
            </div>
            <div class="header__bottom" id="91f63e63-fb23-46c0-8cf8-4784bdc9286e" aria-expanded="false" hidden>

                <nav class="small-header-navigation">
                    <div class="container">
                        <ul class="small-header-navigation__items">


                            <li class="small-header-navigation-link">
                                <div class="small-header-navigation-link__frame"><a
                                        class="small-header-navigation-link__link"
                                        href="{{ route('track-ur-shipment') }}">Tracking</a></div>
                            </li>

                            <li class="small-header-navigation-link">
                                <div class="small-header-navigation-link__frame"><a
                                        class="small-header-navigation-link__link" href="{{ route('login') }}">Login</a>
                                </div>
                            </li>
                            <li class="small-header-navigation-link">
                                <div class="small-header-navigation-link__frame"><a
                                        class="small-header-navigation-link__link"
                                        href="{{ route('register') }}">Register</a></div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <nav class="small-top-hat">
                    <div class="small-top-hat__inner">


                        <div class="small-top-hat-languages">
                            <a href="#small-languages" class="small-top-hat-languages__button"
                                aria-controls="small-languages" data-accordion='{
                   "name": "small-top-hat-languages",
                   "linkClass": "small-top-hat-languages__button--expanded",
                   "itemClass": "small-top-hat-languages__list--expanded"
                }'>
                                English
                            </a>
                            {{-- <div id="small-languages" class="small-top-hat-languages__list">
                                <a class="small-top-hat-language" href="pt.html" rel="alternate" hreflang="pt-PT">
                                    Portugu&#234;s
                                </a>
                                <a class="small-top-hat-language" href="es.html" rel="alternate" hreflang="es-ES">
                                    Espa&#241;ol
                                </a>
                                <a class="small-top-hat-language" href="cn.html" rel="alternate" hreflang="zh-CN">
                                    中文
                                </a>
                                <a class="small-top-hat-language" href="kr.html" rel="alternate" hreflang="ko-KR">
                                    한국어
                                </a>
                                <a class="small-top-hat-language" href="jp.html" rel="alternate" hreflang="ja-JP">
                                    日本語
                                </a>
                                <a class="small-top-hat-language" href="fr.html" rel="alternate" hreflang="fr-FR">
                                    Fran&#231;ais
                                </a>
                                <a class="small-top-hat-language" href="ru.html" rel="alternate" hreflang="ru-RU">
                                    Pу́сский
                                </a>
                                <a class="small-top-hat-language" href="de.html" rel="alternate" hreflang="de-DE">
                                    Deutsch
                                </a>
                                <a class="small-top-hat-language" href="index.html" rel="alternate" hreflang="en">
                                    English
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </nav>

            </div>
        </header>


        <main class="content">
            @yield('content')

        </main>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">


                        <div class="copyright">
                            Copyright ©2021 Courier Services. All Rights Reserved.
                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="Shared/assets/js/site.minb029.js?7627-40104"></script>
    <script async defer src="Shared/assets/js/date-input-polyfill.distb029.js?7627-40104"></script>

</body>

<!-- Mirrored from www.worldcourier.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 05:21:28 GMT -->

</html>
