<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class AdminAllCourseList extends Component
{
    public $courses;

    public function mount(){
        $this->fetchAllCourses();
    }

    public function fetchAllCourses(){
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.admin.components.admin-all-course-list');
    }
}
