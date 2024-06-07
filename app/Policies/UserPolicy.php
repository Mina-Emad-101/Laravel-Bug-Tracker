<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function show(User $user, User $objectUser): bool
    {
        return $user->role_id == 1
            || $user->is($objectUser);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        return $user?->role_id == 1
            || Auth::guest();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $objectUser): bool
    {
        return $user->role_id == 1
            || $user->is($objectUser);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, User $objectUser): bool
    {
        return $user->role_id == 1;
    }
}
