<?php

namespace App\Http\Controllers;

use App\Models\Wa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\WaStoreRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\WaUpdateRequest;

class WaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Wa::class);

        $search = $request->get('search', '');

        $was = Wa::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.was.index', compact('was', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Wa::class);

        return view('app.was.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Wa::class);

        $validated = $request->validated();

        $wa = Wa::create($validated);

        return redirect()
            ->route('was.edit', $wa)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Wa $wa): View
    {
        $this->authorize('view', $wa);

        return view('app.was.show', compact('wa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Wa $wa): View
    {
        $this->authorize('update', $wa);

        return view('app.was.edit', compact('wa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaUpdateRequest $request, Wa $wa): RedirectResponse
    {
        $this->authorize('update', $wa);

        $validated = $request->validated();

        $wa->update($validated);

        return redirect()
            ->route('was.edit', $wa)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Wa $wa): RedirectResponse
    {
        $this->authorize('delete', $wa);

        $wa->delete();

        return redirect()
            ->route('was.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
