<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Http\Resources\ProdukCollection;

class KategoriProduksController extends Controller
{
    public function index(
        Request $request,
        Kategori $kategori
    ): ProdukCollection {
        $this->authorize('view', $kategori);

        $search = $request->get('search', '');

        $produks = $kategori
            ->produks()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProdukCollection($produks);
    }

    public function store(Request $request, Kategori $kategori): ProdukResource
    {
        $this->authorize('create', Produk::class);

        $validated = $request->validate([
            'judul' => ['required', 'max:255', 'string'],
            'gambar' => ['image', 'max:1024', 'nullable'],
            'deskripsi' => ['nullable', 'max:255', 'string'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $produk = $kategori->produks()->create($validated);

        return new ProdukResource($produk);
    }
}
