<?php

namespace App\Http\Controllers\Api;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarangmasukResource;
use App\Http\Resources\BarangmasukCollection;

class SupplierBarangmasuksController extends Controller
{
    public function index(
        Request $request,
        Supplier $supplier
    ): BarangmasukCollection {
        $this->authorize('view', $supplier);

        $search = $request->get('search', '');

        $barangmasuks = $supplier
            ->barangmasuks()
            ->search($search)
            ->latest()
            ->paginate();

        return new BarangmasukCollection($barangmasuks);
    }

    public function store(
        Request $request,
        Supplier $supplier
    ): BarangmasukResource {
        $this->authorize('create', Barangmasuk::class);

        $validated = $request->validate([
            'produk_id' => ['required', 'exists:produks,id'],
            'jumlah' => ['required', 'numeric'],
            'harga_beli' => ['required', 'numeric'],
        ]);

        $barangmasuk = $supplier->barangmasuks()->create($validated);

        return new BarangmasukResource($barangmasuk);
    }
}
