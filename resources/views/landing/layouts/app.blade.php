<!doctype html>
<html lang="en">


<!-- Mirrored from www.indonez.com/html-demo/equity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2024 05:54:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hummatech ">
    <meta name="keywords" content="blockit, uikit3, indonez, handlebars, scss, javascript">
    <meta name="author" content="Indonez">
    <meta name="theme-color" content="#FCB42D">
    <!-- preload assets -->
    <link rel="preload" href="{{ asset('assets_landing/fonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets_landing/fonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('assets_landing/fonts/archivo-v18-latin-regular.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('assets_landing/fonts/archivo-v18-latin-300.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('assets_landing/fonts/archivo-v18-latin-700.woff2') }}" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="{{ asset('assets_landing/css/style.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets_landing/js/vendors/uikit.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets_landing/js/utilities.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('assets_landing/js/config-theme.js') }}" as="script">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets_landing/css/style.css') }}">
    <!-- uikit -->
    <script src="{{ asset('assets_landing/js/vendors/uikit.min.js') }}"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets_landing/img/favicon.ico') }}" type="image/x-icon">
    <!-- touch icon -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets_landing/img/apple-touch-icon.png') }}">
    <title>Homepage</title>
    @yield('style')
</head>

<body>
    <!-- page loader begin -->
    <div class="page-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- page loader end -->
    <!-- header begin -->
    @include('landing.layouts.header')
    <!-- header end -->
    @yield('header')
    <main>
        <!-- slideshow content begin -->
            @yield('content')
        <!-- section content end -->
    </main>
    <!-- footer begin -->
    <footer>
        <div class="uk-section" style="
        color: white;
        background-color: black;">
            <div class="uk-container uk-margin-top">
                <div class="uk-grid">
                    <div class="uk-width-2-3@m">
                        <div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid="">
                            <div>
                                <h5>Instruments</h5>
                                <ul class="uk-list uk-link-text">
                                    <li><a href="#">Stock</a></li>
                                    <li><a href="#">Indexes</a></li>
                                    <li><a href="#">Currencies</a></li>
                                    <li><a href="#">Metals<span
                                                class="uk-label uk-margin-small-left in-label-small">Popular</span></a>
                                    </li>
                                    <li><a href="#">Oil and gas</a></li>
                                    <li><a href="#">Cryptocurrencies<span
                                                class="uk-label uk-margin-small-left in-label-small">Popular</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h5>Analytics</h5>
                                <ul class="uk-list uk-link-text">
                                    <li><a href="#">World Markets</a></li>
                                    <li><a href="#">Trading Central<span
                                                class="uk-label uk-margin-small-left in-label-small">New</span></a>
                                    </li>
                                    <li><a href="#">Forex charts online</a></li>
                                    <li><a href="#">Market calendar</a></li>
                                    <li><a href="#">Central banks<span
                                                class="uk-label uk-margin-small-left in-label-small">New</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="in-margin-top-60@s">
                                <h5>Education</h5>
                                <ul class="uk-list uk-link-text">
                                    <li><a href="#">Basic course</a></li>
                                    <li><a href="#">Introductory webinar</a></li>
                                    <li><a href="#">About academy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-3@m uk-flex uk-flex-right@m">
                        <!-- social media begin -->
                        <div class="uk-flex uk-flex-column social-media-list">
                            <div><a href="https://www.facebook.com/indonez"
                                    class="color-facebook text-decoration-none"><i class="fab fa-facebook-square"></i>
                                    Facebook</a></div>
                            <div><a href="https://twitter.com/indonez_tw"
                                    class="color-twitter text-decoration-none"><i class="fab fa-twitter"></i>
                                    Twitter</a></div>
                            <div><a href="https://www.instagram.com/indonez_ig"
                                    class="color-instagram text-decoration-none"><i class="fab fa-instagram"></i>
                                    Instagram</a></div>
                            <div><a href="#some-link" class="color-telegram text-decoration-none"><i
                                        class="fab fa-telegram"></i> Telegram</a></div>
                            <div><a href="#some-link" class="color-youtube text-decoration-none"><i
                                        class="fab fa-youtube"></i> Youtube</a></div>
                        </div>
                        <!-- social media end -->
                    </div>
                </div>
            </div>
            <hr class="uk-margin-large">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-middle">
                    <div class="uk-width-2-3@m uk-text-small">
                        <ul class="uk-subnav uk-subnav-divider uk-visible@s" data-uk-margin="">
                            <li><a href="#">Risk disclosure</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Return policy</a></li>
                            <li><a href="#">Customer Agreement</a></li>
                            <li><a href="#">AML policy</a></li>
                        </ul>
                        <p class="copyright-text">©2021 Equity Markets Incorporated. All Rights Reserved.</p>
                    </div>
                    <div class="uk-width-1-3@m uk-flex uk-flex-right uk-visible@m">
                        <span class="uk-margin-right"><img src="img/in-lazy.gif"
                                data-src="img/in-footer-mastercard.svg" alt="footer-payment" width="34"
                                height="21" data-uk-img=""></span>
                        <span><img src="img/in-lazy.gif" data-src="img/in-footer-visa.svg" alt="footer-payment"
                                width="50" height="16" data-uk-img=""></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <!-- to top begin -->
    <a href="#" class="to-top uk-visible@m" data-uk-scroll>
        Top<i class="fas fa-chevron-up"></i>
    </a>
    <!-- to top end -->
    <!-- javascript -->
    @yield('script')
    <script src="{{ asset('assets_landing/js/vendors/tradingview-widget.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/vendors/particles.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/config-particles.js') }}"></script>
    <script src="{{ asset('assets_landing/js/utilities.min.js') }}"></script>
    <script src="{{ asset('assets_landing/js/config-theme.js') }}"></script>
</body>
<!-- Mirrored from www.indonez.com/html-demo/equity/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2024 05:55:09 GMT -->

</html>
