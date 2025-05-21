<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarangmasukResource;
use App\Http\Resources\BarangmasukCollection;

class ProdukBarangmasuksController extends Controller
{
    public function index(
        Request $request,
        Produk $produk
    ): BarangmasukCollection {
        $this->authorize('view', $produk);

        $search = $request->get('search', '');

        $barangmasuks = $produk
            ->barangmasuks()
            ->search($search)
            ->latest()
            ->paginate();

        return new BarangmasukCollection($barangmasuks);
    }

    public function store(Request $request, Produk $produk): BarangmasukResource
    {
        $this->authorize('create', Barangmasuk::class);

        $validated = $request->validate([
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'jumlah' => ['required', 'numeric'],
            'harga_beli' => ['required', 'numeric'],
        ]);

        $barangmasuk = $produk->barangmasuks()->create($validated);

        return new BarangmasukResource($barangmasuk);
    }
}
