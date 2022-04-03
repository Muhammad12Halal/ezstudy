@extends('layouts.panel')

@section('style')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Auth::user()->profiles == NULL)
                    <div class="card-body">
                        <h4 class="card-title mb-0">Please Fill Your Profile For Unlocked All Features</h4>
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
                            <form action="{{ route('instructor.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Full Name</label>
                                    <div class="col-8">
                                      <input id="name" name="name" type="text" class="form-control" value="{{ auth()->user()->name }}" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                      <input id="email" name="email" type="email" class="form-control" value="{{ auth()->user()->email }}" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-4 col-form-label">Phone</label>
                                    <div class="col-8">
                                      <input id="phone" name="phone" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-4 col-form-label">Address</label>
                                    <div class="col-8">
                                      <textarea id="address" name="address" type="text" class="form-control" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-4 col-form-label">Image</label>
                                    <div class="col-8">
                                      <input id="image" name="image" type="file" class="form-control-custom" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="facebook" class="col-4 col-form-label">Facebook Link</label>
                                    <div class="col-8">
                                      <input id="facebook" name="facebook" type="url" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twitter" class="col-4 col-form-label">Twitter Link</label>
                                    <div class="col-8">
                                      <input id="twitter" name="twitter" type="url" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="instagram" class="col-4 col-form-label">Instagram Link</label>
                                    <div class="col-8">
                                      <input id="instagram" name="instagram" type="url" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="youtube" class="col-4 col-form-label">Youtube Link</label>
                                    <div class="col-8">
                                      <input id="youtube" name="youtube" type="url" class="form-control">
                                    </div>
                                </div>
                                <var><div class="form-group row">
                                    <label for="about" class="col-4 col-form-label">About</label>
                                    <div class="col-8">
                                      <textarea id="about" name="about" type="text" class="form-control" required="required"></textarea>
                                    </div>
                                </div></var>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('instructor.profile.store') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user()->profiles != NULL)
                    <div class="card-body">
                        <h4 class="card-title mb-0">Dashboard</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
