<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>@hasSection('pageTitle') @yield('pageTitle') - @endif 1xfreight</title>
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <meta property="og:type" content="website">
    @yield('custom-meta')
    @stack('styles')
    {{-- Swiper  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- General  --}}
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

</head>

<body>
    <div class="menu_overlay"></div>
    <div class="sidebarMenu">
        <div class="menu-content">
            <div class="menu-close">
                <!-- <a href="/" class="menu-logo">
                        <img src="/assets/images/logo/logo-white.png" alt="plt.md">
                    </a> -->
                <div class="close-x">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.818359" y="26.976" width="37" height="2" transform="rotate(-44.7426 0.818359 26.976)" fill="white" />
                        <rect x="2.06934" y="0.833374" width="37" height="2" transform="rotate(45.6 2.06934 0.833374)" fill="white" />
                    </svg>
                </div>
            </div>
            <div class="menu-title">
                <h3>Freight procurement and management, <span>simplified</span></h3>
            </div>
            <div class="hamburger-menu">
                <a href="#">Why choose us</a>
                <a href="#">Features</a>
                <a href="{{route('blog')}}">News</a>
                <a href="#">Contacts</a>
            </div>
            <div class="hamburger-buttons">
{{--                <a href="#" onclick="console.log('Redirecting...'); window.location.href = '${window.location.href}:3000/login;" class="btn signIn-btn">Sign in</a>--}}
                <a href="#" onclick="console.log('Redirecting...'); window.location.href = window.location.protocol + '//' + window.location.hostname + ':3000';" class="btn signIn-btn">Sign in</a>
                {{--                <a href="{{$window?.location?.href?.replace('8000', '3000')}}" class="btn signIn-btn">Sign in</a>--}}
                <a href="{{route('demo')}}" class="btn book-demo-btn">Book a demo</a>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="navigation-box">
                <a href="/" class="logo">
                    <img src="/assets/images/icons/logo.svg" alt="1XFreight">
                </a>

                <nav class="navigation">
                    <a href="{{ request()->is('/') ? '#why-us' : url('/') . '#why-us' }}" class="nav-link">Why choose us</a>
                    <a href="{{ request()->is('/') ? '#features' : url('/') . '#features' }}" class="nav-link">Features</a>
                    <a href="{{route('blog')}}" class="nav-link">News</a>
                    <a href="#" class="nav-link">Contacts</a>
                </nav>
            </div>
            <div class="header-buttons">
                <a href="#" onclick="console.log('Redirecting...'); window.location.href = window.location.protocol + '//' + window.location.hostname + ':3000';"  class="btn signIn-btn">Sign in</a>
                <a href="{{route('demo')}}" class="btn book-demo-btn">Book a demo</a>
                <div class="lines">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <section class="footer-navigation">
            <div class="container">
                <a href="/" class="logo">
                    <img src="/assets/images/icons/logo.svg" alt="1xFreight">
                </a>
                <div class="footer-nav">
                    <a href="#" onclick="console.log('Redirecting...'); window.location.href = window.location.protocol + '//' + window.location.hostname + ':3000';"  target="_blank">Log in</a>
                    <a href="#" target="_blank">Get started for free</a>
                    <a href="#">0-000-000-000</a>
                    <a href="#">hello@1xfreight.com</a>
                </div>
                <div class="footer-socials">
                    <a href="https://www.facebook.com/people/1XFreight/61567352467764/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </a>
                    <a href="#" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <section class="copy">
            <div class="container">
                <p>{{date('Y')}} 1XFreight, INC.</p>

                <div class="copy-links">
                    <a href="{{route('terms')}}">Terms of Service</a>
                    <a href="{{route("policy")}}">Privacy Policy</a>
                </div>
            </div>
        </section>
    </footer>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- General -->
    <script src="/assets/js/app.js"></script>
    @stack('scripts')

    @if(session('success'))
    <script>
        $(document).ready(function() {
            alertify.success('{{session('
                success ')}}');
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        $(document).ready(function() {
            alertify.success('{{session('
                error ')}}');
        });
    </script>
    @endif
</body>

</html>
