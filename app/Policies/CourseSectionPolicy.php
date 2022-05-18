<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\User;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseSectionPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @param Course $course
     * @return mixed
     */
    public function create(User $user, Course $course)
    {
        return $user->id == $course->instructor_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSection  $courseSection
     * @return mixed
     */
    public function update(User $user, CourseSection $courseSection)
    {
        return $user->id == $courseSection->course()->instructor_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseSection  $courseSection
     * @return mixed
     */
    public function delete(User $user, CourseSection $courseSection)
    {
        return $user->id == $courseSection->course()->instructor_id;
    }

}
