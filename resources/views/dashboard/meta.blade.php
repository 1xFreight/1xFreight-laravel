@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Meta Tags</h1>
        </div>
        <div class="dash-card">
            <div class="d-flex justify-content-end">
                <a href="{{route('dashboard.meta.create')}}" class="btn btn-success mb-4 btn-lg">CREATE</a>
            </div>
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                <tr>
                    <th style="width: 40px"></th>
                    <th scope="col">Title</th>
                    <th scope="col">Page</th>
                    <th style="width: 150px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($metas))
                    @foreach($metas as $meta)
                        <tr>
                            <td>
                                @if($meta->image)
                                    <img src="/assets/images/metas/{{$meta->image}}" class="table-img">
                                @else
                                    <img src="/assets/images/default.png" class="table-img">
                                @endif
                            </td>
                            <td>{{$meta->title_ro}}</td>
                            <td>{{$meta->page}}</td>

                            <td>
                                <div class="table-actions">
                                    <a href="{{route('dashboard.meta.edit', $meta->id)}}" class="btn btn-success">EDIT</a>
                                    <a href="{{route('dashboard.meta.destroy', $meta->id)}}" class="btn btn-danger"
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
