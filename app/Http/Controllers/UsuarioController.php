<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Usuario::class);

        $search = $request->get('search', '');

        $usuarios = Usuario::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.usuarios.index', compact('usuarios', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Usuario::class);

        $roles = Role::get();

        return view('app.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Usuario::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $usuario = Usuario::create($validated);

        $usuario->syncRoles($request->roles);

        return redirect()
            ->route('usuarios.edit', $usuario)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Usuario $usuario): View
    {
        $this->authorize('view', $usuario);

        return view('app.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Usuario $usuario): View
    {
        $this->authorize('update', $usuario);

        $roles = Role::get();

        return view('app.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UsuarioUpdateRequest $request,
        Usuario $usuario
    ): RedirectResponse {
        $this->authorize('update', $usuario);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $usuario->update($validated);

        $usuario->syncRoles($request->roles);

        return redirect()
            ->route('usuarios.edit', $usuario)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Usuario $usuario
    ): RedirectResponse {
        $this->authorize('delete', $usuario);

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
