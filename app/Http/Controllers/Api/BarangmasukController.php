<?php

namespace App\Http\Controllers\Api;

use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarangmasukResource;
use App\Http\Resources\BarangmasukCollection;
use App\Http\Requests\BarangmasukStoreRequest;
use App\Http\Requests\BarangmasukUpdateRequest;

class BarangmasukController extends Controller
{
    public function index(Request $request): BarangmasukCollection
    {
        $this->authorize('view-any', Barangmasuk::class);

        $search = $request->get('search', '');

        $barangmasuks = Barangmasuk::search($search)
            ->latest()
            ->paginate();

        return new BarangmasukCollection($barangmasuks);
    }

    public function store(BarangmasukStoreRequest $request): BarangmasukResource
    {
        $this->authorize('create', Barangmasuk::class);

        $validated = $request->validated();

        $barangmasuk = Barangmasuk::create($validated);

        return new BarangmasukResource($barangmasuk);
    }

    public function show(
        Request $request,
        Barangmasuk $barangmasuk
    ): BarangmasukResource {
        $this->authorize('view', $barangmasuk);

        return new BarangmasukResource($barangmasuk);
    }

    public function update(
        BarangmasukUpdateRequest $request,
        Barangmasuk $barangmasuk
    ): BarangmasukResource {
        $this->authorize('update', $barangmasuk);

        $validated = $request->validated();

        $barangmasuk->update($validated);

        return new BarangmasukResource($barangmasuk);
    }

    public function destroy(
        Request $request,
        Barangmasuk $barangmasuk
    ): Response {
        $this->authorize('delete', $barangmasuk);

        $barangmasuk->delete();

        return response()->noContent();
    }
}
