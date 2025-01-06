<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Control Panel</title>
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/alertify.css">
    {{--  JQUERY UI  --}}
    <link rel="stylesheet" href="/assets/extra-assets/jquery-ui-1.14.0/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/extra-assets/jquery-ui-1.14.0/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/assets/extra-assets/jquery-ui-1.14.0/jquery-ui.theme.min.css">
    @stack('styles')
    <link rel="stylesheet" href="/assets/css/dashboard.css">
<body>
@php if(!isset($page)) $page = null; @endphp
<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-2 fs-6" href="/dashboard">
        <img src="/assets/images/icons/logo.svg" alt="flexmag.md">
    </a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a href="/logout" class="logout-link"><i class="bi bi-door-open"></i>Logout</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-3 col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Main</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link @if($page == 'dashboard') active @endif">
                            <span class="bi bi-columns-gap"></span>
                            Control Panel
                        </a>
                    </li>

                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Resurse</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('dashboard.blog')}}" class="nav-link @if($page == 'blog') active @endif">
                            <span class="bi bi-newspaper"></span>
                            Blog
                        </a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('dashboard.booking')}}" class="nav-link @if($page == 'booking') active @endif">
                            <span class="bi bi-newspaper"></span>
                            Request
                        </a>
                    </li>
                </ul>


                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Info</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{route('dashboard.policy')}}" class="nav-link @if($page == 'policy') active @endif">
                            <span class="bi bi-file"></span>
                            Politica de confedențialitate
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('dashboard.terms')}}" class="nav-link @if($page == 'terms') active @endif">
                            <span class="bi bi-file"></span>
                            Termeni și condiții
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('dashboard.meta')}}" class="nav-link @if($page == 'meta') active @endif">
                            <span class="bi bi-file"></span>
                            Meta Tags
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>




<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/alertify.min.js"></script>
{{-- JQUERY UI --}}
<script src="/assets/extra-assets/jquery-ui-1.14.0/jquery-ui.min.js"></script>
<script src="/assets/js/dashboard.js"></script>

@stack('scripts')

@if(session('success'))
    <script>
        $(document).ready(function(){
            alertify.success('{{session('success')}}');
        });
    </script>
@endif
@if(session('error'))
    <script>
        $(document).ready(function(){
            alertify.error('{{session('error')}}');
        });
    </script>
@endif
</body>
</html>
