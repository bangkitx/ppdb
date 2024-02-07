<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiUlangController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [SiswaController::class, 'awal']);

Route::resource('/registrasi', RegistrasiUlangController::class);
Route::resource('/payment', PaymentController::class);

Route::middleware(['auth'])->group(function () {

    Route::get('/bayar', [PaymentController::class, 'bayar'])->name('bayar');
    Route::get('/agen/bin', [AgenController::class, 'bin'])->name('agen.bin');
    Route::post('/agen/bin/{id}', [AgenController::class, 'restore'])->name('agen.restore');
    Route::delete('/agen/bin/{id}', [AgenController::class, 'forceDelete'])->name('agen.forceDelete');
    Route::get('/admin/bin', [AdminController::class, 'bin'])->name('admin.bin');
    Route::post('/admin/bin/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::delete('/admin/bin/{id}', [AdminController::class, 'forceDelete'])->name('admin.forceDelete');

    Route::resource('/agen', AgenController::class);
    Route::resource('/siswa', SiswaController::class)->except(['show', 'edit', 'update']);

    Route::get('/agen/cek', [AgenController::class, 'show']);
    Route::get('/agen/cetak/{id}', [AgenController::class, 'cetak']);
    Route::get('/siswa/cetak/{id}', [SiswaController::class, 'cetak']);
    Route::get('/agen/cetak-kartu/{id}', [AgenController::class, 'cetak_kartu'])->name('siswa.cetak_kartu');
    Route::get('/agen/nilai/{id}', [AgenController::class, 'masukNilai']);
    Route::put('/agen/nilai/update/{id}', [AgenController::class, 'updateNilai']);
    Route::get('/siswa/pengumuman/{id}', [SiswaController::class, 'pengumuman']);
    Route::get('/siswa/registrasi/{id}', [SiswaController::class, 'registrasiUlang']);
    Route::get('/siswa/cetakpokok/{id}', [SiswaController::class, 'cetakpokok']);

    Route::resource('/profile', ProfileController::class);
    Route::resource('/registrasi_ulang', RegistrasiUlangController::class);
});

Route::middleware(['role:Siswa'])->group(function () {
    Route::get('/siswa', 'SiswaController@index')->name('siswa');
    Route::get('/siswa/edit', [SiswaController::class, 'edit']);
    Route::get('/siswa/cetak-kartu', [SiswaController::class, 'cetak_kartu'])->name('siswa.cetak_kartu');
    Route::post('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::resource('/siswa', SiswaController::class)->except(['show', 'edit', 'update']);
    Route::resource('/registrasi_ulang', RegistrasiUlangController::class);
    Route::get('/siswa/pengumuman/{id}', [SiswaController::class, 'pengumuman']);
    Route::get('/siswa/registrasi/{id}', [SiswaController::class, 'registrasiUlang']);
});

Route::middleware(['role:Administrator'])->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::get('/config', [ConfigController::class, 'index']);
    Route::get('/config/edit', [ConfigController::class, 'edit']);
    Route::put('/config/update', [ConfigController::class, 'update']);
    Route::get('/admin/bin', [AdminController::class, 'bin'])->name('admin.bin');
    Route::post('/admin/bin/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::delete('/admin/bin/{id}', [AdminController::class, 'forceDelete'])->name('admin.forceDelete');

});

Route::middleware(['role:Administrator,Admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/agen', AgenController::class);

    Route::get('/excel/sudah-bayar', [AgenController::class, 'exportSiswaSudahBayar']);
    Route::get('/excel/sudah-lulus', [AgenController::class, 'export_sudah_lulus']);
    Route::get('/excel/tidak-lulus', [AgenController::class, 'export_tidak_lulus']);
    Route::get('/excel/registrasi-ulang', [AgenController::class, 'export_siswa_sudah_registrasi_ulang']);
    Route::get('/agen/bin', [AgenController::class, 'bin'])->name('agen.bin');
    Route::post('/agen/bin/{id}', [AgenController::class, 'restore'])->name('agen.restore');
    Route::delete('/agen/bin/{id}', [AgenController::class, 'forceDelete'])->name('agen.forceDelete');

});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'indexsiswa'])->name('siswahome');
