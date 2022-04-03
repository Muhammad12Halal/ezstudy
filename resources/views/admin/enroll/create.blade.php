@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Enroll Course Management</h4>
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
                            <form action="{{ route('admin.enroll.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="user_id" class="col-4 col-form-label">Student</label>
                                    <div class="col-8">
                                        <select id="user_id" name="user_id" class="select2 form-select shadow-none" required>
                                        <option value="">Select</option>
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty

                                        @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course_id" class="col-4 col-form-label">Course</label>
                                    <div class="col-8">
                                        <select id="course_id" name="course_id" class="select2 form-select shadow-none" required>
                                        <option value="">Select</option>
                                        @forelse ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @empty

                                        @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-4 col-form-label">Status</label>
                                    <div class="col-8">
                                        <select id="status" name="status" class="select2 form-select shadow-none" required>
                                        <option value="">Select</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Not Completed">Not Completed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('admin.enroll.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
