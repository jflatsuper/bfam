<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class AdminAllCourseList extends Component
{
    public $category;
    public $searchResult;

    public function updated(){
        if ($this->category){
            $this->searchResult = Course::where('category', $this->category)->get();
        }else{
            $this->searchResult = null;
        }
    }

    public function render()
    {
        if ($this->searchResult){
            return view('livewire.admin.components.admin-all-course-list', [
                'courses'   => $this->searchResult
            ]);
        }
        return view('livewire.admin.components.admin-all-course-list', [
            'courses'   => Course::all()
        ]);

    }
}
