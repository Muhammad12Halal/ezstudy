@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Event Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('admin.event.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($events as $event)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->desc }}</td>
                                            <td>
                                                <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.event.destroy', $event->id) }}" method="get" class="d-inline">
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
