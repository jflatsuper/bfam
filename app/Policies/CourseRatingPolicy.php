<?php

namespace App\Policies;

use App\Models\CourseRating;
use App\Models\User;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseRatingPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseRating  $courseRating
     * @return mixed
     */
    public function view(User $user, CourseRating $courseRating)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('student');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseRating  $courseRating
     * @return mixed
     */
    public function update(User $user, CourseRating $courseRating)
    {
        return $user->id == $courseRating->student_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseRating  $courseRating
     * @return mixed
     */
    public function delete(User $user, CourseRating $courseRating)
    {
        return $user->id == $courseRating->student_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseRating  $courseRating
     * @return mixed
     */
    public function restore(User $user, CourseRating $courseRating)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseRating  $courseRating
     * @return mixed
     */
    public function forceDelete(User $user, CourseRating $courseRating)
    {
        //
    }
}
