<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Barangmasuk;
use Illuminate\Auth\Access\HandlesAuthorization;

class BarangmasukPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the barangmasuk can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the barangmasuk can view the model.
     */
    public function view(User $user, Barangmasuk $model): bool
    {
        return true;
    }

    /**
     * Determine whether the barangmasuk can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the barangmasuk can update the model.
     */
    public function update(User $user, Barangmasuk $model): bool
    {
        return true;
    }

    /**
     * Determine whether the barangmasuk can delete the model.
     */
    public function delete(User $user, Barangmasuk $model): bool
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
     * Determine whether the barangmasuk can restore the model.
     */
    public function restore(User $user, Barangmasuk $model): bool
    {
        return false;
    }

    /**
     * Determine whether the barangmasuk can permanently delete the model.
     */
    public function forceDelete(User $user, Barangmasuk $model): bool
    {
        return false;
    }
}
