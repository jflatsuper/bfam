<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminCourseStudentList extends Component
{
    public $course;

    public function mount($course){
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.admin.components.admin-course-student-list');
    }
}
