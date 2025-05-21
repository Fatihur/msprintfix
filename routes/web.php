<?php

use App\Http\Controllers\PenjualandetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

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
    return view('welcome');
});

Route::get('/', [BerandaController::class, 'index'])->name(
    'beranda.index'
);

Route::get('/produk', [BerandaController::class, 'produk'])->name(
    'beranda.produk'
);
Route::get('/produk/{id}', [BerandaController::class, 'show'])->name(
    'beranda.show'
);
Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/generate', [LaporanController::class, 'generate'])->name('laporan.generate');

        Route::resource('kategoris', KategoriController::class);
        Route::resource('produks', ProdukController::class);
        Route::resource('penjualans', PenjualanController::class);
        Route::resource('penjualandetails', PenjualandetailController::class);
        Route::resource('barangmasuks', BarangmasukController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('was', WaController::class);
        Route::resource('users', UserController::class);
    });
