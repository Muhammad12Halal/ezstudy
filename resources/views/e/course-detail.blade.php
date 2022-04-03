@extends('layouts.front')

@section('styles')
<style>
    .rating {
      display: inline-block;
      position: relative;
      height: 30px;
      line-height: 30px;
      font-size: 30px;
    }

    .rating label {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      cursor: pointer;
    }

    .rating label:last-child {
      position: static;
    }

    .rating label:nth-child(1) {
      z-index: 5;
    }

    .rating label:nth-child(2) {
      z-index: 4;
    }

    .rating label:nth-child(3) {
      z-index: 3;
    }

    .rating label:nth-child(4) {
      z-index: 2;
    }

    .rating label:nth-child(5) {
      z-index: 1;
    }

    .rating label input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .rating label .icon {
      float: left;
      color: transparent;
    }

    .rating label:last-child .icon {
      color: #000;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
      color: #09f;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
      color: #000;
      text-shadow: 0 0 5px #09f;
    }
    </style>
@endsection

@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('efront/courses.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Courses Details</h1>
                <p class="text-white">Here students course and learning session</p>
             </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('e.index') }}">Home</a></li>
                <li><a href="{{ route('e.course') }}">Courses</a></li>
                <li>Courses Details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row d-flex flex-row-reverse">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="course-detail-bx">
                            <div class="course-price">
                                <del>***</del>
                                <h4 class="price">RM{{ $course->price }}</h4>
                            </div>
                            <div class="course-buy-now text-center">
                                @if (Auth::user() != NULL)
                                    @if (Auth::user()->level == 'User')
                                        @if ($enrolls == 1)
                                            <a href="" class="btn radius-xl text-uppercase">Done Enroll</a>
                                        @endif
                                        @if ($enrolls == 0)
                                            <a href="{{ route('user.enroll.create', Request::segment(2)) }}" class="btn radius-xl text-uppercase">Enroll Now</a>
                                        @endif
                                    @endif
                                    @if (Auth::user()->level != 'User')
                                        <a href="#" class="btn radius-xl text-uppercase">Cannot Enroll</a>
                                    @endif
                                @endif
                                @if (Auth::user() == NULL)
                                    <a href="{{ route('register') }}" class="btn radius-xl text-uppercase">Register for Enroll</a>
                                @endif
                            </div>
                            <div class="teacher-bx">
                                <div class="teacher-info">
                                    <div class="teacher-thumb">
                                        <img src="{{ asset('profile/'.$course->user->profiles->image) }}" alt=""/>
                                    </div>
                                    <div class="teacher-name">
                                        <h5>{{ $course->user->name }}</h5>
                                        <span>{{ $course->user->level }}</span>
                                    </div>
                                </div>
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
                                <div class="price categories">
                                    <span>Categories</span>
                                    <h5 class="text-primary">{{  $course->category->name }}</h5>
                                </div>
                            </div>
                            <div class="course-info-list scroll-page">
                                <ul class="navbar">
                                    <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
                                    <li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Content</a></li>
                                    <li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="courses-post">
                            <div class="ttr-post-media media-effect">
                                <a href="#"><img src="{{ asset('courses/'.$course->image) }}" alt=""></a>
                            </div>
                            <div class="ttr-post-info">
                                <div class="ttr-post-title ">
                                    <h2 class="post-title">{{ $course->title }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="courese-overview" id="overview">
                            <h4>Overview</h4>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <ul class="course-features">
                                        <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">{{ $course->contents->count() }}</span></li>
                                        <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">{{ $course->duration }} Minutes</span></li>
                                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value">{{ $course->level->name }}</span></li>
                                        <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">{{ $course->enrolls->count() }}</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    {!! $course->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="m-b30" id="curriculum">
                            <h4>Content List</h4>
                            <ul class="curriculum-list">
                                @if (auth()->user() != NULL)
                                    @forelse ($course->contents as $data)
                                    <li>
                                        <h5>{{ $loop->iteration }}. {{ $data->title }}</h5>
                                        <ul>
                                            @forelse ($data->lectures as $detail)
                                                <li>
                                                    <div class="curriculum-list-box">
                                                        <span>Lecture {{ $loop->iteration }}: <br> TITLE: {{ $detail->title }} <br> DESC: {{ $detail->desc }}</span>
                                                    </div>
                                                    <span>File Type: {{ Str::upper($detail->content) }}</span>
                                                </li>
                                            @empty

                                            @endforelse
                                        </ul>
                                    </li>
                                    @empty

                                    @endforelse
                                @endif
                                @if (auth()->user() == NULL)
                                    <li>
                                        <h5>Please Login For View Content</h5>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="m-b30" id="curriculum">
                            <h4>Review List</h4>
                            @if (auth()->user() == NULL)
                            <ul class="curriculum-list">
                                @if ($enrolls == NULL)
                                    <li>
                                        <h5>f</h5>
                                    </li>
                                @endif
                                @if ($reviews == 1 && $enrolls == NULL)
                                    <li>
                                        <h5>Please Login For Review</h5>
                                    </li>

                                @endif
                                @if ($reviews == 1 && $enrolls == 1)
                                    <li>
                                        <h5></h5>
                                    </li>
                                @endif

                            </ul>
                            @endif
                            <ul class="curriculum-list">
                                @if (is_array($reviews) || is_object($reviews))
                                    @if (auth()->user() != NULL)
                                        @forelse ($reviews as $data)
                                            @if (auth()->user()->level == 'User')
                                                @if ($enrolls == NULL)
                                                    <li>
                                                        <h5>Please Enroll For View Content</h5>
                                                    </li>
                                                @endif

                                            @endif

                                            @if (auth()->user()->level != 'User')
                                                <h5>Only student can rating this course</h5>
                                            @endif
                                        @empty

                                        @endforelse
                                    @endif
                                @endif

                                @if (auth()->user() != NULL)
                                    @if (auth()->user()->level == 'User')
                                        @if ($reviews == 0 && $enrolls == 1)
                                            <li>
                                                <form action="{{ route('user.rating.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="title">Rating:</label>
                                                                <br>
                                                                <div class="rating">
                                                                    <label>
                                                                    <input type="radio" name="rating" value="1" />
                                                                    <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                    <input type="radio" name="rating" value="2" />
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                    <input type="radio" name="rating" value="3" />
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                    <input type="radio" name="rating" value="4" />
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    </label>
                                                                    <label>
                                                                    <input type="radio" name="rating" value="5" />
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="comment">Comment</label>
                                                                <textarea id="comment" name="comment" type="text" class="form-control editor1" required="required"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                    </div>
                                                </form>
                                            </li>
                                        @endif
                                        @if ($reviews == 1 && $enrolls == 1)
                                            <li>
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif
                                                <li>
                                                    <form action="{{ route('user.rating.update', $myreviews->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="title">Rating:</label>
                                                                    <br>
                                                                    <div class="rating">
                                                                        <label>
                                                                        <input type="radio" name="rating" value="1" />
                                                                        <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                        <input type="radio" name="rating" value="2" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                        <input type="radio" name="rating" value="3" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                        <input type="radio" name="rating" value="4" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                        <input type="radio" name="rating" value="5" />
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        <span class="icon">★</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="Old Review">Old Review: <b>{{ $myreviews->rating }}</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label for="comment">Comment</label>
                                                                    <textarea id="comment" name="comment" type="text" class="form-control editor1" required="required">{{ $myreviews->comment }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <div class="offset-4 col-8">
                                                            <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </li>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                            </ul>
                        </div>
                        <div class="" id="instructor">
                            <h4>Instructor</h4>
                            <div class="instructor-bx">
                                <div class="instructor-author">
                                    <img src="{{ asset('courses/'.$course->image) }}" alt="">
                                </div>
                                <div class="instructor-info">
                                    <h6>{{ $course->user->name }}</h6>
                                    <span>{{ $course->user->level }}</span>
                                    <ul class="list-inline m-tb10">
                                    </ul>
                                    <p class="m-b0">{!! $course->user->profiles->about !!}</p>
                                </div>
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
<script>
    $(':radio').change(function() {
      console.log('New star rating: ' + this.value);
    });
</script>
@endsection
