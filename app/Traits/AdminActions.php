<?php


namespace App\Traits;

trait AdminActions
{
    /*
     *  Api response codes
     * ----------------------
     *  200 means response OK
     *  201 means data created
     */
    public function before($user, $ability)
    {
        if ($user->hasRole('administrator') || $user->hasRole('super-administrator') ||
            $user->hasRole('frontend-developer') || $user->hasRole('developer')){
            return true;
        }
    }
}
