<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionVideos;
use App\Models\ExamCompletedStatus;
use App\Models\LastPlayedContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class StudentCourseDetails extends Component
{
    public $course;
    public $currentContent;
    public $comments = [];
    public $comment;

    public $isCompleted;

    public $viewPDF;

    protected $listeners = [
        'refreshAdminCourseDetails' => 'fetchCourse'
    ];
    public function openPDFView(){
        $this->viewPDF = true;
    }


    public function mount($course){

        $this->course = $course;
        // fetch lastContent
        $lastPlayed  = LastPlayedContent::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->first();
        if($lastPlayed->last_content == 1){
            $this->currentContent = 1;
        }else{
            $this->currentContent = $lastPlayed->content;

            if ($lastPlayed->content->video){
                $this->viewPDF = false;
            }elseif(!$lastPlayed->content->video && $lastPlayed->content->material){
                $this->openPDFView();
            }
        }

        $status =  ExamCompletedStatus::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
        if ($status->status){
            $this->isCompleted = true;
        }

        $this->fetchComments();
    }

    public function select($content_id){
        $content = CourseSectionVideos::find($content_id);
        LastPlayedContent::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->update([
            'last_content'  => $content_id
        ]);
        $this->currentContent = $content;

        if ($content->video){
            $this->viewPDF = false;
        }elseif(!$content->video && $content->material){
            $this->openPDFView();
        }
    }

    public function fetchCourse(){
        $this->course = Course::find($this->course->id);
    }


    public function fetchComments(){
        $this->comments = Comment::where('course_id', $this->course->id)->get();
    }

    public function addComment(){
        $this->validate([
           'comment'    => 'required|string|max:4000'
        ]);
        Comment::create([
            'course_id' => $this->course->id,
            'user_id'   => Auth::user()->id,
            'comment'   => $this->comment
        ]);
        $this->comment = '';
        $this->fetchComments();
        return $this->emit('alert', ['type' => 'success', 'message' => 'Comment added']);
    }

    public function render()
    {
        return view('livewire.student.components.student-course-details');
    }
}
