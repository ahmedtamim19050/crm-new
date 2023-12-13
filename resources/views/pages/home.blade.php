@extends('layouts.front.app')
@section('content')
   
    <!--====== SERVICES PART START ======-->
    
    <section id="why" class="services-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Why You Should Choose AppLand</h3>
                        <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis dolor comprehensam at vis. Vel ut percipitur dignissim signiferumque.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-1 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that convert them into clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-2 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.4s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">SoMe</a></h4>
                            <p class="text">Schedule all social media content and target each post against your leads spesific needs.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-3 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Newsletter</a></h4>
                            <p class="text">Target your new leads with the automation tool.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">AI Bot</a></h4>
                            <p class="text">Our snippet tool make it easy to set up your AI bot in your own website, and get all the data back in to our CRM platform.</p>
                        </div>
                    </div> <!-- single services -->
					<div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-5 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that convert them into clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
				<div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-6 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that convert them into clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
				<div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-7 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that convert them into clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
				<div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-8 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">CRM</a></h4>
                            <p class="text">Controll all your leads what a intuitiv solution that convert them into clients.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->
    
    <section id="about" class="about-area pt-70 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="about-shape"></div>
                        <img class="app" src="{{asset('frontend-assets/images/about-app.png')}}" alt="app">
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h3 class="title">You're Using Free Lite Version</h3>
                            <p class="text">Please, purchase the full version of template get all pages, features, elements, documentation, commercial license and permission to remove footer credit.</p>
                        </div> <!-- section title -->
                        <a href="https://rebrand.ly/appland-ud" rel="nofollow" class="main-btn">Get Full Version</a>
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
                        <img class="image" src="{{asset('frontend-assets/images/download-app.png')}}" alt="download">
                        
                        <div class="download-shape-1"></div>
                        <div class="download-shape-2">
                            <img class="svg" src="{{asset('frontend-assets/images/download-shape.svg')}}" alt="shape">
                        </div>
                    </div> <!-- download image -->
                </div>
                <div class="col-lg-6">
                    <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <h3 class="download-title">Download and Start Using!</h3>
                        <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis doorcomprehen sam at vis. Vel ut dignissim signiferumq Alii nusquam cuduo, vim eusde consulatu percipitur, meis dolor comprehensam at vij. Alii nusquam cu duo, vim eu consulatu percipitur, meis doorcomprehen sam at vis. Vel ut dignissim signiferumq nusquam.</p>
                        <ul>
                            <li><a class="app-store" href="#"><img src="{{asset('frontend-assets/images/app-store.png')}}" alt="store"></a></li>
                            <li><a class="play-store" href="#"><img src="{{asset('frontend-assets/images/play-store.png')}}" alt="store"></a></li>
                        </ul>
                    </div> <!-- download image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== DOWNLOAD PART ENDS ======-->
    
    <!--====== PART START ======-->

@endsection