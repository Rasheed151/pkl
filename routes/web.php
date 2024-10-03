<?php

use Illuminate\Support\Facades\Route;

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


// Guest content route
Route::get('/', function () {
    return view('index');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/kontak', function () {
    return view('kontak');
});







//login-logout route
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')  // Menerapkan middleware 'guest'
    ->name('login');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');







//Content Route
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\data_kakController;
use App\Http\Controllers\data_pkaController;
use App\Http\Controllers\data_rkpController;
use App\Http\Controllers\data_tpkController;
use App\Http\Controllers\data_desaController;
use App\Http\Controllers\pengumumanController;
use App\Http\Controllers\data_aparatController;
use App\Http\Controllers\data_penyediaController;
use App\Http\Controllers\bamusrenbangdesController;
use App\Http\Controllers\data_teknisController;
use App\Http\Controllers\data_analisaController;
use App\Http\Controllers\data_perkiraanController;
use App\Http\Controllers\pengumuman_lelangController;
use App\Http\Controllers\penyerahanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\tesController;
use App\Http\Controllers\DateController;

// Group route yang dilindungi oleh middleware auth
Route::group(['middleware' => 'auth'], function () {
    
    // CRUD data, semua dilindungi auth middleware
    Route::resource('/home', data_desaController::class);
    Route::resource('/data_aparat', data_aparatController::class);
    Route::resource('/data_pka', data_pkaController::class);
    Route::resource('/data_tpk', data_tpkController::class);
    Route::resource('/data_penyedia', data_penyediaController::class);
    Route::resource('/bamusrenbangdes', bamusrenbangdesController::class);
    
    // Rute untuk PDF, dilindungi oleh auth dan akses tertentu
    Route::get('/generate-pdf/{id}', [PDFController::class, 'preview'])->name('make.pdf');
    Route::get('/rkp-pdf/{userId}', [PDFController::class, 'rkp'])->name('rkp.pdf');
    Route::get('/pengumuman-pdf/{userId}', [PDFController::class, 'pengumuman'])->name('pengumuman.pdf');
    Route::get('/jadwal-pdf/{id}', [PDFController::class, 'jadwal'])->name('jadwal.pdf');
    Route::get('/kak-pdf/{id}', [PDFController::class, 'kak'])->name('kak.pdf');
    Route::get('/lelang-pdf/{id}', [PDFController::class, 'pengumuman_lelang'])->name('pengumuman_lelang.pdf');

    // Rute tambahan untuk view static
    Route::get('/persiapan', function () {
        return view('persiapan.index');
    });
    
    Route::get('/pelaksanaan', function () {
        return view('pelaksanaan.index');
    });
    
    // CRUD Jadwal, Pengumuman, dan Data lainnya
    Route::resource('/jadwal', jadwalController::class);
    Route::resource('/data_rkp', data_rkpController::class);
    Route::resource('/pengumuman', pengumumanController::class);
    Route::resource('/data_kak', data_kakController::class);
    Route::resource('/teknis_pilih', tesController::class);
    Route::resource('/data_teknis', data_teknisController::class);
    Route::resource('/data_analisa', data_analisaController::class);
    Route::resource('/data_perkiraan', data_perkiraanController::class);
    Route::resource('/pengumuman_lelang', pengumuman_lelangController::class);
    Route::resource('/penyerahan-penyedia', penyerahanController::class);

    // Route tambahan dengan nama yang lebih deskriptif
    Route::get('/analisa_pilih', [tesController::class, 'coba'])->name('coba');
    Route::get('/perkiraan_pilih', [tesController::class, 'bisa'])->name('bisa');
    Route::get('/lelang_pilih', [tesController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/penyerahan', [tesController::class, 'penyerahan'])->name('penyerahan');
});

