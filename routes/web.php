<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManajemenBarangController;
use App\Http\Controllers\DaftarBarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('beranda', function () {
    return view('beranda.beranda');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('manajemen_barang', ManajemenBarangController::class);


Route::resource('daftar_barang', DaftarBarangController::class);




require __DIR__.'/auth.php';
