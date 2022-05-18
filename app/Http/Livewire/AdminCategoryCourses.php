<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminCategoryCourses extends Component
{
    public $courses;
    public function mount($courses){
        $this->courses = $courses;
    }

    public function render()
    {
        return view('livewire.admin.components.admin-category-courses');
    }
}
