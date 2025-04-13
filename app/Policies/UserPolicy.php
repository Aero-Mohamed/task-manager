<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $targetUser): bool
    {
        return $user->can('view_user') || $this->viewAny($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $targetUser): bool
    {
        return $user->can('update_user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $targetUser): bool
    {
        return !$targetUser->hasRole(['Super Admin'])
            && ($user->can('delete_user') || $this->deleteAny($user));
    }

    /**
     * Determine whether the User can bulk delete.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $targetUser): bool
    {
        return $user->can('force_delete_user') || $this->forceDeleteAny($user);
    }

    /**
     * Determine whether the User can permanently bulk delete.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_user');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $targetUser): bool
    {
        return $user->can('restore_user') || $this->restoreAny($user);
    }

    /**
     * Determine whether the User can bulk restore.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_user');
    }

    /**
     * Determine whether the User can replicate.
     *
     * @param User $user
     * @param User $targetUser
     * @return bool
     */
    public function replicate(User $user, User $targetUser): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the User can reorder.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
