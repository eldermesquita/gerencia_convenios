<?php

namespace App\Http\Controllers\Api;

use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratoResource;
use App\Http\Resources\ContratoCollection;
use App\Http\Requests\ContratoStoreRequest;
use App\Http\Requests\ContratoUpdateRequest;

class ContratoController extends Controller
{
    public function index(Request $request): ContratoCollection
    {
        $this->authorize('view-any', Contrato::class);

        $search = $request->get('search', '');

        $contratos = Contrato::search($search)
            ->latest()
            ->paginate();

        return new ContratoCollection($contratos);
    }

    public function store(ContratoStoreRequest $request): ContratoResource
    {
        $this->authorize('create', Contrato::class);

        $validated = $request->validated();

        $contrato = Contrato::create($validated);

        return new ContratoResource($contrato);
    }

    public function show(Request $request, Contrato $contrato): ContratoResource
    {
        $this->authorize('view', $contrato);

        return new ContratoResource($contrato);
    }

    public function update(
        ContratoUpdateRequest $request,
        Contrato $contrato
    ): ContratoResource {
        $this->authorize('update', $contrato);

        $validated = $request->validated();

        $contrato->update($validated);

        return new ContratoResource($contrato);
    }

    public function destroy(Request $request, Contrato $contrato): Response
    {
        $this->authorize('delete', $contrato);

        $contrato->delete();

        return response()->noContent();
    }
}
