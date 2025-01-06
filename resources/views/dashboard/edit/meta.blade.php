@extends('layouts.dashboard')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Meta Tags</h1>
        </div>
        <div class="dash-card">
            <form action="{{route('dashboard.meta.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$meta->id}}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <h6 class="mb-2">Titlu</h6>
                            <input type="text" name="title" value="{{$meta->title}}" class="form-control" required maxlength="254">
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Description</h6>
                            <textarea name="meta_description" class="form-control w-100" rows="10">{{$meta->meta_description}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Keywords</h6>
                            <textarea name="keywords" class="form-control w-100" rows="10">{{$meta->keywords}}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <h6 class="mb-2">Page</h6>
                            <input type="text" name="page" value="{{$meta->page}}" class="form-control" required maxlength="254">
                        </div>


                        <div class="form-group mb-5">
                            <h6 class="mb-2">Imagine</h6>
                            @if($meta->image)
                                <div class="row">
                                    <div class="col-md-3 position-relative">
                                        <img src="/assets/images/metas/{{$meta->image}}" class="w-100">
                                        <a href="{{route('dashboard.meta.destroy.image', $meta->id)}}" class="destroy-resource" onclick="if(!confirm('Sunteți sigur?')){return false;}">
                                            <img src="/assets/images/dismis.png">
                                        </a>
                                    </div>
                                </div>
                            @else
                                <input type="file" name="image" class="form-control" accept="image/png,image/jpeg">
                            @endif
                        </div>
                        <div class="col-md-12 mt-5">
                            <button type="submit" class="btn btn-success w-100">SALVEAZĂ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
