<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PasienApiController;
use App\Http\Controllers\RekamMedisController; // Tambahkan ini

Route::get('/home', function () {
    return view('home'); // Mengarahkan ke tampilan home Anda
})->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome'); // Mengarahkan ke tampilan home Anda
});

Route::get('login', [AuthController::class, 'showLoginForm']);
Route::post('login/store', [AuthController::class, 'login'])->name('login');

Route::get('pasien', [PasienController::class, 'index']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pasien/add', function () {
    return view('/pasien/create'); // Mengarahkan ke tampilan home Anda
});

Route::post('pasien/add/store', [PasienController::class, 'store']);
Route::get('pasien/edit/{id}', [PasienController::class, 'edit']);
Route::post('pasien/edit/{id}/store', [PasienController::class, 'update']);
Route::delete('pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');

// Resource route untuk Rekam Medis
Route::resource('rekam_medis', RekamMedisController::class); // Pastikan controller di-import
Route::get('/rekam-medis/{id}/edit', [RekamMedisController::class, 'edit'])->name('rekammedis.edit');
Route::put('/rekam-medis/{id}', [RekamMedisController::class, 'update'])->name('rekammedis.update');
Route::delete('/rekam-medis/{id}', [RekamMedisController::class, 'destroy'])->name('rekammedis.destroy');
Route::get('rekam_medis/{id}', [RekamMedisController::class, 'show'])->name('rekam_medis.show');

Route::get('api/pasien', [PasienApiController::class, 'index']); // Daftar pasien
Route::get('api/pasien/{id}', [PasienApiController::class, 'show']); // Detail pasien beserta rekam medis
