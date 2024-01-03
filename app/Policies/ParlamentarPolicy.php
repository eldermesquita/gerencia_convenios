<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Parlamentar;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParlamentarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the parlamentar can view any models.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('list parlamentares');
    }

    /**
     * Determine whether the parlamentar can view the model.
     */
    public function view(Usuario $usuario, Parlamentar $model): bool
    {
        return $usuario->hasPermissionTo('view parlamentares');
    }

    /**
     * Determine whether the parlamentar can create models.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('create parlamentares');
    }

    /**
     * Determine whether the parlamentar can update the model.
     */
    public function update(Usuario $usuario, Parlamentar $model): bool
    {
        return $usuario->hasPermissionTo('update parlamentares');
    }

    /**
     * Determine whether the parlamentar can delete the model.
     */
    public function delete(Usuario $usuario, Parlamentar $model): bool
    {
        return $usuario->hasPermissionTo('delete parlamentares');
    }

    /**
     * Determine whether the usuario can delete multiple instances of the model.
     */
    public function deleteAny(Usuario $usuario): bool
    {
        return $usuario->hasPermissionTo('delete parlamentares');
    }

    /**
     * Determine whether the parlamentar can restore the model.
     */
    public function restore(Usuario $usuario, Parlamentar $model): bool
    {
        return false;
    }

    /**
     * Determine whether the parlamentar can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Parlamentar $model): bool
    {
        return false;
    }
}
