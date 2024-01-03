<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Contrato;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contrato can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list contratos');
    }

    /**
     * Determine whether the contrato can view the model.
     */
    public function view(Usuario $usuario, Contrato $model): bool
    {
        return $usuario->hasPermissionTo('view contratos');
    }

    /**
     * Determine whether the contrato can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create contratos');
    }

    /**
     * Determine whether the contrato can update the model.
     */
    public function update(Usuario $usuario, Contrato $model): bool
    {
        return $usuario->hasPermissionTo('update contratos');
    }

    /**
     * Determine whether the contrato can delete the model.
     */
    public function delete(Usuario $usuario, Contrato $model): bool
    {
        return $usuario->hasPermissionTo('delete contratos');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete contratos');
    }

    /**
     * Determine whether the contrato can restore the model.
     */
    public function restore(Usuario $usuario, Contrato $model): bool
    {
        return false;
    }

    /**
     * Determine whether the contrato can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Contrato $model): bool
    {
        return false;
    }
}
