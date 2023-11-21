<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Convenio;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConvenioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the convenio can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list convenios');
    }

    /**
     * Determine whether the convenio can view the model.
     */
    public function view(User $user, Convenio $model): bool
    {
        return $user->hasPermissionTo('view convenios');
    }

    /**
     * Determine whether the convenio can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create convenios');
    }

    /**
     * Determine whether the convenio can update the model.
     */
    public function update(User $user, Convenio $model): bool
    {
        return $user->hasPermissionTo('update convenios');
    }

    /**
     * Determine whether the convenio can delete the model.
     */
    public function delete(User $user, Convenio $model): bool
    {
        return $user->hasPermissionTo('delete convenios');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete convenios');
    }

    /**
     * Determine whether the convenio can restore the model.
     */
    public function restore(User $user, Convenio $model): bool
    {
        return false;
    }

    /**
     * Determine whether the convenio can permanently delete the model.
     */
    public function forceDelete(User $user, Convenio $model): bool
    {
        return false;
    }
}
