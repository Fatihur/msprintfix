<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Penjualandetail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PenjualandetailStoreRequest;
use App\Http\Requests\PenjualandetailUpdateRequest;

class PenjualandetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Penjualandetail::class);

        $search = $request->get('search', '');

        $penjualandetails = Penjualandetail::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.penjualandetails.index',
            compact('penjualandetails', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Penjualandetail::class);

        $penjualans = Penjualan::pluck('tanggal', 'id');
        $produks = Produk::pluck('judul', 'id');

        return view(
            'app.penjualandetails.create',
            compact('penjualans', 'produks')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PenjualandetailStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', Penjualandetail::class);

        $validated = $request->validated();

        $penjualandetail = Penjualandetail::create($validated);

        return redirect()
            ->route('penjualandetails.edit', $penjualandetail)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        Penjualandetail $penjualandetail
    ): View {
        $this->authorize('view', $penjualandetail);

        return view('app.penjualandetails.show', compact('penjualandetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        Penjualandetail $penjualandetail
    ): View {
        $this->authorize('update', $penjualandetail);

        $penjualans = Penjualan::pluck('tanggal', 'id');
        $produks = Produk::pluck('judul', 'id');

        return view(
            'app.penjualandetails.edit',
            compact('penjualandetail', 'penjualans', 'produks')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PenjualandetailUpdateRequest $request,
        Penjualandetail $penjualandetail
    ): RedirectResponse {
        $this->authorize('update', $penjualandetail);

        $validated = $request->validated();

        $penjualandetail->update($validated);

        return redirect()
            ->route('penjualandetails.edit', $penjualandetail)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Penjualandetail $penjualandetail
    ): RedirectResponse {
        $this->authorize('delete', $penjualandetail);

        $penjualandetail->delete();

        return redirect()
            ->route('penjualandetails.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
