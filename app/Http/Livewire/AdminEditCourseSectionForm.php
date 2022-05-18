<?php

namespace App\Http\Livewire;

use App\Models\CourseSection;
use Livewire\Component;

class AdminEditCourseSectionForm extends Component
{
    public $section;
    public $title;
    public $sort;

    public function mount($section){
        $this->section = $section;
        $this->title   = $section->title;
        $this->sort    = $section->sort;
    }

    public function updated($field){
        $this->validateOnly($field, [
            'title'      => 'required|string|max:255',
            'sort'       => 'required|numeric|min:1',
        ]);
    }


    public function updateSection(){
        $this->validate([
            'title'      => 'required|string|max:255',
            'sort'       => 'required|numeric|min:1',
        ]);
        // Check if the sort number exist

        if (CourseSection::where('course_id', $this->section->course->id)->where('sort', $this->sort)->where('id', '!=', $this->section->id)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'The sorting number exists']);
        }

        CourseSection::where('id', $this->section->id)->update([
            'title'          => $this->title,
            'sort'           => $this->sort
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Section updated']);
        return redirect(route('admin.course-details', $this->section->course->id));
    }

    public function render()
    {
        return view('livewire.admin.components.admin-edit-course-section-form');
    }
}
