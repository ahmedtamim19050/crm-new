@extends('layouts.front.app')
@section('content')

<div id="home" class="header-hero bg_cover d-lg-flex align-items-center">

    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
    <div class="shape shape-4"></div>
    <div class="shape shape-5"></div>
    <div class="shape shape-6"></div>

    <div class="container ">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-12 col-md-10" style="margin-top: 250px">
                <div class="header-hero-content">
                    <h3 class="header-title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <span>Get started for free!</span><br> CRM, SoMe and newsletter in ONE Platform</h3>
                    <p class="text wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">Manage your
                        leads, your social media and your newsletters from ONE Platform.</p>
                    <ul class="d-flex">
                        <li><a href="/login" rel="nofollow" class="main-btn wow fadeInLeftBig"
                                data-wow-duration="1.3s" data-wow-delay="0.8s">Get started for
                                free</a><br><b>No credit card required</b></li>
                    </ul>
                </div> <!-- header hero content -->
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6 col-10" style="margin:0 auto">
                <div class="header-image">
                    <img style="height: 40vh" src="{{ asset('frontend-assets/images/frontpic_01052024.png') }}"
                        alt="app" class="image wow fadeInRightBig" data-wow-duration="1.3s"
                        data-wow-delay="0.5s">
                    <div class="image-shape wow fadeInRightBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <img src="{{ asset('frontend-assets/images/image-shape.svg') }}" alt="shape">
                    </div>
                </div> <!-- header image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="header-shape-1"></div> <!-- header shape -->
    <div class="header-shape-2">
        <img src="{{ asset('frontend-assets/images/header-shape-2.svg') }}" alt="shape">
    </div> <!-- header shape -->
