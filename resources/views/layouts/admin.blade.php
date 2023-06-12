<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Project D")</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>
<body class="sb-nav-fixed bg-dark text-bg-dark">
    <div id="app">

        {{-- NAVBAR --}}
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 fw-medium hover-scale" href="{{ url('/') }}">Project
                <span><img src="/img/logo.png" alt="logo" width="25px" height="25px"></span>
                </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 hover-scale fs-5" id="sidebarToggle" href="#!"><i class="fa-solid fa-bars-staggered"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar DropDown-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}<i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end bg-secondary" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>
        {{-- SIDEBAR --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-secondary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Board</div>
                            <a class="nav-link text-white hover-scale" href="{{route("admin.dashboard")}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">File</div>
                            <a class="nav-link collapsed" href="{{ route("admin.projects.index") }}" data-bs-toggle="collapse" data-bs-target="#collapseProjects" aria-expanded="false" aria-controls="collapseProjects">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Progetti
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProjects" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route("admin.projects.index") }}">Tutti i Progetti</a>
                                    <a class="nav-link" href="{{ route("admin.projects.create") }}">Aggiungi Nuovo</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="{{ route("admin.technologies.index") }}" data-bs-toggle="collapse" data-bs-target="#collapseTechnology" aria-expanded="false" aria-controls="collapseTechnology">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                                Tecnologie
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTechnology" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route("admin.technologies.index") }}">Tutte le Tecnologie</a>
                                    <a class="nav-link" href="{{ route("admin.technologies.create") }}">Aggiungi Nuova</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer bg-primary">
                        <div class="small">Logged in as:</div>
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main class="">
                    @yield('content')
                </main>
                @include("partials.footer")
            </div>
        </div>
    </div>
</body>
</html>
