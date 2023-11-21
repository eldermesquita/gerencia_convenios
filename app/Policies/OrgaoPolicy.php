<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Orgao;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrgaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the orgao can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list orgaos');
    }

    /**
     * Determine whether the orgao can view the model.
     */
    public function view(User $user, Orgao $model): bool
    {
        return $user->hasPermissionTo('view orgaos');
    }

    /**
     * Determine whether the orgao can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create orgaos');
    }

    /**
     * Determine whether the orgao can update the model.
     */
    public function update(User $user, Orgao $model): bool
    {
        return $user->hasPermissionTo('update orgaos');
    }

    /**
     * Determine whether the orgao can delete the model.
     */
    public function delete(User $user, Orgao $model): bool
    {
        return $user->hasPermissionTo('delete orgaos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete orgaos');
    }

    /**
     * Determine whether the orgao can restore the model.
     */
    public function restore(User $user, Orgao $model): bool
    {
        return false;
    }

    /**
     * Determine whether the orgao can permanently delete the model.
     */
    public function forceDelete(User $user, Orgao $model): bool
    {
        return false;
    }
}
