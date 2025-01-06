@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Blog</h1>
        </div>
        <div class="dash-card">
            <div class="d-flex justify-content-end">
                <a href="{{route('dashboard.blog.create')}}" class="btn btn-success mb-4 btn-lg">CREATE</a>
            </div>
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                <tr>
                    <th style="width: 40px"></th>
                    <th scope="col">Title</th>
                    <th style="width: 150px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($blogs))
                    @foreach($blogs as $blog)
                        <tr>
                            <td>
                                @if($blog->image)
                                    <img src="/assets/images/blog/{{$blog->image}}" class="table-img">
                                @else
                                    <img src="/assets/images/default.png" class="table-img">
                                @endif

                            </td>
                            <td>{{$blog->title}}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{route('dashboard.blog.edit', $blog->id)}}" class="btn btn-success">EDIT</a>
                                    <a href="{{route('dashboard.blog.destroy', $blog->id)}}" class="btn btn-danger"
                                       onclick="if(!confirm('Sunteți sigur?')){return false;}">DELETE</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
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
