<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserBiasaController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'proses'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('home');

    //Routing User
    Route::get('admin/user', [UserController::class, 'index'])->name('user');
    Route::get('admin/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('admin/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    //Routing Karyawan
    Route::get('admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    Route::get('admin/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('admin/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('admin/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('admin/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('admin/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

    //Routing Jabatan
    Route::get('admin/jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::get('admin/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('admin/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('admin/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('admin/jabatan/update{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('admin/jabatan/delete{id}', [JabatanController::class, 'destroy'])->name('jabatan.delete');

    //Routing Absensi
    Route::get('admin/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('admin/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('admin/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('admin/absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('admin/absensi/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('admin/absensi/delete/{id}', [AbsensiController::class, 'destroy'])->name('absensi.delete');

    //Routing Gaji
    Route::get('admin/gaji', [GajiController::class, 'index'])->name('gaji');
    Route::post('admin/gaji/setuju/{id}', [GajiController::class, 'setujui'])->name('gaji.setuju');
    Route::post('admin/gaji/tolak/{id}', [GajiController::class, 'tolak'])->name('gaji.tolak');

});

Route::middleware(['auth'])->group(function () {
    Route::get('karyawan', [UserBiasaController::class, 'index'])->name('home.biasa');
    Route::get('karyawan/gaji', [UserBiasaController::class, 'gaji'])->name('karyawan.gaji');
    Route::get('karyawan/gaji/create', [UserBiasaController::class, 'create'])->name('karyawan.gaji.create');
    Route::post('karyawan/gaji/store', [UserBiasaController::class, 'store'])->name('karyawan.gaji.store');
    Route::get('karyawan/gaji/cetak/{id}', [UserBiasaController::class, 'cetak'])->name('karyawan.gaji.cetak');
});
