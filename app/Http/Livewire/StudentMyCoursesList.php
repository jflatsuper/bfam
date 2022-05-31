<?php

namespace App\Http\Livewire;

use App\Models\StudentRegisteredCourses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentMyCoursesList extends Component
{
    public $courses;
    public $regCourses;

    public function mount(){
        $this->regCourses = StudentRegisteredCourses::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.student.components.student-my-courses-list');
    }
}
