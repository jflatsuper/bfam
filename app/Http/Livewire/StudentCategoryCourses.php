<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StudentCategoryCourses extends Component
{
    public $courses;
    public function mount($courses){
        $this->courses = $courses;
    }

    public function render()
    {
        return view('livewire.student.components.student-category-courses');
    }
}
