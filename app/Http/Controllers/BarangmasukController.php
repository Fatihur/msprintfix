<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BarangmasukStoreRequest;
use App\Http\Requests\BarangmasukUpdateRequest;
use App\Models\Supplier;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Barangmasuk::class);

        $search = $request->get('search', '');

        $barangmasuks = Barangmasuk::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.barangmasuks.index',
            compact('barangmasuks', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Barangmasuk::class);
        $suppliers  = Supplier::pluck('nama', 'id');
        $produks = Produk::pluck('judul', 'id');

        return view('app.barangmasuks.create', compact('produks','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangmasukStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Barangmasuk::class);

        $validated = $request->validated();

        // Create the new Barangmasuk entry
        $barangmasuk = Barangmasuk::create($validated);

        // Update the product stock
        $produk = Produk::find($validated['produk_id']);
        $produk->stok += $validated['jumlah'];
        $produk->save();

        return redirect()
            ->route('barangmasuks.edit', $barangmasuk)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Barangmasuk $barangmasuk): View
    {
        $this->authorize('view', $barangmasuk);

        return view('app.barangmasuks.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Barangmasuk $barangmasuk): View
    {
        $this->authorize('update', $barangmasuk);
        $suppliers  = Supplier::pluck('nama', 'id');

        $produks = Produk::pluck('judul', 'id');

        return view('app.barangmasuks.edit', compact('barangmasuk', 'produks','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BarangmasukUpdateRequest $request,
        Barangmasuk $barangmasuk
    ): RedirectResponse {
        $this->authorize('update', $barangmasuk);

        $validated = $request->validated();

        $barangmasuk->update($validated);

        return redirect()
            ->route('barangmasuks.edit', $barangmasuk)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Barangmasuk $barangmasuk
    ): RedirectResponse {
        $this->authorize('delete', $barangmasuk);

        $barangmasuk->delete();

        return redirect()
            ->route('barangmasuks.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
