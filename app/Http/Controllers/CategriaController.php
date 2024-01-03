<?php

namespace App\Http\Controllers;

use App\Models\Categria;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategriaStoreRequest;
use App\Http\Requests\CategriaUpdateRequest;

class CategriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Categria::class);

        $search = $request->get('search', '');

        $categrias = Categria::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.categrias.index', compact('categrias', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Categria::class);

        return view('app.categrias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategriaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Categria::class);

        $validated = $request->validated();

        $categria = Categria::create($validated);

        return redirect()
            ->route('categrias.edit', $categria)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Categria $categria): View
    {
        $this->authorize('view', $categria);

        return view('app.categrias.show', compact('categria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Categria $categria): View
    {
        $this->authorize('update', $categria);

        return view('app.categrias.edit', compact('categria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CategriaUpdateRequest $request,
        Categria $categria
    ): RedirectResponse {
        $this->authorize('update', $categria);

        $validated = $request->validated();

        $categria->update($validated);

        return redirect()
            ->route('categrias.edit', $categria)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Categria $categria
    ): RedirectResponse {
        $this->authorize('delete', $categria);

        $categria->delete();

        return redirect()
            ->route('categrias.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
