<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Product;

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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/login-process', [UserController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/kendaraan', [UserController::class, 'kendaraan'])->middleware('auth')->name('daftarKendaraan');
Route::post('/tambahPesanan', [UserController::class, 'tambahPesanan'])->middleware('auth')->name('pesanKendaraan');

Route::get('/export', [AdminController::class, 'export'])->middleware('auth')->name('exportLaporan');
Route::get('/daftar/sewa', [AdminController::class, 'pesan'])->middleware('auth')->name('daftarPesanan');
Route::post('/approved/{id}', [AdminController::class, 'approved'])->middleware('auth', 'can:approving')->name('approved');
Route::get('/beranda', [AdminController::class, 'dashboard'])->middleware('auth')->name('adminDashboard');
Route::get('/delete-pemesanan/{id}', [AdminController::class, 'destroy'])->middleware('auth', 'can:delete-pemesanan')->name('deletePemesanan');

