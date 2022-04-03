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
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('admin.enroll.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Student</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($enrolls as $enroll)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $enroll->course->title }}</td>
                                            <td>{{ $enroll->user->name }}</td>
                                            <td>
                                                @if ($enroll->status == 'Completed')
                                                    <span class="badge rounded-pill bg-success">Completed</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Not Completed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.enroll.edit', $enroll->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.enroll.destroy', $enroll->id) }}" method="get" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                  </table>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
