<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UserLogin extends Component
{
    public $email;
    public $phone;

    protected $listeners = ['refreshNav' => '$refresh'];

    //This validates user inputs on real time basis
    public function updated($field)
    {
        $this->validateOnly($field, [
            'email'     => 'required|max:255|email',
            'phone'     => 'required|max:255',
        ]);
    }

    //For Authenticating User
    public function login()
    {
        $this->validate([
            'email'    => 'required|max:255|email',
            'phone'    => 'required|max:255',
        ]);

        //Mozisha user validation endpoint
        $user = User::where('email', $this->email)->where('phone', $this->phone)->first();
        if (!$user){
            return $this->emit('alert', ['type' => 'error', 'message' => 'Invalid credentials']);
        }

        // If found
        Auth::login($user);
        if ($user->hasRole('admin')){
            return redirect(route('admin.dashboard'));
        }
        return $this->emit('alert', ['type' => 'success', 'message' => 'Logged successfully']);


    }


    public function render()
    {
        return view('livewire.auth.components.user-login');
    }
}
