
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>

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
                    <h2 class="h5 mb-0 text-dark">Dashboard Pelanggan</h2>

                    <a href="{{ route('pelanggan.index') }}"
                    lass="btn btn-outline-gray">
                        Kembali
                    </a>
                </div>
            </div>
        </nav>

        <div class="py-4">

            <!-- Breadcrumb dan judul -->
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Data
                        </li>
                    </ol>
                </nav>

                <h1 class="h4">Edit Pelanggan</h1>
                <p class="mb-0">
                    Perbarui informasi pelanggan melalui formulir berikut.
                </p>
            </div>

            <!-- Pesan kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Data belum berhasil diperbarui.</strong>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form edit pelanggan -->
            <div class="card border-0 shadow">
                <div class="card-body">

                    <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <!-- First Name -->
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">
                                    First Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ old('first_name', $dataPelanggan->first_name) }}"
                                    required
                                >
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">
                                    Last Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ old('last_name', $dataPelanggan->last_name) }}"
                                    required
                                >
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $dataPelanggan->email) }}"
                                    required
                                >
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone', $dataPelanggan->phone) }}"
                                    required
                                >
                            </div>

                            <!-- Birthday -->
                            <div class="col-md-6 mb-3">
                                <label for="birthday" class="form-label">
                                    Birthday
                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    id="birthday"
                                    name="birthday"
                                    value="{{ old('birthday', $dataPelanggan->birthday ? \Illuminate\Support\Carbon::parse($dataPelanggan->birthday)->format('Y-m-d') : '') }}"
                                    required
                                >
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">
                                    Gender
                                </label>

                                <select
                                    class="form-select mb-0"
                                    id="gender"
                                    name="gender"
                                    aria-label="Gender select example"
                                    required
                                >
                                    <option value="">Pilih Gender</option>

                                    <option value="Female"
                                        {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>

                                    <option value="Male"
                                        {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>
                                        Male
                                    </option>
                                </select>
                            </div>

                        </div>

                        <!-- Tombol aksi -->
                        <div class="d-flex justify-content-end mt-3">

                            <a href="{{ route('pelanggan.index') }}"
                            class="btn btn-outline-gray me-2">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-info">
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

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
