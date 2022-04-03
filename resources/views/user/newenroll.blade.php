@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Enroll New Course Management</h4>
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
                            <form action="{{ route('user.enroll.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Full Name</label>
                                    <div class="col-8">
                                      <input id="name" name="name" type="text" class="form-control" value="{{ auth()->user()->name }}" required="required" readonly>
                                      <input id="user_id" name="user_id" type="hidden" class="form-control" value="{{ auth()->user()->id }}" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course_id" class="col-4 col-form-label">Course</label>
                                    <div class="col-8">
                                        <input id="name" name="name" type="text" class="form-control" value="{{ $courses->title }}" required="required" readonly>
                                        <input id="course_id" name="course_id" type="hidden" class="form-control" value="{{ $courses->id }}" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="status" value="Not Completed">
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('user.enroll.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
