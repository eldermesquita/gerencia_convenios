<?php

namespace App\Http\Controllers;

use App\Models\Aditivo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AditivoStoreRequest;
use App\Http\Requests\AditivoUpdateRequest;

class AditivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Aditivo::class);

        $search = $request->get('search', '');

        $aditivos = Aditivo::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.aditivos.index', compact('aditivos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Aditivo::class);

        return view('app.aditivos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AditivoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Aditivo::class);

        $validated = $request->validated();

        $aditivo = Aditivo::create($validated);

        return redirect()
            ->route('aditivos.edit', $aditivo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Aditivo $aditivo): View
    {
        $this->authorize('view', $aditivo);

        return view('app.aditivos.show', compact('aditivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Aditivo $aditivo): View
    {
        $this->authorize('update', $aditivo);

        return view('app.aditivos.edit', compact('aditivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        AditivoUpdateRequest $request,
        Aditivo $aditivo
    ): RedirectResponse {
        $this->authorize('update', $aditivo);

        $validated = $request->validated();

        $aditivo->update($validated);

        return redirect()
            ->route('aditivos.edit', $aditivo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Aditivo $aditivo
    ): RedirectResponse {
        $this->authorize('delete', $aditivo);

        $aditivo->delete();

        return redirect()
            ->route('aditivos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
