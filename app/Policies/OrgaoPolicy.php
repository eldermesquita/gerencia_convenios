<?php

namespace App\Policies;

use App\Models\Orgao;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrgaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the orgao can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list orgaos');
    }

    /**
     * Determine whether the orgao can view the model.
     */
    public function view(Usuario $usuario, Orgao $model): bool
    {
        return $usuario->hasPermissionTo('view orgaos');
    }

    /**
     * Determine whether the orgao can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create orgaos');
    }

    /**
     * Determine whether the orgao can update the model.
     */
    public function update(Usuario $usuario, Orgao $model): bool
    {
        return $usuario->hasPermissionTo('update orgaos');
    }

    /**
     * Determine whether the orgao can delete the model.
     */
    public function delete(Usuario $usuario, Orgao $model): bool
    {
        return $usuario->hasPermissionTo('delete orgaos');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete orgaos');
    }

    /**
     * Determine whether the orgao can restore the model.
     */
    public function restore(Usuario $usuario, Orgao $model): bool
    {
        return false;
    }

    /**
     * Determine whether the orgao can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Orgao $model): bool
    {
        return false;
    }
}
