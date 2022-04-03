@extends('layouts.panel')

@section('style')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Rating Course Management</h4>
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
                            <form action="{{ route('admin.rating.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="user_id">Student</label>
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
                                            <label for="course_id">Course</label>
                                            <div>
                                              <select id="course_id" name="course_id" class="select2 form-select shadow-none" required>
                                                <option value="">Select</option>
                                                @forelse ($courses as $course)
                                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                @empty

                                                @endforelse
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">Rating</label>
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
                                    <a href="{{ route('admin.rating.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
    CKEDITOR.replace('comment');
</script>
<script>
$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
});
</script>
@endsection
