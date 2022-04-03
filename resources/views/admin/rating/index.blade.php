@extends('layouts.panel')

@section('style')

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Rating Course Management</h4>
                        <div class="mt-3">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <a href="{{ route('admin.rating.create') }}" class="btn btn-primary btn-block mb-4">ADD DATA</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Student Rating</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courses as $course)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $course->title }}</td>
                                            <td>
                                                <ul>
                                                    @forelse ($course->ratings as $rating)
                                                        <li>{{ $rating->user->name }} ({{ $rating->rating }}) </li>
                                                    @empty
                                                        <li>No Rating</li>
                                                    @endforelse
                                                </ul>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                  </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr class="text-center">
                                        <th scope="col">No.</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Student Rating</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($courseRatings as $rating)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $rating->user->name }}</td>
                                            <td>{{ $rating->rating }}</td>
                                            <td>
                                                <a href="{{ route('admin.rating.edit', $rating->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('admin.rating.destroy', $rating->id) }}" method="get" class="d-inline">
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
