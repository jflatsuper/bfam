<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCourseForm extends Component
{
    use WithFileUploads;

    public $title;
    public $category;
    public $description;
    public $image;

    public $categories;

    public function mount(){
        $this->categories = Category::all();
    }

    public function updated($field) {
        $this->validateOnly($field, [
          'title'       => 'required|string|max:255',
          'category'    => 'required|string|max:255',
          'description' => 'required|string|max:4000',
          'image'       => 'required|image|max:5000'
        ]);
    }

    public function createCourse(){
        $this->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'description' => 'required|string|max:4000',
            'image'       => 'required|image|max:5000'
        ]);

        $cover_image = $this->image->store('/', 'images');

       $course =  Course::create([
            'user_id'       => Auth::id(),
            'category'      => $this->category,
            'title'         => $this->title,
            'description'   => $this->description,
            'cover_image'   => $cover_image,
        ]);

        $this->reset();
        $this->emit('alert', ['type' => 'success', 'message' => 'Course created']);
        return redirect(route('admin.add-course-section', $course->id));
    }

    public function render()
    {
        return view('livewire.admin.components.create-course-form');
    }
}
