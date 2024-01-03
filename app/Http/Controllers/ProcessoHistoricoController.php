<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProcessoHistorico;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProcessoHistoricoStoreRequest;
use App\Http\Requests\ProcessoHistoricoUpdateRequest;

class ProcessoHistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ProcessoHistorico::class);

        $search = $request->get('search', '');

        $processoHistoricos = ProcessoHistorico::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.processo_historicos.index',
            compact('processoHistoricos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ProcessoHistorico::class);

        $processos = Processo::pluck('numero', 'id');

        return view('app.processo_historicos.create', compact('processos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        ProcessoHistoricoStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', ProcessoHistorico::class);

        $validated = $request->validated();

        $processoHistorico = ProcessoHistorico::create($validated);

        return redirect()
            ->route('processo-historicos.edit', $processoHistorico)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        ProcessoHistorico $processoHistorico
    ): View {
        $this->authorize('view', $processoHistorico);

        return view(
            'app.processo_historicos.show',
            compact('processoHistorico')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        ProcessoHistorico $processoHistorico
    ): View {
        $this->authorize('update', $processoHistorico);

        $processos = Processo::pluck('numero', 'id');

        return view(
            'app.processo_historicos.edit',
            compact('processoHistorico', 'processos')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProcessoHistoricoUpdateRequest $request,
        ProcessoHistorico $processoHistorico
    ): RedirectResponse {
        $this->authorize('update', $processoHistorico);

        $validated = $request->validated();

        $processoHistorico->update($validated);

        return redirect()
            ->route('processo-historicos.edit', $processoHistorico)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ProcessoHistorico $processoHistorico
    ): RedirectResponse {
        $this->authorize('delete', $processoHistorico);

        $processoHistorico->delete();

        return redirect()
            ->route('processo-historicos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
