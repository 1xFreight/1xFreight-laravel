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
<section class="terms-page">
    <div class="container">
        <div class="terms-title">
            <h1>Privat Policy</h1>
            <p>Last updated: {{ $lastUpdated ? $lastUpdated->format('F d, Y') : 'N/A' }}</p>
        </div>

        <div class="terms-container">
        @foreach ($items as $item)
                {!! $item->text !!}
            @endforeach
        </div>
    </div>
</section>
@endsection