@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Lecture Management</h4>
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
                            <form action="{{ route('instructor.lecture.store', Request::segment(4)) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="content_id" class="col-4 col-form-label">Content</label>
                                    <div class="col-8">
                                        <input id="content_id" name="content_id" type="text" value="{{ $content->title }}" class="form-control" required="required" readonly>
                                        <input id="content_id" name="content_id" type="hidden" value="{{ $content->id }}" class="form-control" required="required">
                                        <input id="para_1" name="para_1" type="hidden" value="{{ Request::segment(3) }}" class="form-control" required="required">
                                        <input id="para_2" name="para_2" type="hidden" value="{{ Request::segment(4) }}" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="title" class="col-4 col-form-label">Title</label>
                                  <div class="col-8">
                                    <input id="title" name="title" type="text" class="form-control" required="required">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc" class="col-4 col-form-label">Description</label>
                                    <div class="col-8">
                                      <textarea id="desc" name="desc" type="text" class="form-control" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-4 col-form-label">Type of Link</label>
                                    <div class="col-8">
                                        <select id="content" name="content" class="select2 form-select shadow-none" required>
                                        <option value="">Select</option>
                                        <option value="video">Video</option>
                                        <option value="image">Image</option>
                                        <option value="audio">Audio</option>
                                        <option value="file">File</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-4 col-form-label">Content URL</label>
                                    <div class="col-8">
                                      <input id="file" name="file" type="url" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('instructor.content.edit', [Request::segment(3),Request::segment(4)]) }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
