<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Categria;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the categria can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list categrias');
    }

    /**
     * Determine whether the categria can view the model.
     */
    public function view(Usuario $usuario, Categria $model): bool
    {
        return $usuario->hasPermissionTo('view categrias');
    }

    /**
     * Determine whether the categria can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create categrias');
    }

    /**
     * Determine whether the categria can update the model.
     */
    public function update(Usuario $usuario, Categria $model): bool
    {
        return $usuario->hasPermissionTo('update categrias');
    }

    /**
     * Determine whether the categria can delete the model.
     */
    public function delete(Usuario $usuario, Categria $model): bool
    {
        return $usuario->hasPermissionTo('delete categrias');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete categrias');
    }

    /**
     * Determine whether the categria can restore the model.
     */
    public function restore(Usuario $usuario, Categria $model): bool
    {
        return false;
    }

    /**
     * Determine whether the categria can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Categria $model): bool
    {
        return false;
    }
}
