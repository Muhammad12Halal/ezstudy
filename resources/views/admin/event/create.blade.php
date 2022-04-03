@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Event Management</h4>
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
                            <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                  <label for="title" class="col-4 col-form-label">Title</label>
                                  <div class="col-8">
                                    <input id="title" name="title" type="text" class="form-control" required="required">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-4 col-form-label">Image</label>
                                    <div class="col-8">
                                      <input id="image" name="image" type="file" class="form-control-custom" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-4 col-form-label">Location</label>
                                    <div class="col-8">
                                      <input id="location" name="location" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-4 col-form-label">Date</label>
                                    <div class="col-8">
                                      <input id="date" name="date" type="date" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time" class="col-4 col-form-label">Time</label>
                                    <div class="col-8">
                                      <input id="time" name="time" type="time" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc" class="col-4 col-form-label">Description</label>
                                    <div class="col-8">
                                      <textarea id="desc" name="desc" type="text" class="form-control" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('admin.event.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
