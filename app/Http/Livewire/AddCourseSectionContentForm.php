<?php

namespace App\Http\Livewire;

use App\Models\CourseSectionVideos;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCourseSectionContentForm extends Component
{
    use WithFileUploads;

    public $section;


    public $title;
    public $description;
    public $video;
    public $material;
    public $sort;

    public function mount($section){
        $this->section = $section;
    }


    public function updated($field){
        $this->validateOnly($field,[
            'title'         => 'required|string|max:255',
            'sort'          => 'required|numeric|min:1',
            'video'         => 'nullable|file|mimes:mp4,max:30720',
            'material'      => 'nullable|file|mimes:pdf, zip'
        ]);
    }

    public function addContent(){
        $this->validate([
            'title'         => 'required|string|max:255',
            'sort'          => 'required|numeric|min:1',
            'video'         => 'nullable|file|mimes:mp4, max:30720',
            'material'      => 'nullable|file|mimes:pdf, zip'
        ]);

        if (CourseSectionVideos::where('course_section_id', $this->section->id)->where('sort', $this->sort)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'The sorting number exists']);
        }

       if ($this->video){
           $this->video = $this->video->store('/', 'videos');
       }

        $material = null;
        if ($this->material){
            $this->material = $this->material->store('/', 'materials');
        }

        CourseSectionVideos::create([
            'course_section_id'      => $this->section->id,
            'title'                  => $this->title,
            'sort'                   => $this->sort,
            'video'                  => $this->video,
            'material'               => $this->material
        ]);

        $this->resetExcept(['section']);
        $this->emit('alert', ['type' => 'success', 'message' => 'Content created']);
    }

    public function render()
    {
        return view('livewire.admin.components.add-course-section-content-form');
    }
}
