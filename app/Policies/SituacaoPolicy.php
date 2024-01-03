<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Situacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class SituacaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the situacao can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list situacoes');
    }

    /**
     * Determine whether the situacao can view the model.
     */
    public function view(Usuario $usuario, Situacao $model): bool
    {
        return $usuario->hasPermissionTo('view situacoes');
    }

    /**
     * Determine whether the situacao can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create situacoes');
    }

    /**
     * Determine whether the situacao can update the model.
     */
    public function update(Usuario $usuario, Situacao $model): bool
    {
        return $usuario->hasPermissionTo('update situacoes');
    }

    /**
     * Determine whether the situacao can delete the model.
     */
    public function delete(Usuario $usuario, Situacao $model): bool
    {
        return $usuario->hasPermissionTo('delete situacoes');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete situacoes');
    }

    /**
     * Determine whether the situacao can restore the model.
     */
    public function restore(Usuario $usuario, Situacao $model): bool
    {
        return false;
    }

    /**
     * Determine whether the situacao can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Situacao $model): bool
    {
        return false;
    }
}
