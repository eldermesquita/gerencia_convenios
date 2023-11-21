<?php

namespace App\Http\Controllers\Api;

use App\Models\Convenio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConvenioResource;
use App\Http\Resources\ConvenioCollection;
use App\Http\Requests\ConvenioStoreRequest;
use App\Http\Requests\ConvenioUpdateRequest;

class ConvenioController extends Controller
{
    public function index(Request $request): ConvenioCollection
    {
        $this->authorize('view-any', Convenio::class);

        $search = $request->get('search', '');

        $convenios = Convenio::search($search)
            ->latest()
            ->paginate();

        return new ConvenioCollection($convenios);
    }

    public function store(ConvenioStoreRequest $request): ConvenioResource
    {
        $this->authorize('create', Convenio::class);

        $validated = $request->validated();

        $convenio = Convenio::create($validated);

        return new ConvenioResource($convenio);
    }

    public function show(Request $request, Convenio $convenio): ConvenioResource
    {
        $this->authorize('view', $convenio);

        return new ConvenioResource($convenio);
    }

    public function update(
        ConvenioUpdateRequest $request,
        Convenio $convenio
    ): ConvenioResource {
        $this->authorize('update', $convenio);

        $validated = $request->validated();

        $convenio->update($validated);

        return new ConvenioResource($convenio);
    }

    public function destroy(Request $request, Convenio $convenio): Response
    {
        $this->authorize('delete', $convenio);

        $convenio->delete();

        return response()->noContent();
    }
}
