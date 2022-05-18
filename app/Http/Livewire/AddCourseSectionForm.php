<?php

namespace App\Http\Livewire;

use App\Models\CourseSection;
use Livewire\Component;

class AddCourseSectionForm extends Component
{
    public $course;
    public $title;
    public $sort;

    public function mount($course){
        $this->course = $course;
    }

    public function updated($field){
        $this->validateOnly($field, [
           'title'      => 'required|string|max:255',
           'sort'       => 'required|numeric|min:1',
        ]);
    }


    public function addSection(){
        $this->validate([
            'title'      => 'required|string|max:255',
            'sort'       => 'required|numeric|min:1',
        ]);
        // Check if the sort number exist

        if (CourseSection::where('course_id', $this->course->id)->where('sort', $this->sort)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'The sorting number exists']);
        }

        $section = CourseSection::create([
           'course_id'      => $this->course->id,
           'title'          => $this->title,
           'sort'           => $this->sort
        ]);

        $this->resetExcept(['course']);
        $this->emit('alert', ['type' => 'success', 'message' => 'Section created']);
        return redirect(route('admin.add-course-section-content', $section->id));
    }

    public function render()
    {
        return view('livewire.admin.components.add-course-section-form');
    }
}
