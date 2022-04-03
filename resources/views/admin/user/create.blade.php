@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">User & Role Management</h4>
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
                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Full Name</label>
                                  <div class="col-8">
                                    <input id="name" name="name" type="text" class="form-control" required="required">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="email" class="col-4 col-form-label">Email</label>
                                  <div class="col-8">
                                    <input id="email" name="email" type="email" class="form-control" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-4 col-form-label">Password</label>
                                    <div class="col-8">
                                        <input id="password" name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="check_password" class="col-4 col-form-label">Confirm Password</label>
                                    <div class="col-8">
                                        <input id="check_password" name="check_password" type="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="level" class="col-4 col-form-label">Level</label>
                                  <div class="col-8">
                                    <select id="level" name="level" class="select2 form-select shadow-none" required="required">
                                      <option value="Admin">Admin</option>
                                      <option value="Instructor">Instructor</option>
                                      <option value="User">User</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="status" class="col-4 col-form-label">Status</label>
                                  <div class="col-8">
                                    <select id="status" name="status" class="select2 form-select shadow-none" required="required">
                                      <option value="Active">Active</option>
                                      <option value="Inactive">Inactive</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('admin.user.index') }}" name="cancel" type="button" class="btn btn-warning">Back</a>
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
