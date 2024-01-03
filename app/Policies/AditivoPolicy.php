<?php

namespace App\Policies;

use App\Models\Aditivo;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class AditivoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the aditivo can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list aditivos');
    }

    /**
     * Determine whether the aditivo can view the model.
     */
    public function view(Usuario $usuario, Aditivo $model): bool
    {
        return $usuario->hasPermissionTo('view aditivos');
    }

    /**
     * Determine whether the aditivo can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create aditivos');
    }

    /**
     * Determine whether the aditivo can update the model.
     */
    public function update(Usuario $usuario, Aditivo $model): bool
    {
        return $usuario->hasPermissionTo('update aditivos');
    }

    /**
     * Determine whether the aditivo can delete the model.
     */
    public function delete(Usuario $usuario, Aditivo $model): bool
    {
        return $usuario->hasPermissionTo('delete aditivos');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete aditivos');
    }

    /**
     * Determine whether the aditivo can restore the model.
     */
    public function restore(Usuario $usuario, Aditivo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the aditivo can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Aditivo $model): bool
    {
        return false;
    }
}
