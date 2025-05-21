<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenjualandetailResource;
use App\Http\Resources\PenjualandetailCollection;

class ProdukPenjualandetailsController extends Controller
{
    public function index(
        Request $request,
        Produk $produk
    ): PenjualandetailCollection {
        $this->authorize('view', $produk);

        $search = $request->get('search', '');

        $penjualandetails = $produk
            ->penjualandetails()
            ->search($search)
            ->latest()
            ->paginate();

        return new PenjualandetailCollection($penjualandetails);
    }

    public function store(
        Request $request,
        Produk $produk
    ): PenjualandetailResource {
        $this->authorize('create', Penjualandetail::class);

        $validated = $request->validate([
            'jumlah' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ]);

        $penjualandetail = $produk->penjualandetails()->create($validated);

        return new PenjualandetailResource($penjualandetail);
    }
}
