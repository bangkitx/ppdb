<?php

use App\Http\Controllers\AgenController;
use App\Http\Controllers\ConfigController;
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

// Route::get('/persediaan', [BisnisController::class, 'stock']);
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){

// Route::prefix('persediaan')->middleware('auth')->group(function(){
//     Route::resource('/transaksi', TransaksiController::class);
//     Route::resource('/persediaan', ProdukController::class);
//     Route::resource('/agen', AgenController::class);

// });

// });
Route::get('/', [SiswaController::class, 'awal']);

Route::resource('/registrasi', RegistrasiUlangController::class);
Route::resource('/payment', PaymentController::class);
// Route::post('/daftar', [DatapokokController::class, 'store']);
// Route::resource('/datapokok', DatapokokController::class);

Route::middleware(['auth'])->group(function () {

    // Route::middleware(['checkUserRole'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa');
    // });
    Route::get('/bayar', [PaymentController::class, 'bayar'])->name('bayar');
    Route::get('/agen/bin', [AgenController::class, 'bin'])->name('agen.bin');
    Route::post('/agen/bin/{id}', [AgenController::class, 'restore'])->name('agen.restore');
    Route::delete('/agen/bin/{id}', [AgenController::class, 'forceDelete'])->name('agen.forceDelete');
    Route::resource('/agen', AgenController::class);
    Route::resource('/siswa', SiswaController::class)->except(['show', 'edit', 'update']);

    // Route::get('/daftar', [AgenController::class, 'create']);
    Route::get('/agen/cek', [AgenController::class, 'show']);
    Route::get('/agen/cetak/{id}', [AgenController::class, 'cetak']);
    Route::get('/siswa/cetak/{id}', [SiswaController::class, 'cetak']);
    Route::get('/agen/cetak-kartu/{id}', [AgenController::class, 'cetak_kartu'])->name('siswa.cetak_kartu');
    Route::get('/agen/nilai/{id}', [AgenController::class, 'masukNilai']);
    Route::put('/agen/nilai/update/{id}', [AgenController::class, 'updateNilai']);
    Route::get('/siswa/pengumuman/{id}', [SiswaController::class, 'pengumuman']);
    Route::get('/siswa/registrasi/{id}', [SiswaController::class, 'registrasiUlang']);
    Route::get('/siswa/cetakpokok/{id}', [SiswaController::class, 'cetakpokok']);

    // Route::resource('/register', RegistersUsers::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/registrasi_ulang', RegistrasiUlangController::class);
});

Route::middleware(['admin:1'])->group(function () {
    Route::get('/siswa', 'SiswaController@index')->name('siswa');
    Route::get('/siswa/edit', [SiswaController::class, 'edit']);
    Route::get('/siswa/cetak-kartu', [SiswaController::class, 'cetak_kartu'])->name('siswa.cetak_kartu');
    Route::post('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::resource('/siswa', SiswaController::class)->except(['show', 'edit', 'update']);
    Route::resource('/registrasi_ulang', RegistrasiUlangController::class);
    Route::get('/siswa/pengumuman/{id}', [SiswaController::class, 'pengumuman']);
    Route::get('/siswa/registrasi/{id}', [SiswaController::class, 'registrasiUlang']);
});

Route::middleware(['admin:0'])->group(function () {
    // Route::get('/', [SiswaController::class,'awal']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/agen', AgenController::class);
    Route::get('/config', [ConfigController::class, 'index']);
    Route::get('/config/edit', [ConfigController::class, 'edit']);
    Route::put('/config/update', [ConfigController::class, 'update']);
    // Route::get('/excel/sudah-bayar', [SiswaController::class, 'export_sudah_bayar']);

    Route::get('/excel/sudah-bayar', [AgenController::class, 'exportSiswaSudahBayar']);
    Route::get('/excel/sudah-lulus', [AgenController::class, 'export_sudah_lulus']);
    Route::get('/excel/tidak-lulus', [AgenController::class, 'export_tidak_lulus']);
    Route::get('/excel/registrasi-ulang', [AgenController::class, 'export_siswa_sudah_registrasi_ulang']);

});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'indexsiswa'])->name('siswahome');
