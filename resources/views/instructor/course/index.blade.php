@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Course Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('instructor.course.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>

                            <div class="row el-element-overlay">
                                @forelse ($courses as $course)
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('courses/'.$course->image) }}"
                                                    alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a
                                                                class="btn default btn-outline image-popup-vertical-fit el-link"
                                                                href="{{ asset('courses/'.$course->image) }}"><i
                                                                    class="mdi mdi-magnify-plus"></i></a></li>
                                                        <li class="el-item"><a class="btn default btn-outline el-link"
                                                                href="{{ route('instructor.course.edit', $course->id) }}"><i class="mdi mdi-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="el-card-content">
                                                <h4 class="mb-0">{{ $course->title }}</h4> <span class="text-muted">
                                                    @if ($course->status == 'Active')
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                                @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
