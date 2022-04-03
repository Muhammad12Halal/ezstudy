@extends('layouts.front')

@section('styles')

@endsection

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('efront/event.gif') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Events</h1>
                <p class="text-white">Here you can see upcoming and recent events </p>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('e.index') }}">Home</a></li>
                <li>Events</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Portfolio  -->
        <div class="section-area section-sp1 gallery-bx">
            <div class="container">
                <div class="feature-filters clearfix center m-b40">
                    <ul class="filters" data-toggle="buttons">
                        <li data-filter="" class="btn active">
                            <input type="radio">
                            <a href="#"><span>All</span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix">
                    <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                        @forelse ($events as $event)
                        <li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
                            <div class="event-bx m-b30">
                                <div class="action-box">
                                    <img src="{{ asset('event/'.$event->image) }}" alt="">
                                </div>
                                <div class="info-bx d-flex">
                                    <div>
                                        <div class="event-time">
                                            <div class="event-date">0{{ $loop->iteration }}</div>
                                            <div class="event-month">***</div>
                                        </div>
                                    </div>
                                    <div class="event-info">
                                        <h4 class="event-title"><a href="#">{{ $event->title }}</a></h4>
                                        <ul class="media-post">
                                            <li><a href="#"><i class="fa fa-clock-o"></i> {{ $event->date }} | {{ $event->time }}</a></li>
                                            <li><a href="#"><i class="fa fa-map-marker"></i> {{ $event->location }}</a></li>
                                        </ul>
                                        <p>{{ $event->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
@endsection

@section('script')

@endsection
