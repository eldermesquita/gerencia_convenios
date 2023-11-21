<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contrato;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contrato can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list contratos');
    }

    /**
     * Determine whether the contrato can view the model.
     */
    public function view(User $user, Contrato $model): bool
    {
        return $user->hasPermissionTo('view contratos');
    }

    /**
     * Determine whether the contrato can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create contratos');
    }

    /**
     * Determine whether the contrato can update the model.
     */
    public function update(User $user, Contrato $model): bool
    {
        return $user->hasPermissionTo('update contratos');
    }

    /**
     * Determine whether the contrato can delete the model.
     */
    public function delete(User $user, Contrato $model): bool
    {
        return $user->hasPermissionTo('delete contratos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete contratos');
    }

    /**
     * Determine whether the contrato can restore the model.
     */
    public function restore(User $user, Contrato $model): bool
    {
        return false;
    }

    /**
     * Determine whether the contrato can permanently delete the model.
     */
    public function forceDelete(User $user, Contrato $model): bool
    {
        return false;
    }
}
