<?php

namespace App\Http\Controllers;

use App\Models\Situacao;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SituacaoStoreRequest;
use App\Http\Requests\SituacaoUpdateRequest;

class SituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Situacao::class);

        $search = $request->get('search', '');

        $situacoes = Situacao::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.situacoes.index', compact('situacoes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Situacao::class);

        return view('app.situacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SituacaoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Situacao::class);

        $validated = $request->validated();

        $situacao = Situacao::create($validated);

        return redirect()
            ->route('situacoes.edit', $situacao)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Situacao $situacao): View
    {
        $this->authorize('view', $situacao);

        return view('app.situacoes.show', compact('situacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Situacao $situacao): View
    {
        $this->authorize('update', $situacao);

        return view('app.situacoes.edit', compact('situacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SituacaoUpdateRequest $request,
        Situacao $situacao
    ): RedirectResponse {
        $this->authorize('update', $situacao);

        $validated = $request->validated();

        $situacao->update($validated);

        return redirect()
            ->route('situacoes.edit', $situacao)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Situacao $situacao
    ): RedirectResponse {
        $this->authorize('delete', $situacao);

        $situacao->delete();

        return redirect()
            ->route('situacoes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
