<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Xainia - All in one CRM, SoMe and newsletter system</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->

    <link rel="stylesheet" href="{{ asset('frontend-assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/lineicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.min.css') }}">



</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area" style="margin-bottom: 100px;">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="{{ asset('frontend-assets/images/xainia-logo.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#why">Why</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#screenshots">Screenshots</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        @guest

                                            <a class="page-scroll" href="{{ route('login') }}">Login</a>
                                        @else
                                        <div class="dropdown">
                                            <button class="page-scroll dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"
                                                style="background: none;border:none;font-weight:600">
                                                {{auth()->user()->name}}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">Logout</a>


                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        @endguest
                                     
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->


    </header>

    <!--====== HEADER PART ENDS ======-->
    @yield('content')

    <footer id="footer" class="footer-area">

        <div class="footer-shape shape-1"></div>
        <div class="footer-shape shape-2"></div>
        <div class="footer-shape shape-3"></div>
        <div class="footer-shape shape-4"></div>
        <div class="footer-shape shape-5"></div>
        <div class="footer-shape shape-6"></div>
        <div class="footer-shape shape-7"></div>
        <div class="footer-shape shape-8">
            <img class="svg" src="{{ asset('frontend-assets/images/footer-shape.svg') }}" alt="Shape">
        </div>

        <div class="footer-widget pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <a class="logo" href="#">
                                <img src="{{ asset('frontend-assets/images/xainia-logo.png') }}" alt="Logo">
                            </a>
                            <p class="text">Xainia is made for helping you, increase your customer satisfaction. With
                                the all-in-one platform you and your customers are more productive.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin"></i></a></li>
                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                                <li><a href="#"><i class="lni lni-whatsapp"></i></a></li>
                                <li><a href="#"><i class="lni lni-tiktok"></i></a></li>
                                <li><a href="#"><i class="lni lni-youtube"></i></a></li>

                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link d-flex flex-wrap">
                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s"
                                data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Links</h4>
                                </div>
                                <ul class="link">
                                    <li><a class="" href="#">Home</a></li>
                                    <li><a class="" href="#">Features</a></li>
                                    <li><a class="" href="#">Testimonial</a></li>
                                    <li><a class="" href="#">Pricing</a></li>
                                    <li><a class="" href="#">Contact</a></li>
                                </ul>
                            </div> <!-- footer link wrapper -->

                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s"
                                data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Support</h4>
                                </div>
                                <ul class="link">
                                    <li><a class="" href="#">FAQ</a></li>
                                    <li><a class="" href="#">Privacy Policy</a></li>
                                    <li><a class="" href="#">Terms Of Use</a></li>
                                    <li><a class="" href="#">Legal</a></li>
                                    <li><a class="" href="#">Site Map</a></li>
                                </ul>
                            </div> <!-- footer link wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Quick Link</h4>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-phone"></i> +809272561823</p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-envelope"></i>
                                                    info@appland.com</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-world"></i>
                                                    www.yourweb.com</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-map"></i> 123 Stree New York City ,
                                                United States Of America 750.</p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                            </ul> <!-- contact list -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->

        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-text text-center">
                                <p class="text"> <a rel="nofollow" href=""></a></p>
                            </div> <!-- copyright text -->

                            <div class="copyright-privacy text-center">
                                <a href="#"></a>
                            </div> <!-- copyright privacy -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->





    <!--====== Jquery js ======-->

    <script src="{{ asset('frontend-assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/main.js') }}"></script>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>


    <script src="{{ asset('frontend-assets/js/slick.min.js') }}"></script>

    <script src="{{ asset('frontend-assets/js/jquery.magnific-popup.min.js') }}"></script>


    <script src="{{ asset('frontend-assets/js/swiper.min.js') }}"></script>



    <script src="{{ asset('vendor/toastr/js/toastr.min.js') }}"></script>
    @if (session()->has('success'))
        <x-alert.success />
    @endif

    @if (session()->has('errors'))
        @foreach (session('errors')->all() as $item)
            <x-alert.error :error="$item" />
        @endforeach
    @endif

    <script>
        (function() {
            var js =
                "window['__CF$cv$params']={r:'8354f7043fc54ea6',t:'MTcwMjU0MTM2OS44NzcwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/b/scripts/jsd/56d3063b/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"8354f7043fc54ea6","version":"2023.10.0","r":1,"token":"9a6015d415bb4773a0bff22543062d3b","b":1}'
        crossorigin="anonymous"></script>



</body>

</html>
