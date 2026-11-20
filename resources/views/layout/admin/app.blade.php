<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Data Pelanggan') | LaravelFarid</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 d-lg-none">
        <a class="navbar-brand" href="{{ route('pelanggan.index') }}">LaravelFarid</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <a class="d-flex align-items-center text-white text-decoration-none mb-4" href="{{ route('pelanggan.index') }}">
                <span class="sidebar-text fw-bold">LaravelFarid</span>
            </a>
            <ul class="nav flex-column">
                <li class="nav-item {{ request()->routeIs('user') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user') }}"><span class="sidebar-text">User</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('pelanggan.index', 'pelanggan.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pelanggan.index') }}"><span class="sidebar-text">Pelanggan</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('pelanggan.create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pelanggan.create') }}"><span class="sidebar-text">Tambah Pelanggan</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid">
                <span class="navbar-text text-dark fw-bold">@yield('title', 'Data Pelanggan')</span>
            </div>
        </nav>
        <div class="py-4">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
