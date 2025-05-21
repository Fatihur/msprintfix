<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProdukStoreRequest;
use App\Http\Requests\ProdukUpdateRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Produk::class);

        $search = $request->get('search', '');

        $produks = Produk::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.produks.index', compact('produks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Produk::class);

        $kategoris = Kategori::pluck('kategori', 'id');

        return view('app.produks.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdukStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Produk::class);

        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $produk = Produk::create($validated);

        return redirect()
            ->route('produks.edit', $produk)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Produk $produk): View
    {
        $this->authorize('view', $produk);

        return view('app.produks.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Produk $produk): View
    {
        $this->authorize('update', $produk);

        $kategoris = Kategori::pluck('kategori', 'id');

        return view('app.produks.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProdukUpdateRequest $request,
        Produk $produk
    ): RedirectResponse {
        $this->authorize('update', $produk);

        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::delete($produk->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('public');
        }

        $produk->update($validated);

        return redirect()
            ->route('produks.edit', $produk)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Produk $produk): RedirectResponse
    {
        $this->authorize('delete', $produk);

        if ($produk->gambar) {
            Storage::delete($produk->gambar);
        }

        $produk->delete();

        return redirect()
            ->route('produks.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
