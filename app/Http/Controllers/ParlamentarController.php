<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Parlamentar;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ParlamentarStoreRequest;
use App\Http\Requests\ParlamentarUpdateRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ParlamentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Parlamentar::class);

        $search = $request->get('search', '');

        $parlamentares = Parlamentar::search($search)
            ->latest('id')
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.parlamentares.index',
            compact('parlamentares', 'search')
        );
    }
    /**
     * List the specified resource.
     */
    public function lista(): JsonResponse
    {
        try {
            $parlamentar = Parlamentar::all();

            if ($parlamentar->count() <= 0) {
                $parlamentar = null;
            }
            return response()->json($parlamentar, Response::HTTP_OK);
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
        $this->authorize('create', Parlamentar::class);

        return view('app.parlamentares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParlamentarStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Parlamentar::class);

        $validated = $request->validated();

        $parlamentar = Parlamentar::create($validated);

        return redirect()
            ->route('parlamentares.edit', $parlamentar)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Parlamentar $parlamentar): View
    {
        $this->authorize('view', $parlamentar);

        return view('app.parlamentares.show', compact('parlamentar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Parlamentar $parlamentar): View
    {
        $this->authorize('update', $parlamentar);

        return view('app.parlamentares.edit', compact('parlamentar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ParlamentarUpdateRequest $request,
        Parlamentar $parlamentar
    ): RedirectResponse {
        $this->authorize('update', $parlamentar);

        $validated = $request->validated();

        $parlamentar->update($validated);

        return redirect()
            ->route('parlamentares.edit', $parlamentar)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Parlamentar $parlamentar
    ): RedirectResponse {
        $this->authorize('delete', $parlamentar);

        $parlamentar->delete();

        return redirect()
            ->route('parlamentares.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
