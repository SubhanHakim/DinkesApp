<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .navbar-brand img {
            width: 40px;
            height: auto;
        }

        .nav-link.active {
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .navbar-nav .nav-link {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #047D78 !important;">
        <div class="container">
            <!-- Logo -->
            <a href="{{ route('kadis.dashboard') }}" class="navbar-brand d-flex align-items-center" href="{{ url('kadis/dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
                <H3 class="text-uppercase fs-5 fw-bold text-white">Dinas Kesehatan <br> Kota Tasikmalaya</H3>
            </a>

            <!-- Toggler button for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links and logout button -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-style">
                        <a class="nav-link d-flex flex-column justify-content-center align-items-center {{ Request::is('kadis/dashboard') ? 'active' : '' }} text-white fs-5"
                            href="{{ route('kadis.dashboard') }}" style="padding: 0px !important;">
                            <i class="bi bi-house {{ request()->is('kadis/dashboard') ? 'active' : '' }} text-white"
                                style="font-size: 24px;"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-style">
                        <a class="nav-link d-flex flex-column justify-content-center align-items-center { Request::is('kadis/data-bidang') ? 'active' : '' }} text-white fs-5"
                            href="{{ route('kadis.dataBidang') }}" style="padding: 0px !important;">
                            <i class="bi bi-database {{ request()->is('kadis/data-bidang') ? 'active' : '' }} text-white"
                                style="font-size: 24px;"></i>
                            <span>Data Bidang</span>
                        </a>
                    </li>
                </ul>
                <div class="nav-item dropdown text-white d-flex gap-4 justify-content-center">
                    <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center"
                        style="width: 50px; height: 50px;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <a id="navbarDropdown" class="nav-link fs-1" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-box-arrow-left"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
