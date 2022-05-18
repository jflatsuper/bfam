<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\StudentProfile;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $totalStudents = 0;
    public $totalCourses = 0;

    public function mount(){
        $this->totalStudents = count(StudentProfile::all());
        $this->totalCourses = count(Course::all());
    }

    public function render()
    {
        return view('livewire.admin.components.admin-dashboard');
    }
}
