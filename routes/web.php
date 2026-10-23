
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

// Halaman daftar pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

// Halaman tambah pelanggan
Route::get('/pelanggan/create', [PelangganController::class, 'create'])
    ->name('pelanggan.create');

// Proses simpan pelanggan baru
Route::post('/pelanggan', [PelangganController::class, 'store'])
    ->name('pelanggan.store');

// Halaman edit pelanggan
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
    ->name('pelanggan.edit');

// Proses update pelanggan
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
    ->name('pelanggan.update');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Mahasiswa
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// About
Route::get('/about', function () {
    return view('halaman-about');
});

// Mata kuliah
Route::get('/matakuliah/show/{param1}', [MatakuliahController::class, 'show']);
Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/show/{param1?}', [MatakuliahController::class, 'show']);

// Home
Route::get('/home', [HomeController::class, 'index']);

// Question
Route::post('/question/store', [QuestionController::class, 'store'])
    ->name('question.store');
