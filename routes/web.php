<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# 🔥 Dashboard → arahkan ke barang.index
Route::redirect('/', '/barang');

# ✅ Barang (CRUD)
Route::resource('barang', BarangController::class);

# ✅ Kategori (CRUD)
Route::resource('kategori', KategoriController::class);

# ✅ Bantuan
Route::view('/bantuan', 'bantuan.index')->name('bantuan');