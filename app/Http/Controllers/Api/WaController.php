<?php

namespace App\Http\Controllers\Api;

use App\Models\Wa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\WaResource;
use App\Http\Resources\WaCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\WaStoreRequest;
use App\Http\Requests\WaUpdateRequest;

class WaController extends Controller
{
    public function index(Request $request): WaCollection
    {
        $this->authorize('view-any', Wa::class);

        $search = $request->get('search', '');

        $was = Wa::search($search)
            ->latest()
            ->paginate();

        return new WaCollection($was);
    }

    public function store(WaStoreRequest $request): WaResource
    {
        $this->authorize('create', Wa::class);

        $validated = $request->validated();

        $wa = Wa::create($validated);

        return new WaResource($wa);
    }

    public function show(Request $request, Wa $wa): WaResource
    {
        $this->authorize('view', $wa);

        return new WaResource($wa);
    }

    public function update(WaUpdateRequest $request, Wa $wa): WaResource
    {
        $this->authorize('update', $wa);

        $validated = $request->validated();

        $wa->update($validated);

        return new WaResource($wa);
    }

    public function destroy(Request $request, Wa $wa): Response
    {
        $this->authorize('delete', $wa);

        $wa->delete();

        return response()->noContent();
    }
}
