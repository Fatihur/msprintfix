<?php

namespace App\Http\Controllers\Api;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProdukCollection;
use App\Http\Requests\ProdukStoreRequest;
use App\Http\Requests\ProdukUpdateRequest;

class ProdukController extends Controller
{
    public function index(Request $request): ProdukCollection
    {
        $this->authorize('view-any', Produk::class);

        $search = $request->get('search', '');

        $produks = Produk::search($search)
            ->latest()
            ->paginate();

        return new ProdukCollection($produks);
    }

    public function store(ProdukStoreRequest $request): ProdukResource
    {
        $this->authorize('create', Produk::class);

        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $produk = Produk::create($validated);

        return new ProdukResource($produk);
    }

    public function show(Request $request, Produk $produk): ProdukResource
    {
        $this->authorize('view', $produk);

        return new ProdukResource($produk);
    }

    public function update(
        ProdukUpdateRequest $request,
        Produk $produk
    ): ProdukResource {
        $this->authorize('update', $produk);

        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::delete($produk->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $produk->update($validated);

        return new ProdukResource($produk);
    }

    public function destroy(Request $request, Produk $produk): Response
    {
        $this->authorize('delete', $produk);

        if ($produk->gambar) {
            Storage::delete($produk->gambar);
        }

        $produk->delete();

        return response()->noContent();
    }
}
