<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Aditivo;
use Illuminate\Auth\Access\HandlesAuthorization;

class AditivoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the aditivo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list aditivos');
    }

    /**
     * Determine whether the aditivo can view the model.
     */
    public function view(User $user, Aditivo $model): bool
    {
        return $user->hasPermissionTo('view aditivos');
    }

    /**
     * Determine whether the aditivo can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create aditivos');
    }

    /**
     * Determine whether the aditivo can update the model.
     */
    public function update(User $user, Aditivo $model): bool
    {
        return $user->hasPermissionTo('update aditivos');
    }

    /**
     * Determine whether the aditivo can delete the model.
     */
    public function delete(User $user, Aditivo $model): bool
    {
        return $user->hasPermissionTo('delete aditivos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete aditivos');
    }

    /**
     * Determine whether the aditivo can restore the model.
     */
    public function restore(User $user, Aditivo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the aditivo can permanently delete the model.
     */
    public function forceDelete(User $user, Aditivo $model): bool
    {
        return false;
    }
}
