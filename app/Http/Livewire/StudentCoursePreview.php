<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\ExamCompletedStatus;
use App\Models\LastPlayedContent;
use App\Models\StudentRegisteredCourses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentCoursePreview extends Component
{
    public $course;

    public $purchased;

    protected $listeners = [
        'refreshAdminCourseDetails' => 'fetchCourse'
    ];

    public function mount($course){
        $this->course = $course;
        if (StudentRegisteredCourses::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->first()){
            $this->purchased = true;
        }
    }

    public function fetchCourse(){
        $this->course = Course::find($this->course->id);
    }


    public function enroll($course_id){
        // Check if enrolment is active already
        if (!StudentRegisteredCourses::where('user_id', Auth::user()->id)->where('course_id', $course_id)->first()){
            $student = \App\Models\StudentProfile::where('user_id', Auth::user()->id)->first();
            StudentRegisteredCourses::create([
                'user_id'       => Auth::user()->id,
                'course_id'     => $course_id,
                'student_id'    => $student->id
            ]);

            ExamCompletedStatus::create([
                'user_id'       => Auth::user()->id,
                'course_id'     => $course_id,
                'status'        => false
            ]);

            $firstContent = null;
            if (count($this->course->sections) > 0){
                foreach ($this->course->sections as $section){
                    if (count($section->contents) > 0){
                       $firstContent =  $section->contents->first()->id;
                    }else{
                        $firstContent = 1;
                    }
                }
            }else{
                $firstContent = 1; // is reserved
            }

            LastPlayedContent::create([
                'user_id'       => Auth::user()->id,
                'course_id'     => $course_id,
                'last_content'  => $firstContent
            ]);
            // Notify student
            $this->purchased = true;
            return $this->emit('alert', ['type' => 'success', 'message' => 'Course enrollment successful']);
        }
    }

    public function render()
    {
        return view('livewire.student.components.student-course-preview');
    }
}
