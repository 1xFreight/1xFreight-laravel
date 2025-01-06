@extends('layouts.app')
@section('pageTitle', $meta_tag ? $meta_tag->title : 'Default Title')
@section('custom-meta')
    @if($meta_tag)
        <meta name="description" content="{{ $meta_tag->meta_description }}">
        <meta name="keywords" content="{{ $meta_tag->keywords }}">
        <meta property="og:title" content="{{ $meta_tag->title }}">
        <meta property="og:description" content="{{ $meta_tag->meta_description }}">
        <meta property="og:image" content="/assets/images/metas/{{$meta_tag->image}}">
        <meta property="og:site_name" content="{{ $meta_tag->title }}">
    @endif
@endsection
@section('content')
<section class="blog-page page">
    <div class="container">
        <div class="section-title">
            <h1>Industry updates, news and insights</h1>
            <p>Get the latest industry updates, news, and insights to keep you informed and ahead</p>
        </div>

        <div class="blog-grid">
            @if($blogs)
                @foreach($blogs as $blog)
                    <a href="{{route('blog.show', $blog->link)}}" class="review blog-box">
                        <h3>{{$blog->title}}</h3>

                        <div class="blog-image">
                            @if($blog->image)
                                <img src="/assets/images/blog/{{$blog->image}}" alt="{{$blog->title}}">
                            @else
                                <img src="/assets/images/default.jpg" alt="plt" loading="lazy"/>
                            @endif
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</section>

@include('components.advertisment')
@endsection