<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Penjualandetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenjualandetailResource;
use App\Http\Resources\PenjualandetailCollection;
use App\Http\Requests\PenjualandetailStoreRequest;
use App\Http\Requests\PenjualandetailUpdateRequest;

class PenjualandetailController extends Controller
{
    public function index(Request $request): PenjualandetailCollection
    {
        $this->authorize('view-any', Penjualandetail::class);

        $search = $request->get('search', '');

        $penjualandetails = Penjualandetail::search($search)
            ->latest()
            ->paginate();

        return new PenjualandetailCollection($penjualandetails);
    }

    public function store(
        PenjualandetailStoreRequest $request
    ): PenjualandetailResource {
        $this->authorize('create', Penjualandetail::class);

        $validated = $request->validated();

        $penjualandetail = Penjualandetail::create($validated);

        return new PenjualandetailResource($penjualandetail);
    }

    public function show(
        Request $request,
        Penjualandetail $penjualandetail
    ): PenjualandetailResource {
        $this->authorize('view', $penjualandetail);

        return new PenjualandetailResource($penjualandetail);
    }

    public function update(
        PenjualandetailUpdateRequest $request,
        Penjualandetail $penjualandetail
    ): PenjualandetailResource {
        $this->authorize('update', $penjualandetail);

        $validated = $request->validated();

        $penjualandetail->update($validated);

        return new PenjualandetailResource($penjualandetail);
    }

    public function destroy(
        Request $request,
        Penjualandetail $penjualandetail
    ): Response {
        $this->authorize('delete', $penjualandetail);

        $penjualandetail->delete();

        return response()->noContent();
    }
}
