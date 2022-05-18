<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentRegister extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $country;
    public $phone;
    public $terms;

    public function updated($field){
        $this->validateOnly($field, [
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users',
            'country'       => 'required|string|max:255',
            'phone'         => 'required|numeric',
            'terms'         => 'required',
        ]);
    }


    public function register(){
        $this->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users',
            'country'       => 'required|string|max:255',
            'phone'         => 'required|numeric',
            'terms'         => 'required',
        ]);


      $user =  User::create([
           'first_name'    => $this->first_name,
           'last_name'      => $this->last_name,
           'email'          => $this->email,
           'country'        => $this->country,
           'phone'          => $this->phone
        ]);

        $user->attachRole('student');
        $this->reset();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Registration successful']);
    }

    public function render()
    {
        return view('livewire.auth.components.student-register');
    }
}
