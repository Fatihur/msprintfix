<?php

namespace App\Policies;

use App\Models\Wa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the wa can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the wa can view the model.
     */
    public function view(User $user, Wa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the wa can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the wa can update the model.
     */
    public function update(User $user, Wa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the wa can delete the model.
     */
    public function delete(User $user, Wa $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the wa can restore the model.
     */
    public function restore(User $user, Wa $model): bool
    {
        return false;
    }

    /**
     * Determine whether the wa can permanently delete the model.
     */
    public function forceDelete(User $user, Wa $model): bool
    {
        return false;
    }
}
