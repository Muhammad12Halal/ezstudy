@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Content Course Management</h4>
                        <div class="mt-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('instructor.content.update', [Request::segment(3),$courseContent->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                  <label for="title" class="col-4 col-form-label">Title</label>
                                  <div class="col-8">
                                    <input id="title" name="title" type="text" class="form-control" value="{{ $courseContent->title }}" required="required">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course_id" class="col-4 col-form-label">Course</label>
                                    <div class="col-8">
                                        <input id="course_id" name="course_id" type="text" value="{{ $course->title }}" class="form-control" required="required" readonly>
                                        <input id="course_id" name="course_id" type="hidden" value="{{ $course->id }}" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('instructor.content.index', Request::segment(3)) }}" name="cancel" type="button" class="btn btn-warning">Back</a>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Lecture Course {{ $courseContent->title }} Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('instructor.lecture.create', [Request::segment(3), Request::segment(5)]) }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Lecture Name</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lectures as $lecture)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $lecture->title }}</td>
                                            <td>
                                                <a href="{{ route('instructor.lecture.edit', [Request::segment(5), $lecture->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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
