@extends('layouts.panel')

@section('style')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">User Profile Managemnet</h4>
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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <form action="{{ route('user.profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
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
                                      <input id="phone" name="phone" type="text" class="form-control" value="{{ auth()->user()->profiles->phone }}" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-4 col-form-label">Address</label>
                                    <div class="col-8">
                                      <textarea id="address" name="address" type="text" class="form-control" required="required">{{ auth()->user()->profiles->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-4 col-form-label">Image</label>
                                    <div class="col-8">
                                      <img src="{{ asset('profile/'.auth()->user()->profiles->image) }}" alt="{{ auth()->user()->profiles->image }}" width="300px" height="300px">
                                      <br>
                                      <input id="image" name="image" type="file" class="form-control-custom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="facebook" class="col-4 col-form-label">Facebook Link</label>
                                    <div class="col-8">
                                      <input id="facebook" name="facebook" type="url" value= "{{ auth()->user()->profiles->facebook }}"" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twitter" class="col-4 col-form-label">Twitter Link</label>
                                    <div class="col-8">
                                      <input id="twitter" name="twitter" type="url" value="{{ auth()->user()->profiles->twitter }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="instagram" class="col-4 col-form-label">Instagram Link</label>
                                    <div class="col-8">
                                      <input id="instagram" name="instagram" type="url" value="{{ auth()->user()->profiles->instagram }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="youtube" class="col-4 col-form-label">Youtube Link</label>
                                    <div class="col-8">
                                      <input id="youtube" name="youtube" type="url" value="{{ auth()->user()->profiles->youtube }}" class="form-control">
                                    </div>
                                </div>
                                <var><div class="form-group row">
                                    <label for="about" class="col-4 col-form-label">About</label>
                                    <div class="col-8">
                                      <textarea id="about" name="about" type="text" class="form-control" required="required">{{ auth()->user()->profiles->about }}</textarea>
                                    </div>
                                </div></var>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('user.dashboard.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
