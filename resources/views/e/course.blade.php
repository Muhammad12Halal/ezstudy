@extends('layouts.front')

@section('styles')

@endsection

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner3.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Our Courses</h1>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Our Courses</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        {{-- <div class="widget courses-search-bx placeani">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Search Courses</label>
                                    <input name="dzName" type="text" required class="form-control">
                                </div>
                            </div>
                        </div> --}}
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">All Category</h5>
                            <ul>
                                @forelse ($category as $item)
                                    <li><a href="#">{{ $item->name }}</a></li>
                                @empty
                                    <li class="active"><a href="#">General</a></li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="widget">
                            <a href="#"><img src="assets/images/adv/adv.jpg" alt=""/></a>
                        </div>
                        <div class="widget recent-posts-entry widget-courses">

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="row">
                            @forelse ($courses as $course)
                            <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                                <div class="cours-bx">
                                    <div class="action-box">
                                        <img src="{{ asset('courses/'.$course->image) }}" alt="">
                                        <a href="#" class="btn">Read More</a>
                                    </div>
                                    <div class="info-bx text-center">
                                        <h5><a href="{{ route('e.courseDetail', $course->slug) }}">{{ $course->title }}</a></h5>
                                        <span>{{ $course->category->name }}</span>
                                    </div>
                                    <div class="cours-more-info">
                                        <div class="review">
                                            <span>
                                                @php
                                                    $review = $course->ratings->count();
                                                    echo $review.' '.'Review';
                                                @endphp
                                            </span>
                                            <ul class="cours-star">
                                                @php
                                                    $review = $course->ratings->count();
                                                    $rating = $course->ratings->sum('rating');
                                                    $point = 5;
                                                    $totalpoint = $point * $review;
                                                    if ($rating != 0 && $review != 0) {
                                                        $totalrating =  number_format(($rating / $totalpoint) * 5, 0);

                                                        if ($totalrating == 1) {
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                        }

                                                        if ($totalrating == 2) {
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                        }

                                                        if ($totalrating == 3) {
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                        }

                                                        if ($totalrating == 4) {
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                        }

                                                        if ($totalrating == 5) {
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                            echo '<li class="active"><i class="fa fa-star"></i></li>';
                                                        }

                                                    } else {
                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                        echo '<li><i class="fa fa-star"></i></li>';
                                                    }
                                                @endphp
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <del>***</del>
                                            <h5>RM {{ $course->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                            <div class="col-lg-12 m-b20">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->

</div>
@endsection

@section('script')

@endsection
