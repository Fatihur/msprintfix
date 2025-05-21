<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function generate(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        // Mengambil data penjualan berdasarkan rentang tanggal
        $penjualan = Penjualan::with('penjualandetails.produk')
                        ->whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai])
                        ->get();

        $pdf = PDF::loadView('laporan.pdf', compact('penjualan'));

        return $pdf->download('laporan-penjualan.pdf');
    }
}
