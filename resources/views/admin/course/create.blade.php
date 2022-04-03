@extends('layouts.panel')

@section('style')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('content')

    <div class="container-fluid">
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
                            <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="user_id">Instructor</label>
                                            <div>
                                              <select id="user_id" name="user_id" class="select2 form-select shadow-none" required>
                                                <option value="">Select</option>
                                                @forelse ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                    <option value="{{ $levels->id }}">{{ $levels->name }}</option>
                                                @empty

                                                @endforelse
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input id="title" name="title" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <br>
                                            <input id="image" name="image" type="file" class="form-control-custom" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="video">Video Promo URL</label>
                                            <input id="video" name="video" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input id="price" name="price" type="text" class="form-control" value="0" required="required" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="duration">Duration</label>
                                            <input id="duration" name="duration" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="description">Status</label>
                                            <select id="status" name="status" class="select2 form-select shadow-none" required="required">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" type="text" class="form-control editor1" required="required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('admin.course.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
