@extends('layouts.front')

@section('styles')

@endsection

@section('content')

<div class="page-content">
    <!-- Page Heading Box ==== -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('efront/banner3.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">About Us</h1>
                <p class="text-white">Here our Background about EZ Study A++ website</p>
             </div>
        </div>
    </div>
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('e.index') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
    <!-- Page Heading Box END ==== -->
    <!-- Page Content Box ==== -->
    <div class="content-block">
        <!-- Our Story ==== -->
        <div class="section-area bg-gray section-sp1 our-story">
            <div class="container">
                <div class="row align-items-center d-flex">
                    <div class="col-lg-5 col-md-12 heading-bx">
                        <h2 class="m-b10">Background </h2>
                        <h5 class="fw4">EZ Study A++ website platform to be developed all about the educational learning, and information.</h5>
                        <p>The main idea to create this type of website because all students especially science computer students having difficult to find good notes in study a science computer subject.
                        Due to Covid-19 pandemic, this is best solution for junior and senior students share exchanging notes and information such as coding programming.</p>
                    </div>
                    <div class="col-lg-7 col-md-12 heading-bx p-lr">
                        <div class="img-bx">
                            <img src="{{ asset('front/assets/images/about/STUDylight.png') }}" alt="" width="650" height="1300">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Story END ==== -->
        <!-- About Content ==== -->
        <div class="section-area section-sp2 bg-fix ovbl-dark join-bx text-center" style="background-image:url(assets/images/background/edu.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="join-content-bx text-white">
                            <h2>Learn a new skill online on <br/> your time</h2>
                            <h4>Learn online courses everywhere and anytime</h4>
                            <p class="text-white">EZ STUDY A++ is platform for students to get basics on It and development.
                            The main goal of this website is to provide understanding, techniques and learning materials for students to venture and create a website.
                            This website is using waterfall methodology for data collection.
                            In this website will show the subject and basic about IT and development course, open opportunity to become a tutor and more. </p>
                            <a href="{{ route('e.course') }}" class="btn button-md">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Content END ==== -->
        <!-- About Us ==== -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="feature-container">
                            <div class="feature-md text-white m-b20">
                                <img src="{{ asset('front/assets/images/icon/icon1.png') }}" alt=""/>
                            </div>
                            <div class="icon-content">
                                <h5 class="ttr-tilte">Our Philosophy</h5>
                                <p>"The first step in Knowledge is to Listen, then to be quiet and attentive,
                                    then to preserve it, then to put it into practice and then to spread it." - Sufyan ibn Uyaynah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="feature-container">
                            <div class="feature-md text-white m-b20">
                                <a href="#" class="icon-cell"><img src="{{ asset('front/assets/images/icon/icon2.png') }}" alt=""/></a>
                            </div>
                            <div class="icon-content">
                                <h5 class="ttr-tilte">Our Conversation</h5>
                                <p> We will response every questions from students who have problems.
                                    We will try solve every problems as fast as we can after receive your messages.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="feature-container">
                            <div class="feature-md text-white m-b20">
                                <a href="#" class="icon-cell"><img src="{{ asset('front/assets/images/icon/icon3.png') }}" alt=""/></a>
                            </div>
                            <div class="icon-content">
                                <h5 class="ttr-tilte">Key Of Success</h5>
                                <p>When you are learning, the chance to channel your energy out of your body and brain and into something else in a targeted way.
                                    Learning a new skill or subject can help you feel more energetic, purposeful and positive about life in general.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="feature-container">
                            <div class="feature-md text-white m-b20">
                                <a href="#" class="icon-cell"><img src="{{ asset('front/assets/images/icon/icon4.png') }}" alt=""/></a>
                            </div>
                            <div class="icon-content">
                                <h5 class="ttr-tilte">Our Moto of Success</h5>
                                <p>✨Learn Today!!! Success Tomorrow</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us END ==== -->



    </div>
    <!-- Page Content Box END ==== -->
</div>
@endsection

@section('script')

@endsection
