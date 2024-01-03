<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Processo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the processo can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list processos');
    }

    /**
     * Determine whether the processo can view the model.
     */
    public function view(Usuario $usuario, Processo $model): bool
    {
        return $usuario->hasPermissionTo('view processos');
    }

    /**
     * Determine whether the processo can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create processos');
    }

    /**
     * Determine whether the processo can update the model.
     */
    public function update(Usuario $usuario, Processo $model): bool
    {
        return $usuario->hasPermissionTo('update processos');
    }

    /**
     * Determine whether the processo can delete the model.
     */
    public function delete(Usuario $usuario, Processo $model): bool
    {
        return $usuario->hasPermissionTo('delete processos');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete processos');
    }

    /**
     * Determine whether the processo can restore the model.
     */
    public function restore(Usuario $usuario, Processo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the processo can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Processo $model): bool
    {
        return false;
    }
}
