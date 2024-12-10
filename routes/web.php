<?php

use App\Http\Controllers\adminController;
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
use App\Http\Controllers\kak_dataController;
use App\Http\Controllers\pka_dataController;
use App\Http\Controllers\rkp_dataController;
use App\Http\Controllers\tpk_dataController;
use App\Http\Controllers\village_dataController;
use App\Http\Controllers\announcementController;
use App\Http\Controllers\officials_dataController;
use App\Http\Controllers\supplier_dataController;
use App\Http\Controllers\bamusrenbangdesController;
use App\Http\Controllers\technical_specificationsController;
use App\Http\Controllers\price_analysisController;
use App\Http\Controllers\price_estimateController;
use App\Http\Controllers\auction_announcementsController;
use App\Http\Controllers\submissionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\chooseController;
use App\Http\Controllers\swakelola_scheduleController;
use App\Http\Controllers\rptkbpsController;
use App\Http\Controllers\swakelola_implementationController;
use App\Http\Controllers\offer_implementationController;


// Group route yang dilindungi oleh middleware auth
Route::group(['middleware' => 'auth'], function () {
    
    // CRUD data General Dan planning
    Route::resource('/home', village_dataController::class)->middleware('level_check');
    Route::resource('/officials_data', officials_dataController::class);
    Route::resource('/pka_data', pka_dataController::class);
    Route::resource('/tpk_data', tpk_dataController::class);
    Route::resource('/supplier_data', supplier_dataController::class);
    Route::resource('/bamusrenbangdes', bamusrenbangdesController::class);
    Route::resource('/rkp_data', rkp_dataController::class);
    Route::resource('/announcement', announcementController::class);
    
    // Rute untuk PDF, dilindungi oleh auth dan akses tertentu
    Route::get('/generate-pdf/{id}', [PDFController::class, 'bamusrenbangdes'])->name('bamusrenbangdes.pdf');
    Route::get('/rkp-pdf/{userId}', [PDFController::class, 'rkp'])->name('rkp.pdf');
    Route::get('/pengumuman-pdf/{userId}', [PDFController::class, 'announcement'])->name('announcement.pdf');
    Route::get('/jadwal-pdf/{id}', [PDFController::class, 'Schedule'])->name('Schedule.pdf');
    Route::get('/kak-pdf/{id}', [PDFController::class, 'kak'])->name('kak.pdf');
    Route::get('/technical_specifications-pdf/{rkp_id}', [PDFController::class, 'technical_specifications'])->name('technical_specifications.pdf');
    Route::get('/price_analysis-pdf/{rkp_id}', [PDFController::class, 'price_analysis'])->name('price_analysis.pdf');
    Route::get('/price_estimate-pdf/{rkp_id}', [PDFController::class, 'price_estimate'])->name('price_estimate.pdf');
    Route::get('/auction_announcements-pdf/{id}/{rkp_id}', [PDFController::class, 'auction_announcements'])->name('auction_announcements.pdf');
    Route::get('/bamusrenbangdes/preview/{id}', [PDFController::class, 'previewBamusrenbangdes'])->name('bamusrenbangdes.preview');


    // Rute tambahan untuk view static
    Route::get('/preparation', function () {
        return view('preparation.choose');
    });

    Route::get('/implementation', function () {
        return view('implementation.index');
    });
    
    // CRUD Data preparation
    Route::get('/Schedule', [announcementController::class,'scheduleindex'])->name('Schedule.index');
    Route::resource('/kak_data', kak_dataController::class);
    Route::resource('/technical_specifications', technical_specificationsController::class);
    Route::resource('/price_analysis', price_analysisController::class);
    Route::resource('/price_estimate', price_estimateController::class);
    Route::resource('/auction_announcements', auction_announcementsController::class);
    Route::resource('/offer_implementation', offer_implementationController::class);
    Route::resource('/submission_supplier', submissionController::class);
    
    // Route Pemilihan
    Route::resource('/technical_specifications_choose', chooseController::class);
    Route::get('/price_analysis_choose', [chooseController::class, 'price_analysis'])->name('price_analysis');
    Route::get('/price_estimate_choose', [chooseController::class, 'price_estimate'])->name('price_estimate');
    Route::get('/submission_supplier_choose', [chooseController::class, 'submission_supplier_choose'])->name('submission_supplier_choose');

    


    // CRUD Data Tambahan preparation Swakelola
    Route::resource('/swakelola_schedule', swakelola_scheduleController::class);
    Route::get('/kak_data_swakelola', [kak_dataController::class,'index_swakelola'])->name('kak_data.index_swakelola');
    Route::get('/rab_data', [price_estimateController::class,'index_swakelola'])->name('rab_data.index_swakelola');
    Route::resource('/rptkbps', rptkbpsController::class);
    Route::resource('/swakelola_implementation', swakelola_implementationController::class);
    Route::get('/submission_swakelola', [submissionController::class,'index_swakelola'])->name('submission_swakelola.index_swakelola');
    
    // Route Pemilihan Tambahan untuk Swakelola
    Route::get('/technical_specifications_swakelola_choose', [chooseController::class, 'technical_specifications_swakelola'])->name('technical_specifications_swakelola');
    Route::get('/price_analysis_swakelola_choose', [chooseController::class, 'price_analysis_swakelola'])->name('price_analysis_swakelola');
    Route::get('/rab_data_choose', [chooseController::class, 'rab_data'])->name('rab_data');
    Route::get('/rptkbps_choose', [chooseController::class, 'rptkbps'])->name('rptkbps');
    Route::get('/submission_swakelola_choose', [chooseController::class, 'submission_swakelola_choose'])->name('submission_swakelola_choose');

    Route::get('/preparation_swakelola', function () {
        return view('preparation.swakelola.choose');
    });




    //atmin
    Route::resource('/admin', adminController::class)->middleware('protected');
    Route::get('/admin/{id}/choose', [adminController::class, 'choose'])->name('admin.choose')->middleware('protected');
    Route::get('/admin/{id}/officials_data', [adminController::class, 'officials_data'])->name('admin.officials_data')->middleware('protected');
    Route::get('/admin/{id}/pka_data', [adminController::class, 'pka_data'])->name('admin.pka_data')->middleware('protected');
});

