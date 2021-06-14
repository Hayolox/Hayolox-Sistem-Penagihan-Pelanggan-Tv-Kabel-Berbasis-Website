<?php

use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SuksesController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerifikasiController;

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

Route::prefix('Admin')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');

        Route::get('/Tagihan/delete/tahun', [TahunController::class, 'index'])->name('delete-tahun');
        Route::get('/Tagihan/create/tahun', [TahunController::class, 'create'])->name('create-tahun');
        Route::post('/Tagihan/store/tahun/', [TahunController::class, 'store'])->name('store-tahun');
        Route::post('/Tagihan/edit/tahun/{id}', [TahunController::class, 'edit'])->name('edit-tahun');
        Route::get('/Tagihan/delete/tahun/{id}', [TahunController::class, 'destroy'])->name('destroy-tahun');
        Route::resource('Tagihan', BillController::class);

        Route::get('/Verifikasi-Tagihan', [VerifikasiController::class, 'index'])->name('verifikasi');

        Route::get('/Sukses', [SuksesController::class, 'index'])->name('sukses');

        Route::resource('Users', UserController::class);

      
        
     
});


