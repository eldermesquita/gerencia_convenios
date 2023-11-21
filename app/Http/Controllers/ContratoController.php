<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Contrato;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContratoStoreRequest;
use App\Http\Requests\ContratoUpdateRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Contrato::class);

        $search = $request->get('search', '');

        $contratos = Contrato::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.contratos.index', compact('contratos', 'search'));
    }
  /**
     * List the specified resource.
     */
    public function lista() : JsonResponse
    {
        try {
            $contrato = Contrato::with('empresa')->orderBy('virgencia', 'asc')->get();

            if ($contrato->count() <= 0) {
                $contrato = null;
            }
            return response()->json($contrato, Response::HTTP_OK);
        } catch (Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Contrato::class);

        $empresas = Empresa::pluck('nome', 'id');

        return view('app.contratos.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContratoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Contrato::class);

        $validated = $request->validated();

        $contrato = Contrato::create($validated);

        return redirect()
            ->route('contratos.edit', $contrato)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Contrato $contrato): View
    {
        $this->authorize('view', $contrato);

        return view('app.contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Contrato $contrato): View
    {
        $this->authorize('update', $contrato);

        $empresas = Empresa::pluck('nome', 'id');

        return view('app.contratos.edit', compact('contrato', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ContratoUpdateRequest $request,
        Contrato $contrato
    ): RedirectResponse {
        $this->authorize('update', $contrato);

        $validated = $request->validated();

        $contrato->update($validated);

        return redirect()
            ->route('contratos.edit', $contrato)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Contrato $contrato
    ): RedirectResponse {
        $this->authorize('delete', $contrato);

        $contrato->delete();

        return redirect()
            ->route('contratos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
