<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\MatakuliahController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\QuestionController;

use App\Http\Controllers\DashboardController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah/show/{param1}', [MatakuliahController::class, 'show']);

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/show/{param1?}', [MatakuliahController::class, 'show']);

Route::get('/home',[HomeController::class, 'index']);

Route::post('question/store',[QuestionController::class, 'store'])
        ->name('question.store');



