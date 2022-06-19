<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestion;
use Livewire\Component;

class AdminExamQuestionsList extends Component
{
    public $questions;
    public $course;

    protected $listeners = ['refreshAdminExamList'  => '$refresh'];
    public function mount($course){
        $this->course = $course;
        $this->fetchQuestions();
    }


    public function fetchQuestions(){
        $this->questions = ExamQuestion::orderBy('sort', 'ASC')->where('course_id', $this->course->id)->get();
    }

    public function removeQuestion($id){
        $question = ExamQuestion::find($id);
        foreach ($question->options as $option) {
            $option->delete();
        }

        $question->delete();
        $this->emit('refreshAdminExamList');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Question removed']);
    }

    public function render()
    {
        return view('livewire.admin.components.admin-exam-questions-list');
    }
}
