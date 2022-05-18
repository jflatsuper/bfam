<?php

namespace App\Policies;

use App\Models\Instructor;
use App\Models\User;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class InstructorPolicy
{
    use HandlesAuthorization, AdminActions;

    public function index(User $user)
    {
        $user->hasPermission('');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function view(User $user, Instructor $instructor)
    {

    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function update(User $user, Instructor $instructor)
    {
        return $user->id == $instructor->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function delete(User $user, Instructor $instructor)
    {
        return $user->id == $instructor->user_id;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function instructor(User $user, Instructor $instructor)
    {
        return $user->id == $instructor->user_id;
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function restore(User $user, Instructor $instructor)
    {
        return $user->id == $instructor->user_id|| $user->hasRole('administrator') ||
            $user->hasRole('super-administrator') || $user->hasRole('frontend-developer')
            || $user->hasRole('backend-developer');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Instructor  $instructor
     * @return mixed
     */
    public function forceDelete(User $user, Instructor $instructor)
    {
        return $user->hasRole('administrator') || $user->hasRole('super-administrator') ||
               $user->hasRole('backend-developer');
    }
}
