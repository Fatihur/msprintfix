<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Penjualandetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenjualandetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the penjualandetail can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the penjualandetail can view the model.
     */
    public function view(User $user, Penjualandetail $model): bool
    {
        return true;
    }

    /**
     * Determine whether the penjualandetail can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the penjualandetail can update the model.
     */
    public function update(User $user, Penjualandetail $model): bool
    {
        return true;
    }

    /**
     * Determine whether the penjualandetail can delete the model.
     */
    public function delete(User $user, Penjualandetail $model): bool
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
     * Determine whether the penjualandetail can restore the model.
     */
    public function restore(User $user, Penjualandetail $model): bool
    {
        return false;
    }

    /**
     * Determine whether the penjualandetail can permanently delete the model.
     */
    public function forceDelete(User $user, Penjualandetail $model): bool
    {
        return false;
    }
}
