@extends('layouts.app')
@section('pageTitle', $blog ? $blog->title : 'Default Title')
@section('custom-meta')
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta name="keywords" content="{{ $blog->keywords }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta_description }}">
    <meta property="og:image" content="/assets/images/blog/{{$blog->image}}">
    <meta property="og:site_name" content="{{ $blog->title }}">
    {{-- Twitter --}}
    <meta name="twitter:image" content="{{ url('/assets/images/blog/' . $blog->image) }}">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@plt" />
    <meta property="og:url" content="{{ request()->fullUrl() }}" />
@endsection
@section('content')
<section class="blog-page page">
    <div class="container">
        <div class="section-title">
            <h1>{{$blog->title}}</h1>
        </div>

        <div class="blog-detail-content">
            <div class="blog-detail-image">
                @if($blog->image)
                <img src="/assets/images/blog/{{$blog->image}}" alt="{{$blog->title}}">
                @else
                <img src="/assets/images/default.jpg" alt="plt" loading="lazy" />
                @endif
            </div>

            <div class="blog-detail-text">
                {!! $blog->text !!}
            </div>

            <div class="share">
                <p>Share:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
                    <svg width="21" height="39" viewBox="0 0 21 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5211 39V21.2116H19.4895L20.3849 14.277H13.5211V9.85037C13.5211 7.84329 14.0761 6.47549 16.9575 6.47549L20.6265 6.47398V0.271498C19.992 0.189043 17.814 0 15.279 0C9.98554 0 6.36154 3.23108 6.36154 9.16358V14.277H0.375V21.2116H6.36154V39H13.5211Z" fill="#08B6A7" />
                    </svg>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->fullUrl()) }}&hashtags=blog,news" target="_blank">
                    <svg width="39" height="33" viewBox="0 0 39 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M39 4.40756C37.5497 5.04375 36.0043 5.46544 34.3931 5.67019C36.0506 4.68056 37.3157 3.12544 37.9104 1.251C36.3651 2.17237 34.6588 2.82319 32.8404 3.18638C31.3731 1.62394 29.2817 0.65625 27.0002 0.65625C22.5737 0.65625 19.0101 4.24913 19.0101 8.65369C19.0101 9.28744 19.0637 9.89681 19.1953 10.4769C12.5483 10.1527 6.66656 6.96694 2.71537 2.11388C2.02556 3.31069 1.62094 4.68056 1.62094 6.15525C1.62094 8.92425 3.04688 11.3788 5.17237 12.7999C3.88781 12.7755 2.62762 12.4026 1.56 11.8151C1.56 11.8395 1.56 11.8712 1.56 11.9029C1.56 15.7882 4.33144 19.0155 7.96575 19.7589C7.31494 19.9369 6.60563 20.0222 5.8695 20.0222C5.35763 20.0222 4.84087 19.9929 4.35581 19.8857C5.39175 23.052 8.33138 25.3798 11.8268 25.4554C9.1065 27.5833 5.65256 28.8654 1.91344 28.8654C1.25775 28.8654 0.628875 28.8362 0 28.7557C3.54169 31.0397 7.73906 32.3438 12.2655 32.3438C26.9783 32.3438 35.022 20.1562 35.022 9.59212C35.022 9.23869 35.0098 8.89744 34.9927 8.55863C36.5796 7.4325 37.9129 6.02606 39 4.40756Z" fill="#08B6A7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="blog-page section">
    <div class="container">
        <div class="section-title">
            <h1>Relevant news</h1>
            <p>Get the latest industry updates, news, and insights to keep you informed and ahead</p>
        </div>

        <div class="swiper swiperBlog">
            <div class="swiper-wrapper">
                @if ($blogs)
                @foreach ($blogs as $blog)
                <a href="{{route('blog.show', $blog->link)}}" class="swiper-slide review blog-box">
                    <h3>{{ $blog->title }}</h3>

                    <div class="blog-image">
                        @if($blog->image)
                        <img src="/assets/images/blog/{{$blog->image}}" alt="{{$blog->title}}">
                        @else
                        <img src="/assets/images/default.jpg" alt="plt" loading="lazy" />
                        @endif
                    </div>
                </a>
                @endforeach

                @endif
            </div>

            <div class="pagination"></div>
        </div>
    </div>
</section>

@include('components.advertisment')
@endsection