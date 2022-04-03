@extends('layouts.front')

@section('styles')

@endsection

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('efront/banner3.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Frequently Asked Questions</h1>
                <p class="text-white">Here students can asked anything</p>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('e.index') }}">Home</a></li>
                <li>Faqs</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Your Faq -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="heading-bx left">
                            <h2 class="m-b10 title-head">Asked <span> Questions</span></h2>
                        </div>
                        <p class="m-b10">Here are some common questions that students always asked. Checkout our answer that we provided in this questions section.</p>
                        <div class="ttr-accordion m-b30 faq-bx" id="accordion1">
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title">
                                        <a data-toggle="collapse" href="#faq1" class="collapsed" data-parent="#faq1">
                                        About EZ Study A++</a> </h6>
                                </div>
                                <div id="faq1" class="acod-body collapse">
                                    <div class="acod-content">This website education is develop by Diploma Science Computer student for share lesson and notes about Science Computer student in
                                        Universiti Pendidikan Sultan Idris(UPSI).</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title">
                                        <a data-toggle="collapse" href="#faq2" class="collapsed" data-parent="#faq2">
                                            What courses in this website?</a> </h6>
                                </div>
                                <div id="faq2" class="acod-body collapse">
                                    <div class="acod-content">For now, EZ Study A++ will cover and provide more subjects based on Science Computer course only. For future plan, we will expand our subject based on others Course such as Science and Mathematic course and so on.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title">
                                        <a data-toggle="collapse"  href="#faq3" class="collapsed"  data-parent="#faq3">
                                            Can anyone be a tutor? </a> </h6>
                                </div>
                                <div id="faq3" class="acod-body collapse">
                                    <div class="acod-content">Not every person will be accepted to be a tutor. It is because tutor will provide a notes of the chapter or subject.
                                        Besides that, tutor need to make video lesson for every chapter of the subject. That is reason why not everyone can be a tutor. But, you can submit your application for approval.</div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title">
                                        <a data-toggle="collapse"  href="#faq4" class="collapsed"  data-parent="#faq4">
                                            How students learn the course? </a> </h6>
                                </div>
                                <div id="faq4" class="acod-body collapse">
                                    <div class="acod-content">Student can learn our subject through course page. Student can choose subject that they wants to learn.
                                        Ez Study A++ website provides a video explanation or lesson for every subject. This website also provide link for notes for every chapter at bottom of the page.
                                        Students can view or download notes from there. </div>
                                </div>
                            </div>

                        </div>
                        <p class="m-b10">Students can asked any questions to us by fill the form in the right on the page. We will response to student questions and problems as fast as we can. </p>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                                <div class="feature-container">
                                    <div class="feature-md text-white m-b20">
                                        <a href="#" class="icon-cell"><img src="assets/images/icon/icon1.png" alt=""></a>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="ttr-tilte">Our Philosophy</h5>
                                        <p>"The first step in Knowledge is to Listen, then to be quiet and attentive,
                                            then to preserve it, then to put it into practice and then to spread it." - Sufyan ibn Uyaynah.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                                <div class="feature-container">
                                    <div class="feature-md text-white m-b20">
                                        <a href="#" class="icon-cell"><img src="assets/images/icon/icon2.png" alt=""></a>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="ttr-tilte">Our Conversation</h5>
                                        <p> We will response every questions from students who have problems.
                                            We will try solve every problems as fast as we can after receive your messages.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                                <div class="feature-container">
                                    <div class="feature-md text-white m-b20">
                                        <a href="#" class="icon-cell"><img src="assets/images/icon/icon3.png" alt=""></a>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="ttr-tilte">Key Of Success</h5>
                                        <p>When you are learning, the chance to channel your energy out of your body and brain and into something else in a targeted way.
                                            Learning a new skill or subject can help you feel more energetic, purposeful and positive about life in general.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 m-b30">
                                <div class="feature-container">
                                    <div class="feature-md text-white m-b20">
                                        <a href="#" class="icon-cell"><img src="assets/images/icon/icon4.png" alt=""></a>
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

            </div>
        </div>
        <!-- Your Faq End -->
    </div>
    <!-- contact area END -->
</div>
@endsection

@section('script')

@endsection
