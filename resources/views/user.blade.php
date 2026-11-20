@extends('layout.admin.app')

@section('title', 'User')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-2">User</h1>
        <p class="text-gray-700 mb-0">Kelola data pelanggan dari menu berikut.</p>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-xl-4 mb-4">
            <a href="{{ route('pelanggan.index') }}" class="card border-0 shadow h-100 text-decoration-none">
                <div class="card-body">
                    <h2 class="h5 text-dark">Data Pelanggan</h2>
                    <p class="text-gray-700 mb-0">Lihat dan kelola daftar pelanggan.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-4 mb-4">
            <a href="{{ route('pelanggan.create') }}" class="card border-0 shadow h-100 text-decoration-none">
                <div class="card-body">
                    <h2 class="h5 text-dark">Tambah Pelanggan</h2>
                    <p class="text-gray-700 mb-0">Tambahkan data pelanggan baru.</p>
                </div>
            </a>
        </div>
    </div>
@endsection
