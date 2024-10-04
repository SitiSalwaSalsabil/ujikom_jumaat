<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\KategoriController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); // Menampilkan form edit
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Untuk update
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Untuk delete

    // Resource Routes
    Route::resource('informasi', InformasiController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('photo', PhotoController::class);
    Route::resource('kategori', KategoriController::class);
});

require __DIR__.'/auth.php'; 
