@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/instructor/course/edit/{{ Request::segment(3) }}">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Course</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/instructor/content/{{ Request::segment(3) }}">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Content</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Content Course Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <a href="{{ route('instructor.content.create', Request::segment(3)) }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Content Title</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courseContents as $courseContent)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $courseContent->title }}</td>
                                            <td>
                                                <a href="{{ route('instructor.content.edit', [Request::segment(3), $courseContent->id]) }}" class="btn btn-warning btn-sm">Manage</a>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                  </table>
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
