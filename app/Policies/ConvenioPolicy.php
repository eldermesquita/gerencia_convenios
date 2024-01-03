<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Convenio;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConvenioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the convenio can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list convenios');
    }

    /**
     * Determine whether the convenio can view the model.
     */
    public function view(Usuario $usuario, Convenio $model): bool
    {
        return $usuario->hasPermissionTo('view convenios');
    }

    /**
     * Determine whether the convenio can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create convenios');
    }

    /**
     * Determine whether the convenio can update the model.
     */
    public function update(Usuario $usuario, Convenio $model): bool
    {
        return $usuario->hasPermissionTo('update convenios');
    }

    /**
     * Determine whether the convenio can delete the model.
     */
    public function delete(Usuario $usuario, Convenio $model): bool
    {
        return $usuario->hasPermissionTo('delete convenios');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete convenios');
    }

    /**
     * Determine whether the convenio can restore the model.
     */
    public function restore(Usuario $usuario, Convenio $model): bool
    {
        return false;
    }

    /**
     * Determine whether the convenio can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Convenio $model): bool
    {
        return false;
    }
}
