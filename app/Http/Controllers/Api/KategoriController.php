<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use App\Http\Resources\KategoriCollection;
use App\Http\Requests\KategoriStoreRequest;
use App\Http\Requests\KategoriUpdateRequest;

class KategoriController extends Controller
{
    public function index(Request $request): KategoriCollection
    {
        $this->authorize('view-any', Kategori::class);

        $search = $request->get('search', '');

        $kategoris = Kategori::search($search)
            ->latest()
            ->paginate();

        return new KategoriCollection($kategoris);
    }

    public function store(KategoriStoreRequest $request): KategoriResource
    {
        $this->authorize('create', Kategori::class);

        $validated = $request->validated();

        $kategori = Kategori::create($validated);

        return new KategoriResource($kategori);
    }

    public function show(Request $request, Kategori $kategori): KategoriResource
    {
        $this->authorize('view', $kategori);

        return new KategoriResource($kategori);
    }

    public function update(
        KategoriUpdateRequest $request,
        Kategori $kategori
    ): KategoriResource {
        $this->authorize('update', $kategori);

        $validated = $request->validated();

        $kategori->update($validated);

        return new KategoriResource($kategori);
    }

    public function destroy(Request $request, Kategori $kategori): Response
    {
        $this->authorize('delete', $kategori);

        $kategori->delete();

        return response()->noContent();
    }
}
