<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />

	<!-- DESCRIPTION -->
	<meta name="description" content="" />

	<!-- OG -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

	<!-- PAGE TITLE HERE ============================================= -->
	<title>{{ config('app.name', 'Laravel') }} |  {{ Str::upper(Request::segment(1)) }} </title>

	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/assets.css') }}">

	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/typography.css') }}">

	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/shortcodes/shortcodes.css') }}">

	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/color/color-1.css') }}">

	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendors/revolution/css/layers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendors/revolution/css/settings.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendors/revolution/css/navigation.css') }}">
	<!-- REVOLUTION SLIDER END -->

    @yield('styles')
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
    @if (Request::segment(1) == 'main')
        <header class="header rs-nav header-transparent">
    @else
        <header class="header rs-nav">
    @endif
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
                        <ul>
							<li><a href="{{ route('e.faq') }}"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="mailto:e026687@siswa.upsi.edu.my"><i class="fa fa-envelope-o"></i>e026687@siswa.upsi.edu.my</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							@if (Auth::user() == NULL)
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @if (Auth::user() != NULL)
                                <li class=""><a href="{{ route('home') }}">Dashboard </a>
                                </li>
                            @endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="{{ route('e.index') }}"><img src="{{ asset('efront/STUDylight.png') }}" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="https://www.facebook.com/Muhd.Halal/" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/muhdhalal14/" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://twitter.com/?lang=en" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<!-- Search Button ==== -->
								{{-- <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li> --}}
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.html"><img src="{{ asset('efront/STUDYA++.png') }}" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">
							<li class="{{ Request::segment(1) == 'main' ? 'active' : '' }}"><a href="{{ route('e.index') }}">Home </a>
							</li>
                            <li class="{{ Request::segment(1) == 'course' ? 'active' : '' }}"><a href="{{ route('e.course') }}">Course </a>
							</li>
                            <li class="{{ Request::segment(1) == 'eventDetails' ? 'active' : '' }}"><a href="{{ route('e.event') }}">Event </a>
							</li>
                            <li class="{{ Request::segment(1) == 'faq' ? 'active' : '' }}"><a href="{{ route('e.faq') }}">FAQ </a>
							</li>
                            <li class="{{ Request::segment(1) == 'faq' ? 'active' : '' }}"><a href="{{ route('e.about') }}">About </a>
							</li>
                            <li class="{{ Request::segment(1) == 'contact' ? 'active' : '' }}"><a href="{{ route('e.contact') }}">Contact Us </a>
							</li>
						</ul>
						<div class="nav-social-link">
                            <a href="https://www.facebook.com/Muhd.Halal/" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/muhdhalal14/" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a>
                            <a href="https://twitter.com/?lang=en" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->
    @yield('content')
	<!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="index.html"><img src="assets/images/logo-white.png" alt=""/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="{{ route('e.course') }}" class="btn ">Join Now</a>
						</div>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Information</h5>
									<ul>
										<li><a href="{{ route('e.index') }}">Home</a></li>
										<li><a href="{{ route('e.about') }}">About</a></li>
										<li><a href="{{ route('e.faq') }}">FAQs</a></li>
										<li><a href="{{ route('e.contact') }}">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="{{ route('home') }}">Dashboard</a></li>
										<li><a href="">Blog</a></li>
										<li><a href="{{ route('e.event') }}">Event</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Courses</h5>
									<ul>
										<li><a href="{{ route('e.course') }}">Courses</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a href="">Copyright © 2022 EZ Study A++ by Muhammad Halal - All Rights Reserved.</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
</div>

<!-- External JavaScripts -->
<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('front/assets/vendors/magnific-popup/magnific-popup.js') }}"></script>
<script src="{{ asset('front/assets/vendors/counter/waypoints-min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/counter/counterup.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/imagesloaded/imagesloaded.js') }}"></script>
<script src="{{ asset('front/assets/vendors/masonry/masonry.js') }}"></script>
<script src="{{ asset('front/assets/vendors/masonry/filter.js') }}"></script>
<script src="{{ asset('front/assets/vendors/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('front/assets/js/functions.js') }}"></script>
<script src="{{ asset('front/assets/js/contact.js') }}"></script>
<script src='{{ asset('front/assets/vendors/switcher/switcher.js') }}'></script>
<!-- Revolution JavaScripts Files -->
<script src="{{ asset('front/assets/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"{{ asset('front/assets/vendors/revolution/js/') }}",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},

			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});
</script>
@yield('script')
</body>

</html>
