
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>

    <!-- Navbar untuk tampilan mobile -->
    <nav class="navbar navbar-dark navbar-theme-primary px-4 d-lg-none">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Data Pelanggan
        </a>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu"
        class="sidebar d-lg-block bg-gray-800 text-white collapse"
        data-simplebar>

        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('pelanggan.index') }}" class="nav-link">
                        <span class="sidebar-text">Pelanggan</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="content">

        <!-- Navbar atas -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid">

                <div class="d-flex justify-content-between align-items-center w-100">

                    <h2 class="h5 mb-0 text-dark">
                        Dashboard Pelanggan
                    </h2>

                    <!-- Hanya satu tombol Tambah Pelanggan -->
                    <a href="{{ route('pelanggan.create') }}"
                    class="btn btn-success text-white">
                        + Tambah Pelanggan
                    </a>

                </div>
            </div>
        </nav>

        <!-- Isi halaman -->
        <div class="py-4">

            <!-- Judul halaman -->
            <div class="mb-4">
                <h1 class="h4">Data Pelanggan</h1>
                <p class="mb-0">Daftar seluruh data pelanggan.</p>
            </div>

            <!-- Pesan sukses -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Pesan kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Tabel data pelanggan -->
            <div class="card border-0 shadow">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-centered table-hover align-middle mb-0">

                            <thead class="thead-light">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthday</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($dataPelanggan as $item)

                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->birthday }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>

                                        <!-- Tombol Edit -->
                                        <td>
                                            <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                            class="btn btn-info btn-sm text-white">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            Belum ada data pelanggan.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer class="text-center mt-4 mb-3">
            <p class="text-muted">
                © {{ date('Y') }} Data Pelanggan
            </p>
        </footer>

    </main>

    <!-- JavaScript -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>

</body>
</html>
