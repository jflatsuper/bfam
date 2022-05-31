<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseSectionVideos;
use App\Models\LastPlayedContent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminFullCourseDetails extends Component
{
    public $course;
    public $currentContent;
    public $comments = [];
    public $comment;

    protected $listeners = [
        'refreshAdminCourseDetails' => 'fetchCourse'
    ];

    public function mount($course){
        $this->course = $course;
//        // fetch lastContent
//        $lastPlayed  = LastPlayedContent::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->first();
//        if($lastPlayed->last_content == 1){
//            $this->currentContent = 1;
//        }else{
//            $this->currentContent = $lastPlayed->content;
//        }
        $this->currentContent = 1;

        $this->fetchComments();
    }

    public function select($content_id){
        $content = CourseSectionVideos::find($content_id);
        LastPlayedContent::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->update([
            'last_content'  => $content_id
        ]);
        $this->currentContent = $content;
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
        return view('livewire.admin.components.admin-full-course-details');
    }
}
