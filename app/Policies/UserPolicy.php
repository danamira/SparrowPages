<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function promote(User $admin, User $user)
    {
        if ($admin->id !== $user->id and $admin->role == 'superAdmin' and !$user->banned) {
            if ($user->role !== 'admin') {
                return Response::allow();
            }
        }
        return Response::deny('شما دسترسی انجام این تغییر را ندارید .');
    }

    public function depose(User $admin, User $user)
    {
        if ($user->isAdmin()) {
            if ($admin->id !== $user->id and $admin->role == 'superAdmin') {
                return Response::allow();
            }
        }
        return Response::deny('شما دسترسی انجام این تغییر را ندارید .');
    }

    public function delete(User $admin, User $user)
    {
        if ($admin->role == 'superAdmin' and $user->id !== $admin->id) {
            return Response::allow();
        }
        if ($admin->role == 'admin') {
            if ($user->role !== 'admin' and $user->role !== 'superAdmin' and $admin->id !== !$user->id) {
                return Response::allow();
            }
        }
        return Response::deny('شما دسترسی انجام این تغییر را ندارید .');
    }

    public function ban(User $admin, User $user)
    {
        if ($admin->role == 'superAdmin') {
            if ($user->id !== $admin->id and !$user->banned) {
                return Response::allow();
            }
        }
        if ($admin->role == 'admin') {
            if ($user->id !== $admin->id and !$user->banned and !$user->isAdmin()) {
                return Response::allow();
            }
        }
        Response::deny('شما دسترسی انجام این تغییر را ندارید !');

    }

    //@todo ban logic and policies
}
