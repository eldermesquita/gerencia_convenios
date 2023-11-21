<?php

namespace App\Http\Controllers\Api;

use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConvenioResource;
use App\Http\Resources\ConvenioCollection;

class ContratoConveniosController extends Controller
{
    public function index(
        Request $request,
        Contrato $contrato
    ): ConvenioCollection {
        $this->authorize('view', $contrato);

        $search = $request->get('search', '');

        $convenios = $contrato
            ->convenios()
            ->search($search)
            ->latest()
            ->paginate();

        return new ConvenioCollection($convenios);
    }

    public function store(
        Request $request,
        Contrato $contrato
    ): ConvenioResource {
        $this->authorize('create', Convenio::class);

        $validated = $request->validate([
            'numero' => ['required', 'max:50', 'string'],
            'numero_processo_sei' => ['required', 'max:30', 'string'],
            'virgencia' => ['required', 'date'],
            'valor_repasse' => ['required', 'numeric'],
            'valor_contra_partida' => ['required', 'numeric'],
            'valor_total' => ['required', 'numeric'],
            'valor_liberado_concedente' => ['numeric'],
            'valor_pago' => ['numeric'],
            'valor_liberado' => ['numeric'],
            'objeto' => ['required', 'string'],
        ]);

        $convenio = $contrato->convenios()->create($validated);

        return new ConvenioResource($convenio);
    }
}
