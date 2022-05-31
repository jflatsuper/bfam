<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class StudentCoursesList extends Component
{
    public function render()
    {
        return view('livewire.student.components.student-courses-list', [
            'courses'   => Course::all()
        ]);
    }
}
