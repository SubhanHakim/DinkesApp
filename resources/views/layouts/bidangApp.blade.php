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
        body {
            overflow-x: hidden;
            font-family: 'Inter'
        }
    </style>

    <script>
        function checkRole() {
            var role = document.getElementById("role").value;
            var bidang = document.getElementById("bidang");
            var program = document.getElementById('program')

            if (role === 'kadis') {
                bidang.disabled = true;
                bidang.value = ''; // Clear value if role is kadis
                program.disabled = true;
                program.value = ''
            } else {
                bidang.disabled = false;
                program.disabled = false
            }
        }
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #047D78 !important;">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 40px;">
                </a>

                <!-- Toggler button for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links and logout button -->
                <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-style">
                            <a class="nav-link d-flex flex-column justify-content-center align-items-center {{ request()->is('bidang') ? 'active' : '' }} text-white fs-5"
                                href="{{ url('bidang') }}" style="padding: 0px !important;">
                                <i class="bi bi-house {{ request()->is('/bidang') ? 'active' : '' }} text-white"
                                    style="font-size: 24px;"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-style">
                            <a class="nav-link d-flex flex-column justify-content-center align-items-center {{ request()->is('achievements/bidang') ? 'active' : '' }} text-white fs-5"
                                href="{{ url('achievements/bidang') }}" style="padding: 0px !important;">
                                <i class="bi bi-database {{ request()->is('achievements/bidang') ? 'active' : '' }} text-white"
                                    style="font-size: 24px;"></i>
                                <span>Data Bidang</span>
                            </a>
                        </li>
                    </ul>
                    <div class="nav-item dropdown text-white">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
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



        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