</div> <!-- header hero -->
    <!--====== SERVICES PART1 START ======-->

    <section id="why" class="services-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Speed up your convertion rate for your clients and increase customer satisfaction
                        </h3>
                        <p class="text">Our one-in-all solution makes it <b>easy</b> to manage all clients in one platform.
                        </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-1 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that <b>convert</b> them into
                                paying clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-2 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.4s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">SoMe</a></h4>
                            <p class="text">Schedule all social media content and <b>target</b> each post against your
                                leads spesific needs.</p>
								<br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-3 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.6s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Newsletter</a></h4>
                            <p class="text">Target your new leads with the automation tool that <b>integrate</b> directly
                                to mailchimp.</p>
								<br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">AI Bot</a></h4>
                            <p class="text">Use our snippet AI bot in your own website, and get all the <b>data back</b>
                                in to our CRM platform.</p>
								<br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-5 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Project tool</a></h4>
                            <p class="text">Keep track on the client projects and use time tracker for best <b>ROI</B>.
							
                            </p><br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-6 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Contracts</a></h4>
                            <p class="text">Save your ready made <b>contracts</b> to speed up the process with your leads.
							                            </p><br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-7 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Chat & support </a></h4>
                            <p class="text">Interact thru different AI channels and provide best customer
                                <b>experience</b>.
								
                            </p><br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-8 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Analytics</a></h4>
                            <p class="text">Our platform give you all the data you <b>need</b> for follow up your leads.
							
                            </p><br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-8 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Personas</a></h4>
                            <p class="text">Our AI generates a user persona based on product or service. </p><br>Coming soon!</br>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART1 ENDS ======-->
    {{-- Feature Section strat --}}
    <section id="features" class="features-area pt-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Awesome Key Features.</h3>
                        <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis dolor comprehensam at vis.
                            Vel ut percipitur dignissim signiferumque.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="features-items">
                        <div class="single-features features-color-1 d-sm-flex mt-30 wow fadeInUpBig"
                            data-wow-duration="1.3s" data-wow-delay="0.2s"
                            style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.2s; animation-name: fadeInUpBig;">
                            <div class="features-icon d-flex justify-content-center align-items-center">
                                <i class="lni lni-laptop-phone"></i>
                            </div>
                            <div class="features-content media-body">
                                <h4 class="features-title">Fully Responsive</h4>
                                <p class="text">Lorem ipsum dolor sit ametco snsetetur sadipscing elitr sed diam nonumy
                                    eirmod.</p>
                            </div>
                        </div>
                        <div class="single-features features-color-2 d-sm-flex mt-30 wow fadeInUpBig"
                            data-wow-duration="1.3s" data-wow-delay="0.4s"
                            style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.4s; animation-name: fadeInUpBig;">
                            <div class="features-icon d-flex justify-content-center align-items-center">
                                <i class="lni lni-leaf"></i>
                            </div>
                            <div class="features-content media-body">
                                <h4 class="features-title">Refreshing Design</h4>
                                <p class="text">Lorem ipsum dolor sit ametco snsetetur sadipscing elitr sed diam nonumy
                                    eirmod.</p>
                            </div>
                        </div>
                        <div class="single-features features-color-3 d-sm-flex mt-30 wow fadeInUpBig"
                            data-wow-duration="1.3s" data-wow-delay="0.6s"
                            style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.6s; animation-name: fadeInUpBig;">
                            <div class="features-icon d-flex justify-content-center align-items-center">
                                <i class="lni lni-bootstrap"></i>
                            </div>
                            <div class="features-content media-body">
                                <h4 class="features-title">Bootstrap 4</h4>
                                <p class="text">Lorem ipsum dolor sit ametco snsetetur sadipscing elitr sed diam nonumy
                                    eirmod.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="features-image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s"
                        style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.5s; animation-name: fadeInRightBig;">
                        <img class="image" src="{{ asset('frontend-assets/images/features-app.png') }}" alt="App">
                        <div class="features-shape-1"></div>
                        <div class="features-shape-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="599.709" height="549.102"
                                viewBox="0 0 599.709 549.102" class="svg replaced-svg">
                                <path id="Polygon_7" data-name="Polygon 7"
                                    d="M199.061,66.775a61,61,0,0,1,98.266,0L424.9,240.16c29.639,40.281.877,97.152-49.133,97.152H120.617c-50.01,0-78.772-56.871-49.133-97.152Z"
                                    transform="matrix(-0.848, -0.53, 0.53, -0.848, 420.961, 549.102)" fill="#0898e7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Feature section end --}}

    <section id="screenshots" class="screenshots-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-45">
                        <h3 class="title">App Screenshots.</h3>
                        <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis dolor comprehensam at vis.
                            Vel ut percipitur dignissim signiferumque.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="screenshot-slider">
                        <div
                            class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper"
                                style="transition-duration: 0ms; transform: translate3d(-1770px, 0px, 0px);">
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0"
                                    style="transition-duration: 0ms; transform: translate3d(280px, 0px, -1050px) rotateX(0deg) rotateY(0deg); z-index: -6;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-1.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1"
                                    style="transition-duration: 0ms; transform: translate3d(240px, 0px, -900px) rotateX(0deg) rotateY(0deg); z-index: -5;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-2.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="2"
                                    style="transition-duration: 0ms; transform: translate3d(200px, 0px, -750px) rotateX(0deg) rotateY(0deg); z-index: -4;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-3.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                    data-swiper-slide-index="3"
                                    style="transition-duration: 0ms; transform: translate3d(160px, 0px, -600px) rotateX(0deg) rotateY(0deg); z-index: -3;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-4.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="0"
                                    style="transition-duration: 0ms; transform: translate3d(120px, 0px, -450px) rotateX(0deg) rotateY(0deg); z-index: -2;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-1.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide" data-swiper-slide-index="1"
                                    style="transition-duration: 0ms; transform: translate3d(80px, 0px, -300px) rotateX(0deg) rotateY(0deg); z-index: -1;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-2.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="2"
                                    style="transition-duration: 0ms; transform: translate3d(40px, 0px, -150px) rotateX(0deg) rotateY(0deg); z-index: 0;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-3.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="3"
                                    style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-4.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-next"
                                    data-swiper-slide-index="0"
                                    style="transition-duration: 0ms; transform: translate3d(-40px, 0px, -150px) rotateX(0deg) rotateY(0deg); z-index: 0;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-1.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1"
                                    style="transition-duration: 0ms; transform: translate3d(-80px, 0px, -300px) rotateX(0deg) rotateY(0deg); z-index: -1;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-2.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev"
                                    data-swiper-slide-index="2"
                                    style="transition-duration: 0ms; transform: translate3d(-120px, 0px, -450px) rotateX(0deg) rotateY(0deg); z-index: -2;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-3.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                    data-swiper-slide-index="3"
                                    style="transition-duration: 0ms; transform: translate3d(-160px, 0px, -600px) rotateX(0deg) rotateY(0deg); z-index: -3;">
                                    <div class="slider-image">
                                        <img src="{{ asset('frontend-assets/images/screenshot-4.jpg') }}"
                                            alt="screenshot">
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet"
                                    tabindex="0" role="button" aria-label="Go to slide 2"></span><span
                                    class="swiper-pagination-bullet" tabindex="0" role="button"
                                    aria-label="Go to slide 3"></span><span
                                    class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                    role="button" aria-label="Go to slide 4"></span></div>
                            <div class="screenshot-frame d-none d-sm-block">
                                <img src="{{ asset('frontend-assets/images/app-frame.png') }}" alt="frame">
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing-area pt-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Choose a Plan.</h3>
                        <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis dolor comprehensam at vis.
                            Vel ut percipitur dignissim signiferumque.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($packages as $package)
                    
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing pricing-active text-center mt-30 wow fadeIn" data-wow-duration="1.3s"
                        data-wow-delay="0.5s"
                        style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.5s; animation-name: fadeIn;">
                        <div class="pricing-shape">
                            <img src="{{asset('frontend-assets/images/price-shape.png')}}" alt="">
                        </div>
                        <div class="pricing-title">
                            <h4 class="title">{{$package->title}}</h4>
                        </div>
                        <div class="pricing-price">
                            <span class="price">{{Settings::price($package->price)}}</span>
                            <p class="text">Monthly</p>
                        </div>
                        <div class="pricing-list">
                            <ul class="list">
                               {!! $package->description !!}
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a class="main-btn" href="{{route('register',['package'=>$package->id])}}">Purchase Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="about-shape"></div>
                        <img class="app" src="{{ asset('frontend-assets/images/about-app.png') }}" alt="app">
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h3 class="title"><span>Get started for free!</span><br> CRM, SoMe and newsletter in ONE
                                Platform</h3>
                            <p class="text">Manage your leads, your social media and your newsletters from ONE Platform.
                            </p>
                        </div> <!-- section title -->
                        <a href="/login" rel="nofollow" class="main-btn">Get started for free!</a>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->


    <!--====== DOWNLOAD PART START ======-->

    <section id="download" class="download-area pt-70 pb-40">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="download-image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <img class="image" src="{{ asset('frontend-assets/images/download-app.png') }}" alt="download">

                        <div class="download-shape-1"></div>
                        <div class="download-shape-2">
                            <img class="svg" src="{{ asset('frontend-assets/images/download-shape.svg') }}"
                                alt="shape">
                        </div>
                    </div> <!-- download image -->
                </div>
                <div class="col-lg-6">
                    <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <h3 class="download-title">What are you waiting for?</h3>
                        <p class="text">Test our free version that are full specked of functions.<br> <b>No setup fee. No
                                credit card required</b>.</p>
                        <ul>
                            <a href="/login" rel="nofollow" class="main-btn">Get started for free!</a>
                        </ul>
                    </div> <!-- download image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== DOWNLOAD PART ENDS ======-->

    <!--====== PART START ======-->
@endsection
