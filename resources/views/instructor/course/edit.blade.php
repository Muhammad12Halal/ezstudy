@extends('layouts.panel')

@section('style')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/instructor/course/edit/{{ Request::segment(4) }}">
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
                <a href="/instructor/content/{{ Request::segment(4) }}">
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
                        <h4 class="card-title mb-0">Course Management</h4>
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
                            <form action="{{ route('instructor.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="user_id">Instructor</label>
                                            <div>
                                                <select id="user_id" name="user_id" class="select2 form-select shadow-none" required>
                                                <option value="">Select</option>
                                                @forelse ($users as $user)
                                                    <option value="{{ $user->id }}" {{ $course->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                @empty

                                                @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <div>
                                                <select id="category_id" name="category_id" class="select2 form-select shadow-none" required>
                                                <option value="">Select</option>
                                                @forelse ($categorys as $category)
                                                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @empty

                                                @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="level_id">Level</label>
                                            <div>
                                                <select id="level_id" name="level_id" class="select2 form-select shadow-none" required>
                                                <option value="">Select</option>
                                                @forelse ($levels as $levels)
                                                    <option value="{{ $levels->id }}" {{ $course->level_id == $levels->id ? 'selected' : '' }}>{{ $levels->name }}</option>
                                                @empty

                                                @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input id="title" name="title" type="text" value="{{ $course->title }}" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <br>
                                            <img src="{{ asset('courses/'.$course->image) }}" class="img-fluid" alt="{{ $course->title }}" width="300px" height="300px">
                                            <br>
                                            <input id="image" name="image" type="file" class="form-control-custom">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="video">Video Promo URL</label>
                                            <input id="video" name="video" type="text" value="{{ $course->video }}" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input id="price" name="price" type="text" value="{{ $course->price }}" class="form-control"  required="required" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="duration">Duration</label>
                                            <input id="duration" name="duration" type="text" value="{{ $course->duration }}" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="description">Status</label>
                                            <select id="status" name="status" class="select2 form-select shadow-none" required="required">
                                                <option value="Active" {{ $course->status == 'Active' ? 'selected' : '' }} >Active</option>
                                                <option value="Inactive" {{ $course->status == 'Inactive' ? 'selected' : '' }} >Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" type="text" class="form-control editor1" required="required">{!! $course->description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('instructor.course.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
<script>
    CKEDITOR.replace('description');
</script>
@endsection
