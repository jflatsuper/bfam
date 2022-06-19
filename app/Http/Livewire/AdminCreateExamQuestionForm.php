<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestion;
use App\Models\ExamQuestionAnswer;
use App\Models\ExamQuestionOption;
use Livewire\Component;

class AdminCreateExamQuestionForm extends Component
{
    public $sort;
    public $question;
    public $a;
    public $b;
    public $c;
    public $answer;


    public $course;
    public function mount($course){
        $this->course = $course;
    }
    public function updated($field){
        $this->validateOnly($field, [
           'sort'       =>  'required|numeric|min:1',
           'question'   => 'required|string',
           'a'          => 'required|string',
           'b'          => 'required|string',
           'c'          => 'required|string',
           'answer'     => 'required|string',
        ]);
    }

    public function addQuestion(){
        $this->validate([
            'sort'       =>  'required|numeric|min:1',
            'question'   => 'required|string',
            'a'          => 'required|string',
            'b'          => 'required|string',
            'c'          => 'required|string',
            'answer'     => 'required|string',
        ]);

        if (ExamQuestion::where('course_id', $this->course->id)->where('sort', $this->sort)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'The sorting number exists']);
        }


        $question = ExamQuestion::create([
            'course_id' =>  $this->course->id,
            'sort'      =>  $this->sort,
            'question'  =>  $this->question,
            'answer'    =>  $this->answer,
        ]);

        ExamQuestionOption::create([
           'question_id'    =>   $question->id,
           'option'         =>   'a',
           'answer'         =>   $this->a,
        ]);
        ExamQuestionOption::create([
            'question_id'    =>   $question->id,
            'option'         =>   'b',
            'answer'         =>   $this->b,
        ]);
        ExamQuestionOption::create([
            'question_id'    =>   $question->id,
            'option'         =>   'c',
            'answer'         =>   $this->c,
        ]);


        $this->resetExcept('course');
        return $this->emit('alert', ['type' => 'success', 'message' => 'Question added to exam']);
    }



    public function render()
    {
        return view('livewire.admin.components.admin-create-exam-question-form');
    }
}
