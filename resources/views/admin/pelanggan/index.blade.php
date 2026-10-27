
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

                                            <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method("DELETE")

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <svg class="icon icon-xs me-2" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                                                    </svg>
                                                Hapus
                                            </button>
                                        </form>
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
