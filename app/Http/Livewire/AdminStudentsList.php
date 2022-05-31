<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudentProfile;

class AdminStudentsList extends Component
{
    public $students;

    public function mount(){
        $this->students = StudentProfile::all();
    }

    public function render()
    {
        return view('livewire.admin.components.admin-students-list');
    }
}
