<?php

namespace App\Http\Controllers;

use App\Models\Orgao;
use App\Models\Processo;
use App\Models\Convenio;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProcessoStoreRequest;
use App\Http\Requests\ProcessoUpdateRequest;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Processo::class);

        $search = $request->get('search', '');

        $processos = Processo::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.processos.index', compact('processos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Processo::class);

        $orgaos = Orgao::pluck('nome', 'id');
        $convenios = Convenio::pluck('numero', 'id');

        return view('app.processos.create', compact('orgaos', 'convenios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProcessoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Processo::class);

        $validated = $request->validated();

        $processo = Processo::create($validated);

        return redirect()
            ->route('processos.edit', $processo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Processo $processo): View
    {
        $this->authorize('view', $processo);

        return view('app.processos.show', compact('processo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Processo $processo): View
    {
        $this->authorize('update', $processo);

        $orgaos = Orgao::pluck('nome', 'id');
        $convenios = Convenio::pluck('numero', 'id');

        return view(
            'app.processos.edit',
            compact('processo', 'orgaos', 'convenios')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProcessoUpdateRequest $request,
        Processo $processo
    ): RedirectResponse {
        $this->authorize('update', $processo);

        $validated = $request->validated();

        $processo->update($validated);

        return redirect()
            ->route('processos.edit', $processo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Processo $processo
    ): RedirectResponse {
        $this->authorize('delete', $processo);

        $processo->delete();

        return redirect()
            ->route('processos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
