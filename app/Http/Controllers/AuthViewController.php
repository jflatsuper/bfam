<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthViewController extends Controller
{
    public function signIn(){
        return view('livewire.auth.pages.sign-in-page');
    }

    public function studentRegistration(){
        return view('livewire.auth.pages.sign-up-page');
    }

    public function signOut(){
        Auth::logout();
        return view('livewire.auth.pages.sign-in-page');
    }


}
