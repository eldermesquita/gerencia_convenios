<?php

namespace App\Http\Controllers;

use App\Models\Orgao;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OrgaoStoreRequest;
use App\Http\Requests\OrgaoUpdateRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrgaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Orgao::class);

        $search = $request->get('search', '');

        $orgaos = Orgao::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view('app.orgaos.index', compact('orgaos', 'search'));
    }
 /**
     * List the specified resource.
     */
    public function lista() : JsonResponse
    {
        try {
            $contrato = Orgao::all();

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
        $this->authorize('create', Orgao::class);

        return view('app.orgaos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrgaoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Orgao::class);

        $validated = $request->validated();

        $orgao = Orgao::create($validated);

        return redirect()
            ->route('orgaos.edit', $orgao)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Orgao $orgao): View
    {
        $this->authorize('view', $orgao);

        return view('app.orgaos.show', compact('orgao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Orgao $orgao): View
    {
        $this->authorize('update', $orgao);

        return view('app.orgaos.edit', compact('orgao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        OrgaoUpdateRequest $request,
        Orgao $orgao
    ): RedirectResponse {
        $this->authorize('update', $orgao);

        $validated = $request->validated();

        $orgao->update($validated);

        return redirect()
            ->route('orgaos.edit', $orgao)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Orgao $orgao): RedirectResponse
    {
        $this->authorize('delete', $orgao);

        $orgao->delete();

        return redirect()
            ->route('orgaos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
