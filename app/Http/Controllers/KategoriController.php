<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\KategoriStoreRequest;
use App\Http\Requests\KategoriUpdateRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): View
    {
        $this->authorize('view-any', Kategori::class);

        $search = $request->get('search', '');

        $kategoris = Kategori::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.kategoris.index', compact('kategoris', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Kategori::class);

        return view('app.kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Kategori::class);

        $validated = $request->validated();

        $kategori = Kategori::create($validated);

        return redirect()
            ->route('kategoris.edit', $kategori)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Kategori $kategori): View
    {
        $this->authorize('view', $kategori);

        return view('app.kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Kategori $kategori): View
    {
        $this->authorize('update', $kategori);

        return view('app.kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        KategoriUpdateRequest $request,
        Kategori $kategori
    ): RedirectResponse {
        $this->authorize('update', $kategori);

        $validated = $request->validated();

        $kategori->update($validated);

        return redirect()
            ->route('kategoris.edit', $kategori)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Kategori $kategori
    ): RedirectResponse {
        $this->authorize('delete', $kategori);

        $kategori->delete();

        return redirect()
            ->route('kategoris.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
