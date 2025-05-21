<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Controllers\Api\BarangmasukController;
use App\Http\Controllers\Api\KategoriProduksController;
use App\Http\Controllers\Api\PenjualandetailController;
use App\Http\Controllers\Api\ProdukBarangmasuksController;
use App\Http\Controllers\Api\SupplierBarangmasuksController;
use App\Http\Controllers\Api\ProdukPenjualandetailsController;
use App\Http\Controllers\Api\PenjualanPenjualandetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('kategoris', KategoriController::class);

        // Kategori Produks
        Route::get('/kategoris/{kategori}/produks', [
            KategoriProduksController::class,
            'index',
        ])->name('kategoris.produks.index');
        Route::post('/kategoris/{kategori}/produks', [
            KategoriProduksController::class,
            'store',
        ])->name('kategoris.produks.store');

        Route::apiResource('produks', ProdukController::class);

        // Produk Penjualandetails
        Route::get('/produks/{produk}/penjualandetails', [
            ProdukPenjualandetailsController::class,
            'index',
        ])->name('produks.penjualandetails.index');
        Route::post('/produks/{produk}/penjualandetails', [
            ProdukPenjualandetailsController::class,
            'store',
        ])->name('produks.penjualandetails.store');

        // Produk Barangmasuks
        Route::get('/produks/{produk}/barangmasuks', [
            ProdukBarangmasuksController::class,
            'index',
        ])->name('produks.barangmasuks.index');
        Route::post('/produks/{produk}/barangmasuks', [
            ProdukBarangmasuksController::class,
            'store',
        ])->name('produks.barangmasuks.store');

        Route::apiResource('penjualans', PenjualanController::class);

        // Penjualan Penjualandetails
        Route::get('/penjualans/{penjualan}/penjualandetails', [
            PenjualanPenjualandetailsController::class,
            'index',
        ])->name('penjualans.penjualandetails.index');
        Route::post('/penjualans/{penjualan}/penjualandetails', [
            PenjualanPenjualandetailsController::class,
            'store',
        ])->name('penjualans.penjualandetails.store');

        Route::apiResource('barangmasuks', BarangmasukController::class);

        Route::apiResource('suppliers', SupplierController::class);

        // Supplier Barangmasuks
        Route::get('/suppliers/{supplier}/barangmasuks', [
            SupplierBarangmasuksController::class,
            'index',
        ])->name('suppliers.barangmasuks.index');
        Route::post('/suppliers/{supplier}/barangmasuks', [
            SupplierBarangmasuksController::class,
            'store',
        ])->name('suppliers.barangmasuks.store');

        Route::apiResource('was', WaController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource(
            'penjualandetails',
            PenjualandetailController::class
        );
    });
