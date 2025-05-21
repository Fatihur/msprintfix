<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualandetail;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah produk
        $jumlahProduk = Produk::count();

        // Mengambil total pendapatan hari ini
        $tanggalHariIni = Carbon::today();
        $pendapatanHariIni = Penjualandetail::whereDate('created_at', $tanggalHariIni)->sum('total');

        return view('home', compact('jumlahProduk', 'pendapatanHariIni'));
    }
}
