<?php

namespace App\Http\Controllers;

use App\Models\Orgao;
use App\Models\Convenio;
use App\Models\Contrato;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ConvenioStoreRequest;
use App\Http\Requests\ConvenioUpdateRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            $this->authorize('view-any', Convenio::class);

            $numero = $request->get('numero', null);
            $numeroProcesso = $request->get('numeroProcesso', null);
            $inicioVigencia = $request->get('inicioVigencia', null);
            $fimVigencia = $request->get('fimVigencia', null);
            // $virgenciaPrestacaoContas = $request->get('virgenciaPrestacaoContas', null);
            $orgaoId = $request->get('orgaoId', 0);


            $convenios = Convenio::with('processo.orgao','parlamentar')->latest('id');

            $convenios->when(request()->filled('inicioVigencia'), function ($q) use ($inicioVigencia) {
                $q->whereDate('inicio_vigencia', $inicioVigencia);
            });
            $convenios->when(request()->filled('fimVigencia'), function ($q) use ($fimVigencia) {
                $q->whereDate('fim_vigencia', $fimVigencia);
            });

            $convenios->when(request()->filled('numero'), function ($q) use ($numero) {
                $q->where('numero', 'like', '%' . $numero . '%');
            });

            /*  $convenios->when(request()->filled('objeto'), function ($q) use ($objeto) {
                $q->where('objeto', 'like', '%' . $objeto . '%');
            }); */

            $convenios->when((request()->filled('orgaoId') && $orgaoId != 0), function ($q) use ($orgaoId) {
                $q->whereHas('processo', function ($query) use ($orgaoId) {
                    $query->where('orgao_id', $orgaoId);
                });
            });
            $convenios->when(request()->filled('numeroProcesso'), function ($q) use ($numeroProcesso) {
                $q->whereHas('processo', function ($query) use ($numeroProcesso) {
                    $query->where('numero', $numeroProcesso);
                });
            });

            return Inertia::render('Convenio/Index', [
                'filtro' => compact(
                    'numeroProcesso',
                    'numero',
                    'inicioVigencia',
                    'fimVigencia',
                    'orgaoId'
                    //'virgenciaPrestacaoContas',
                ),
                'convenios' => $convenios->paginate(10),
            ]);
        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $this->authorize('create', Convenio::class);

            $contratos = Contrato::pluck('numero', 'id');
            $orgaos = Orgao::pluck('nome', 'id');

            return Inertia::render('Convenio/Create', ['contratos' => $contratos, 'orgaos' => $orgaos]);
        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConvenioStoreRequest $request): RedirectResponse
    {

        try {

            $this->authorize('create', Convenio::class);

            $validated = $request->validated();

            $convenio = Convenio::create($validated);

            return redirect()
                ->route('convenios.edit', $convenio)
                ->withSuccess(__('crud.common.created'));
        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Convenio $convenio): View
    {
        $this->authorize('view', $convenio);

        return view('app.convenios.show', compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Convenio $convenio)
    {
        try {
            $this->authorize('update', $convenio);
            $convenios = Convenio::with('processo')->where('id',$request->convenio->id)->get();
            return Inertia::render('Convenio/Create', ['convenios' => $convenios[0]]);

        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ConvenioUpdateRequest $request,
        Convenio $convenio
    ): RedirectResponse {

        try {

            $this->authorize('update', $convenio);
            $validated = $request->validated();
            $convenio->update($validated);

            return redirect()
                ->route('convenios.edit', $convenio)
                ->withSuccess(__('crud.common.saved'));
        } catch (Exception $e) {
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Convenio $convenio): RedirectResponse
    {

        try {
            // ### Inicia uma transação
            DB::beginTransaction();
            $this->authorize('delete', $convenio);
            $convenio = Convenio::find($request->id);
            $convenio->forceDelete();
            DB::commit();

            return back()->withSuccess(__('crud.common.removed'));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('danger', $e->getMessage());
            return back()->withErrors('danger', $e->getMessage());
        }
    }
}
