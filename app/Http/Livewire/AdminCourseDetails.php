<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionVideos;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class AdminCourseDetails extends Component
{
    public $course;

    protected $listeners = [
        'refreshAdminCourseDetails' => 'fetchCourse'
    ];

    public function mount($course){
        $this->course = $course;
    }

    public function fetchCourse(){
        $this->course = Course::find($this->course->id);
    }

    public function remove($id){
        $content = CourseSectionVideos::find($id);
        //Remove the media
        File::delete($content->VideoContent);
        if ($content->material){
            File::delete($content->VideoMaterial);
        }
        $content->delete();
        $this->emit('refreshAdminCourseDetails');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Content deleted']);
    }

    public function removeSection($id){
        $section = CourseSection::find($id);
        if ($section->contents){
            foreach ($section->contents as $content){
                File::delete($content->VideoContent);
                if ($content->material){
                    File::delete($content->VideoMaterial);
                }
                $content->delete();
            }
        }
        $section->delete();
        $this->emit('refreshAdminCourseDetails');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Section deleted']);
    }

    public function removeCourse($course_id){
        $course = Course::find($course_id);
        if ($course->sections){
            foreach ($course->sections as $section){
                if ($section->contents){
                    foreach ($section->contents as $content){
                        File::delete($content->VideoContent);
                        if ($content->material){
                            File::delete($content->VideoMaterial);
                        }
                        $content->delete();
                    }
                }

                $section->delete();
            }
        }

        File::delete($course->CourseCoverImage);
        $course->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Course deleted']);
        return redirect(route('admin.courses'));
    }

    public function addContent($section_id){
        return redirect(route('admin.add-course-section-content', $section_id));
    }

    public function editSection($section_id){
        return redirect(route('admin.edit-course-section', $section_id));
    }

    public function render()
    {
        return view('livewire.admin.components.admin-course-details');
    }
}
