<?php

namespace App\Http\Controllers\Api;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenjualandetailResource;
use App\Http\Resources\PenjualandetailCollection;

class PenjualanPenjualandetailsController extends Controller
{
    public function index(
        Request $request,
        Penjualan $penjualan
    ): PenjualandetailCollection {
        $this->authorize('view', $penjualan);

        $search = $request->get('search', '');

        $penjualandetails = $penjualan
            ->penjualandetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new PenjualandetailCollection($penjualandetails);
    }

    public function store(
        Request $request,
        Penjualan $penjualan
    ): PenjualandetailResource {
        $this->authorize('create', Penjualandetail::class);

        $validated = $request->validate([
            'produk_id' => ['required', 'exists:produks,id'],
            'jumlah' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        $penjualandetail = $penjualan->penjualandetails()->create($validated);

        return new PenjualandetailResource($penjualandetail);
    }
}
