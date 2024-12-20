<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\Dashboard\GejalaController;
use App\Http\Controllers\Dashboard\PenyakitController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/penyakit', [HomeController::class, 'penyakit'])->name('penyakit');
Route::get('/penyakit/detail/{penyakit}', [HomeController::class, 'detail'])->name('detail');
Route::get('/gejala', [HomeController::class, 'gejala'])->name('gejala');
Route::get('/tentang', function() {
    return view('tentang');
})->name('tentang');

// Konsultasi Routes
Route::group(['prefix' => 'konsultasi'], function() {
    Route::get('/', [KonsultasiController::class, 'pasienForm'])->name('pasienForm');
    Route::post('/', [KonsultasiController::class, 'storePasien'])->name('storePasien');
    Route::post('/diagnosa', [KonsultasiController::class, 'diagnosa'])->name('diagnosa');
    Route::get('/{pasien_id}/hasil', [KonsultasiController::class, 'hasilDiagnosa'])->name('hasilDiagnosa');
});

// Auth Routes
Auth::routes();

// Routes yang membutuhkan autentikasi
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::resource('/gejala', GejalaController::class);
    Route::resource('/penyakit', PenyakitController::class);
});

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');
