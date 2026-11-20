<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

Route::get('/', fn () => redirect()->route('pelanggan.index'));
Route::get('/dashboard', fn () => redirect()->route('pelanggan.index'));
Route::view('/user', 'user')->name('user');

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::get('/pelanggan/create', [PelangganController::class, 'create'])
    ->name('pelanggan.create');

Route::post('/pelanggan', [PelangganController::class, 'store'])
    ->name('pelanggan.store');

Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
    ->name('pelanggan.edit');

Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
    ->name('pelanggan.update');

Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])
    ->name('pelanggan.destroy');
