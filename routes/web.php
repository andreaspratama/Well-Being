<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\PimpinanController;
use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\PolingController;
use App\Http\Controllers\Admin\ReportadminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\PasswordController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::post('logoutBack', [SignController::class, 'logout'])->name('logoutBack');

Route::group(['middleware' => ['auth', 'check:admin,pimpinan,manajerial']], function(){
    Route::prefix('backend')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
        // SISWA
        Route::post('siswaImport', [SiswaController::class, 'importExcel'])->name('siswaImport');
        Route::get('deleteSiswa/{id}', [SiswaController::class, 'delete'])->name('delete');
        Route::resource('siswa', SiswaController::class);
    
        // GURU
        Route::post('guruImport', [GuruController::class, 'importExcel'])->name('guruImport');
        Route::get('deleteGuru/{id}', [GuruController::class, 'delete'])->name('delete');
        Route::resource('guru', GuruController::class);

        // PIMPINAN
        Route::post('pimpinanImport', [PimpinanController::class, 'importExcel'])->name('pimpinanImport');
        Route::get('deletePimpinan/{id}', [PimpinanController::class, 'delete'])->name('delete');
        Route::resource('pimpinan', PimpinanController::class);
    
        // FEED
        Route::get('deleteFeed/{id}', [FeedController::class, 'delete'])->name('delete');
        Route::resource('feed', FeedController::class);

        // REPORT
        Route::get('reportIndex', [ReportadminController::class, 'index'])->name('reportIndex');
        Route::get('reportIndexBesar', [ReportadminController::class, 'indexBesar'])->name('reportIndexBesar');
        
        // Report Custom Kelas Besar
        // SMA
        Route::get('ambilDataSMA', [ReportadminController::class, 'dataBesarSMA'])->name('ambilDataSMA');
        Route::get('reportSMA', [ReportadminController::class, 'reportBesarSMA'])->name('reportSMA');
        // SMP
        Route::get('ambilDataSMP', [ReportadminController::class, 'dataBesarSMP'])->name('ambilDataSMP');
        Route::get('reportSMP', [ReportadminController::class, 'reportBesarSMP'])->name('reportSMP');
        // K3
        Route::get('ambilDataK3', [ReportadminController::class, 'dataBesarK3'])->name('ambilDataK3');
        Route::get('reportK3', [ReportadminController::class, 'reportBesarK3'])->name('reportK3');
        // K2
        Route::get('ambilDataK2', [ReportadminController::class, 'dataBesarK2'])->name('ambilDataK2');
        Route::get('reportK2', [ReportadminController::class, 'reportBesarK2'])->name('reportK2');
        // K1
        Route::get('ambilDataK1', [ReportadminController::class, 'dataBesarK1'])->name('ambilDataK1');
        Route::get('reportK1', [ReportadminController::class, 'reportBesarK1'])->name('reportK1');

        // Report Custom Kelas Kecil
        // K3
        Route::get('ambilDataKecilK3', [ReportadminController::class, 'dataKecilK3'])->name('ambilDataKecilK3');
        Route::get('reportKecilK3', [ReportadminController::class, 'reportKecilK3'])->name('reportKecilK3');
        // K2
        Route::get('ambilDataKecilK2', [ReportadminController::class, 'dataKecilK2'])->name('ambilDataKecilK2');
        Route::get('reportKecilK2', [ReportadminController::class, 'reportKecilK2'])->name('reportKecilK2');
        // K1
        Route::get('ambilDataKecilK1', [ReportadminController::class, 'dataKecilK1'])->name('ambilDataKecilK1');
        Route::get('reportKecilK1', [ReportadminController::class, 'reportKecilK1'])->name('reportKecilK1');

        // USER
        Route::post('userImport', [UserController::class, 'importExcel'])->name('userImport');
        Route::get('deleteUser/{id}', [UserController::class, 'delete'])->name('delete');
        Route::resource('user', UserController::class);
    });
});

Route::group(['middleware' => ['auth', 'check:guru']], function(){
    // COBA ROUTE
    Route::get('ambilData', [PolingController::class, 'cobadata'])->name('ambildata');
    Route::get('ambilDataBesar', [PolingController::class, 'cobadatabesar'])->name('ambildatabesar');
    Route::get('poling', [PolingController::class, 'index'])->name('polingIndex');
    Route::get('polingBesar', [PolingController::class, 'indexBesar'])->name('polingIndexBesar');
    Route::post('polingStore', [PolingController::class, 'store'])->name('polingStore');
    Route::post('polingStoreBesar', [PolingController::class, 'storeBesar'])->name('polingStoreBesar');
    Route::get('polingReportKecil', [PolingController::class, 'reportKecil'])->name('polingReportKecil');
    Route::get('polingReportBesar', [PolingController::class, 'reportBesar'])->name('polingReportBesar');

    // Cetak PDF
    Route::get('cetakPdf/{id}', [PolingController::class, 'cetakPdf'])->name('cetakPdf');
    Route::get('cetakPdfBesar/{id}', [PolingController::class, 'cetakPdfBesar'])->name('cetakPdfBesar');

    // Report Per Siswa
    Route::get('reportPerSiswa', [PolingController::class, 'reportPerSiswa'])->name('reportPerSiswa');
    Route::get('ambilDataSiswa', [PolingController::class, 'ambilDataSiswa'])->name('ambilDataSiswa');
    Route::get('detailSiswa/{id}', [PolingController::class, 'detailSiswa'])->name('detailSiswa');
});

Route::group(['middleware' => ['auth', 'check:siswa']], function(){
    // SISWA
    Route::post('polingStoreSiswa', [PolingController::class, 'storeSiswa'])->name('polingStoreSiswa');
    Route::get('polingSiswa', [PolingController::class, 'indexsiswa'])->name('polingIndexSiswa');
    Route::get('polingReportSiswa', [PolingController::class, 'reportSiswa'])->name('polingReportSiswa');
});

Route::group(['middleware' => ['auth', 'check:guru,siswa']], function(){
    Route::get('homePoling', [PolingController::class, 'home'])->name('homePoling');
    Route::get('polingTq', [PolingController::class, 'tq'])->name('polingTq');
    Route::get('gantiPass', [PasswordController::class, 'index'])->name('gantiPass');
    Route::post('gantiPassPros', [PasswordController::class, 'gantiPassPros'])->name('gantiPassPros');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
