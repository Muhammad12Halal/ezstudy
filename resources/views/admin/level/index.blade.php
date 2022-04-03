@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Level Course Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('admin.level.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($levels as $level)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $level->name }}</td>
                                            <td>{{ $level->slug }}</td>
                                            <td>
                                                <a href="{{ route('admin.level.edit', $level->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.level.destroy', $level->id) }}" method="get" class="d-inline">
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
