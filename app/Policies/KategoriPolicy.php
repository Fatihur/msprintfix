<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the kategori can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the kategori can view the model.
     */
    public function view(User $user, Kategori $model): bool
    {
        return true;
    }

    /**
     * Determine whether the kategori can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the kategori can update the model.
     */
    public function update(User $user, Kategori $model): bool
    {
        return true;
    }

    /**
     * Determine whether the kategori can delete the model.
     */
    public function delete(User $user, Kategori $model): bool
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
     * Determine whether the kategori can restore the model.
     */
    public function restore(User $user, Kategori $model): bool
    {
        return false;
    }

    /**
     * Determine whether the kategori can permanently delete the model.
     */
    public function forceDelete(User $user, Kategori $model): bool
    {
        return false;
    }
}
