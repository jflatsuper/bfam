<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentProfile extends Component
{
    use WithFileUploads;

    public $firstname;
    public $lastname;
    public $country;
    public $phone;
    public $image;


    public function mount(){
        $this->firstname    = Auth::user()->first_name;
        $this->lastname     = Auth::user()->last_name;
        $this->country      = Auth::user()->country;
        $this->phone        = Auth::user()->phone;
    }

    public function updated($field){
        $this->validateOnly($field, [
            'firstname'    => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'country'       => 'required|string|max:255',
            'phone'         => 'required|numeric',
            'image'         => 'nullable|image|max:1000|dimensions:max-width=500,max-height=500'
        ]);
    }

    public function updateProfile(){
        $this->validate([
            'firstname'    => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'country'       => 'required|string|max:255',
            'phone'         => 'required|numeric',
            'image'         => 'nullable|image|max:1000|dimensions:max-width=500,max-height=500'
        ]);

        if ($this->image){
            $this->image = $this->image->store('/', 'images');
            if(Auth::user()->profile_photo_path){
                File::delete(asset("uploads/images/".Auth::user()->profile_photo_path));
            }
        }

        User::where('id', Auth::id())->update([
            'first_name'            => $this->firstname,
            'last_name'             => $this->lastname,
            'country'               => $this->country,
            'phone'                 => $this->phone,
            'profile_photo_path'    => ($this->image)?$this->image:Auth::user()->profile_photo_path,
        ]);

        return $this->emit('alert', ['type' => 'success', 'message' => 'Profile updated']);
    }


    public function render()
    {
        return view('livewire.student.components.student-profile');
    }
}
