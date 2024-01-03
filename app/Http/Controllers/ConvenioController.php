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
            $inicioVigencia = $request->get('inicioVigencia', null);
            $fimVigencia = $request->get('fimVigencia', null);
            $virgenciaPrestacaoContas = $request->get('virgenciaPrestacaoContas', null);
            $orgaoId = $request->get('orgaoId', 0);


           // dd($virgencia);

             $convenios = Convenio::with('processo')->latest('id');

            /*  $convenios->when($virgencia, function ($q) use ($virgencia) {
                 $q->whereDate('virgencia',$virgencia);

               //  dd($q->get());
                });
 */

             //   dd($convenios->get());

                $convenios->when(request()->filled('numero'), function ($q) use ($numero) {
                    $q->where('numero', 'like', '%' . $numero . '%');
                });

               /*  $convenios->when((request()->filled('contratoId')), function ($q) use ($contratoId) {
                    $q->whereHas('contrato', function ($query) use ($contratoId) {
                        $query->where('id', $contratoId);
                    });
                });
                $convenios->when((request()->filled('orgaoId') && $orgaoId != 0), function ($q) use ($orgaoId) {
                    $q->whereHas('orgao', function ($query) use ($orgaoId) {
                        $query->where('id', $orgaoId);
                    });
                });
                    */
                //dd($convenios->paginate(20));
            return Inertia::render('Convenio/Index', [
                 'filtro' => compact('numero', 'inicioVigencia','fimVigencia', 'virgenciaPrestacaoContas',  'orgaoId'),
                 'convenios' => $convenios->paginate(20),
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
        $this->authorize('create', Convenio::class);

        $validated = $request->validated();

        $convenio = Convenio::create($validated);

        return redirect()
            ->route('convenios.edit', $convenio)
            ->withSuccess(__('crud.common.created'));
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
    public function edit(Request $request, Convenio $convenio): View
    {
        $this->authorize('update', $convenio);

        $contratos = Contrato::pluck('numero', 'id');
        $orgaos = Orgao::pluck('nome', 'id');

        return view(
            'app.convenios.edit',
            compact('convenio', 'contratos', 'orgaos')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ConvenioUpdateRequest $request,
        Convenio $convenio
    ): RedirectResponse {
        $this->authorize('update', $convenio);

        $validated = $request->validated();

        $convenio->update($validated);

        return redirect()
            ->route('convenios.edit', $convenio)
            ->withSuccess(__('crud.common.saved'));
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
