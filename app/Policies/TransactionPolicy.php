<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
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
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function view(User $user, Transaction $transaction)
    {
        return $user->id = $transaction->student_id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function transactions(User $user)
    {
        return $user->hasRole('administrator') || $user->hasRole('super-administrator') ||
            $user->hasRole('frontend-developer') || $user->hasRole('backend-developer');
    }

    //Show course that belongs to a particular transaction
    public function seeTransactionCourse(User $user, Transaction $transaction)
    {
        return $user->id == $transaction->student_id || $user->id ==  $transaction->instructor_id;
    }

    //Show instructor that belongs to a particular transaction
    public function seeTransactionInstructor(User $user, Transaction $transaction)
    {
        return $user->id == $transaction->student_id || $user->id ==  $transaction->instructor_id;
    }

    //Show student that belongs to a particular transaction
    public function seeTransactionStudent(User $user, Transaction $transaction)
    {
        return $user->id == $transaction->student_id || $user->id ==  $transaction->instructor_id;
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
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function update(User $user, Transaction $transaction)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function delete(User $user, Transaction $transaction)
    {
        return $user->id = $transaction->student_id;
    }



    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transaction  $transaction
     * @return mixed
     */
    public function forceDelete(User $user, Transaction $transaction)
    {
        //
    }
}
