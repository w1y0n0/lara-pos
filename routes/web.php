<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route untuk user belum login (guest)
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('login.proses');
    });
});

// Route untuk user yang sudah login (auth)
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Kategori
    Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::resource('/kategori', KategoriController::class);

    // produk
    Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::resource('/produk', ProdukController::class);
});
