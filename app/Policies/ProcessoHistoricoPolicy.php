<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\ProcessoHistorico;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessoHistoricoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the processoHistorico can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list processohistoricos');
    }

    /**
     * Determine whether the processoHistorico can view the model.
     */
    public function view(Usuario $usuario, ProcessoHistorico $model): bool
    {
        return $usuario->hasPermissionTo('view processohistoricos');
    }

    /**
     * Determine whether the processoHistorico can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create processohistoricos');
    }

    /**
     * Determine whether the processoHistorico can update the model.
     */
    public function update(Usuario $usuario, ProcessoHistorico $model): bool
    {
        return $usuario->hasPermissionTo('update processohistoricos');
    }

    /**
     * Determine whether the processoHistorico can delete the model.
     */
    public function delete(Usuario $usuario, ProcessoHistorico $model): bool
    {
        return $usuario->hasPermissionTo('delete processohistoricos');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete processohistoricos');
    }

    /**
     * Determine whether the processoHistorico can restore the model.
     */
    public function restore(Usuario $usuario, ProcessoHistorico $model): bool
    {
        return false;
    }

    /**
     * Determine whether the processoHistorico can permanently delete the model.
     */
    public function forceDelete(
        Usuario $usuario,
        ProcessoHistorico $model
    ): bool {
        return false;
    }
}
