<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pengguna', [PenggunaController::class, 'index'])->middleware(['auth', 'role:admin'])->name('users');
Route::post('/pengguna', [PenggunaController::class, 'tambah'])->middleware(['auth', 'role:admin'])->name('pengguna.users');
Route::get('/pengguna/hapus/{id}', [PenggunaController::class, 'hapus'])->middleware(['auth', 'role:admin'])->name('pengguna.hapus');
Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('pengguna.edit');
Route::post('/pengguna/edit/{id}', [PenggunaController::class, 'prosesedit'])->middleware(['auth', 'role:admin'])->name('pengguna.prosesedit');
Route::get('/pengaduan', [PengaduanController::class, 'index'])->middleware(['auth', 'role:masyarakat'])->name('pengaduan.index');
Route::post('/pengaduan', [PengaduanController::class, 'simpan'])->middleware(['auth', 'role:masyarakat'])->name('pengaduan.simpan');
Route::get('/pengaduan/{id}', [PengaduanController::class, 'detail'])->middleware(['auth', 'role:masyarakat'])->name('pengaduan.detail');

Route::get('/tanggapan', [TanggapanController::class, 'index'])->middleware(['auth', 'role:admin|petugas'])->name('tanggapan.verif');
Route::get('/tanggapan/{id}', [TanggapanController::class, 'detail'])->middleware(['auth', 'role:admin|petugas'])->name('tanggapan.detail');
Route::post('/tanggapan/{id}', [TanggapanController::class, 'simpan'])->middleware(['auth', 'role:admin|petugas'])->name('tanggapan.simpan');
