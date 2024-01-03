<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Modalidade;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModalidadePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modalidade can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list modalidades');
    }

    /**
     * Determine whether the modalidade can view the model.
     */
    public function view(Usuario $usuario, Modalidade $model): bool
    {
        return $usuario->hasPermissionTo('view modalidades');
    }

    /**
     * Determine whether the modalidade can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create modalidades');
    }

    /**
     * Determine whether the modalidade can update the model.
     */
    public function update(Usuario $usuario, Modalidade $model): bool
    {
        return $usuario->hasPermissionTo('update modalidades');
    }

    /**
     * Determine whether the modalidade can delete the model.
     */
    public function delete(Usuario $usuario, Modalidade $model): bool
    {
        return $usuario->hasPermissionTo('delete modalidades');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete modalidades');
    }

    /**
     * Determine whether the modalidade can restore the model.
     */
    public function restore(Usuario $usuario, Modalidade $model): bool
    {
        return false;
    }

    /**
     * Determine whether the modalidade can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Modalidade $model): bool
    {
        return false;
    }
}
