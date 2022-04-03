@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Content Course Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('admin.content.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Instructor Name</th>
                                        <th scope="col">Content Title</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courseContents as $courseContent)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $courseContent->course->title }}</td>
                                            <td>{{ $courseContent->course->user->name }}</td>
                                            <td>{{ $courseContent->title }}</td>
                                            <td>
                                                <a href="{{ route('admin.content.edit', $courseContent->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.content.destroy', $courseContent->id) }}" method="get" class="d-inline">
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
