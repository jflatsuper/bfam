<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\StudentProfile;
use App\Models\StudentRegisteredCourses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDashboard extends Component
{
    public $totalStudents = 0;
    public $totalCourses = 0;

    public function mount(){
        $this->totalStudents = count(StudentRegisteredCourses::where('user_id', Auth::id())->get());
        $this->totalCourses = count(Course::all());
    }


    public function render()
    {
        return view('livewire.student.components.student-dashboard');
    }
}
