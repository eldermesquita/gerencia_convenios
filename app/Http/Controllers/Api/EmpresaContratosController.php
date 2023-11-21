<?php

namespace App\Http\Controllers\Api;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContratoResource;
use App\Http\Resources\ContratoCollection;

class EmpresaContratosController extends Controller
{
    public function index(
        Request $request,
        Empresa $empresa
    ): ContratoCollection {
        $this->authorize('view', $empresa);

        $search = $request->get('search', '');

        $contratos = $empresa
            ->contratos()
            ->search($search)
            ->latest()
            ->paginate();

        return new ContratoCollection($contratos);
    }

    public function store(Request $request, Empresa $empresa): ContratoResource
    {
        $this->authorize('create', Contrato::class);

        $validated = $request->validate([
            'numero' => ['required', 'max:255', 'string'],
            'numero_processo' => ['required', 'max:15', 'string'],
            'virgencia' => ['required', 'date'],
            'virgencia_execucao' => ['required', 'date'],
            'valor' => ['required', 'numeric'],
            'modalidade' => [
                'required',
                'in:concorrência,convite,tomada de preço,concurso,pregão,leilão',
            ],
        ]);

        $contrato = $empresa->contratos()->create($validated);

        return new ContratoResource($contrato);
    }
}
