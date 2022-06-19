<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditCourseForm extends Component
{

    use WithFileUploads;

    public $course;

    public $title;
    public $category;
    public $description;
    public $image;
    public $categories;

    public function mount($course){
        $this->course = $course;
        $this->fetchFormData();
        $this->categories = Category::all();
    }

    public function updated($field){
        $this->validateOnly($field, [
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'required|string|max:4000',
            'image'       => 'nullable|image|max:5000|dimensions:width=480,height=270'
        ]);
    }

    public function fetchFormData(){
        $this->title       = $this->course->title;
        $this->category    = $this->course->category;
        $this->description = $this->course->description;
    }

    public function updateCourse(){
        $this->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'required|string|max:4000',
            'image'       => 'nullable|image|max:5000|dimensions:width=480,height=270'
        ]);

        if ($this->image){
            $this->image = $this->image->store('/', 'images');
            File::delete($this->course->CoverImage);
        }

        Course::where('id', $this->course->id)->update([
            'category'      => $this->category,
            'title'         => $this->title,
            'description'   => $this->description,
            'cover_image'   => ($this->image)?$this->image:$this->course->cover_image,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Course updated']);
        return redirect(route('admin.add-course-section', $this->course->id));
    }



    public function render()
    {
        return view('livewire.admin.components.admin-edit-course-form');
    }
}
