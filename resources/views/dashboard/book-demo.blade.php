@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Request</h1>
        </div>
        <div class="dash-card">
            <div class="d-flex justify-content-end">
                <a href="{{ route('booking.create') }}" class="btn btn-success mb-4 btn-lg">CREATE</a>
            </div>
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                <tr>
                    <th style="width: 20px">Nr</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th style="width: 150px">Id</th>
                    <th style="width: 200px">Manage</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {!! $user->name !!}
                            </td>
                            <td>
                                {!! $user->email !!}
                            </td>
                            <td>
                                {!! $user->phone !!}
                            </td>

                            <td>
                                {!! $user->_id !!}
                            </td>
                            <td>
                                <a href="{{ route('dashboard.booking.details', $user->id) }}" class="btn btn-success">Manage</a>
                                <form method="POST" action="{{ route('dashboard.booking.destroy', $user->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('.summernote').summernote({
            height: 200,
        });
    </script>
@endpush
