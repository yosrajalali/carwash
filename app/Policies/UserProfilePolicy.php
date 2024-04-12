<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    use HandlesAuthorization;

    public function update(User $user, User $profileUser)
    {
        return $user->id === $profileUser->id;
    }
}
