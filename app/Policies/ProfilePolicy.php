<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->authorizeResource(Profile::class,'profile');
    }

    public function update(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id or $user->isAdmin()
                ? Response::allow()
                : Response::deny('این پروفایل متعلق به شما نیست !');
    }

    public function delete(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id
            ? Response::allow()
            : Response::deny('این پروفایل متعلق به شما نیست !');
    }

}
