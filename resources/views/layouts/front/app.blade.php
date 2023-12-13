<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Xainia - All in one CRM, SoMe and newsletter system</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('frontend-assets/images/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/lineicons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style.css')}}">
    
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

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="{{asset('frontend-assets/images/xainia-logo.png')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                        <a class="page-scroll" href="#features">?Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#screenshots">?Screenshots</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">?Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        @guest
                                            
                                        <a class="page-scroll" href="{{route('login')}}">Login</a>
                                        @else
                                        <a class="page-scroll" href="{{route('dashboard')}}">Dashboard</a>
                                        @endguest
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center">
            
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
            
            <div class="container">
                <div class="row align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-lg-6 col-md-10">
                        <div class="header-hero-content">
                            <h3 class="header-title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s"><span>Get started for free!</span><br> CRM, SoMe and newsletter in All-in-One Platform</h3>
                            <p class="text wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">Manage your leads, your social media and your newsletters from All-in-One Platform.</p>
                            <ul class="d-flex">
                                <li><a href="/login" rel="nofollow" class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.8s">Get started for free</a></li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-10">
                        <div class="header-image">
                            <img src="{{asset('frontend-assets/images/xainia-hero.png')}}" alt="app" class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                            <div class="image-shape wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                                <img src="{{asset('frontend-assets/images/image-shape.svg')}}" alt="shape">
                            </div>
                        </div> <!-- header image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape-1"></div> <!-- header shape -->
            <div class="header-shape-2">
                <img src="{{asset('frontend-assets/images/header-shape-2.svg')}}" alt="shape">
            </div> <!-- header shape -->
        </div> <!-- header hero -->
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
            <img class="svg" src="{{asset('frontend-assets/images/footer-shape.svg')}}" alt="Shape">
        </div>
        
        <div class="footer-widget pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <a class="logo" href="#" >
                                <img src="{{asset('frontend-assets/images/xainia-logo.png')}}" alt="Logo">
                            </a>
                            <p class="text">Lorem ipsum dolor sit amet consetetur sadipscing elitr, sederfs diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div> 
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link d-flex flex-wrap">
                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
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
                            
                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.6s">
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
                                            <p class="text"><a href="#"><i class="lni lni-envelope"></i> info@appland.com</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-world"></i> www.yourweb.com</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-map"></i> 123 Stree New York City , United States Of America 750.</p>
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
    <script src="{{asset('frontend-assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/scrolling-nav.js')}}"></script>
    <script src="{{asset('frontend-assets/js/main.js')}}"></script>
    
</body>

</html>
