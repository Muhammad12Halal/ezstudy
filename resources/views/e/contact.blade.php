@extends('layouts.front')

@section('styles')

@endsection

@section('content')

<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('efront/banner3.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Contact Us</h1>
                <p class="text-white">Contact us if you have any problems and inrequire questions</p>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('e.index') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->

    <!-- inner page banner -->
    <div class="page-banner contact-page section-sp2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 m-b30">
                    <div class="text-white contact-info-bx" style="background-color: #185a9d;">
                        <h2 class="m-b10 title-head">Contact <span>Information</span></h2>
                        <p>Here you can contact us for any requirement. Any problems just contact us from social media or fill contact below</p>
                        <div class="widget widget_getintuch">
                            <ul>
                                <li><i class="ti-location-pin"></i>Upsi, 35900 Tanjong Malim, Perak</li>
                                <li><i class="ti-mobile"></i>013-6822109</li>
                                <li><i class="ti-email"></i>e026687@siswa.upsi.edu.my</li>
                            </ul>
                        </div>
                        <h5 class="m-t0 m-b20">Follow Us</h5>
                        <ul class="list-inline contact-social-bx">
                            <li><a href="https://www.facebook.com/Muhd.Halal/" target="_blank" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/muhdhalal14/" target="_blank" class="btn outline radius-xl"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://twitter.com/?lang=en" target="_blank" class="btn outline radius-xl"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form class="contact-bx" action="{{ route('e.contactpost') }}" method="POST">
                    @csrf
                        <div class="heading-bx left">
                            <h2 class="title-head">Get In <span>Touch with Us</span></h2>
                            <p>Fill this form if you have any questions and problems:</p>
                        </div>
                        <div class="row placeani">
                            @if (auth()->user() != null)
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Your Name</label>
                                        <input name="name" id="name" type="text" value="{{ auth()->user()->name }}" required class="form-control valid-character" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Your Email Address</label>
                                        <input name="email" id="email" type="email" value="{{ auth()->user()->email }}" class="form-control" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Type Message</label>
                                        <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button name="submit" id="submit" type="submit" value="Submit" class="btn button-md"> Send Message</button>
                            </div>
                            @endif
                            @if (auth()->user() == null)
                                <div class="col-lg-12">
                                    <h3>Please Login For Contact</h3>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
</div>
<!-- Content END-->

@endsection

@section('script')

@endsection
