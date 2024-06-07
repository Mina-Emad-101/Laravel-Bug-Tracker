<?php

namespace App\Policies;

use App\Models\Bug;
use App\Models\User;

class BugPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function show(User $user, Bug $bug): bool
    {
        return $user->role_id == 1
        || $bug->reporter->is($user)
        || $bug->assigned_staff?->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id == 3;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bug $bug): bool
    {
        return $user->role_id == 1
            || $bug->assigned_staff?->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Bug $bug): bool
    {
        return $bug->reporter->is($user);
    }
}
