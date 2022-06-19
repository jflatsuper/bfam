<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestion;
use App\Models\ExamQuestionOption;
use Livewire\Component;

class AdminEditExamQuestionForm extends Component
{
    public $c_question;
    public $sort;
    public $question;
    public $a;
    public $b;
    public $c;
    public $answer;


    public function mount($question){
//        $this->c_question = ExamQuestion::find($question->id);
        $this->c_question = $question;

        $this->question = $question->question;
        $this->sort     = $question->sort;
        $this->answer   = $question->answer;

        foreach ($question->options as $option) {
            if ($option->option === 'a'){
                $this->a = $option->answer;
            }
            if ($option->option === 'b'){
                $this->b = $option->answer;
            }
            if ($option->option === 'c'){
                $this->c = $option->answer;
            }
        }


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
    public function updateQuestion(){
        $this->validate([
            'sort'       =>  'required|numeric|min:1',
            'question'   => 'required|string',
            'a'          => 'required|string',
            'b'          => 'required|string',
            'c'          => 'required|string',
            'answer'     => 'required|string',
        ]);

//        dd($this->c_question->course->id);
        if (ExamQuestion::where('course_id', $this->c_question->course->id)->where('sort', $this->sort)->where('id', '!=', $this->c_question->id)->first()){
            return $this->emit('alert', ['type' => 'error', 'message' => 'The sorting number exists']);
        }

        $question = $this->c_question->update([
            'sort'      =>  $this->sort,
            'question'  =>  $this->question,
            'answer'    =>  $this->answer,
        ]);

        foreach ($this->c_question->options as $option) {
            if ($option->option === 'a'){
               $option->update([
                    'answer'         =>   $this->a,
                ]);
            }
            if ($option->option === 'b'){
                $option->update([
                    'answer'         =>   $this->b,
                ]);
            }
            if ($option->option === 'c'){
                $option->update([
                    'answer'         =>   $this->c,
                ]);
            }
        }

        return $this->emit('alert', ['type' => 'success', 'message' => 'Question added to exam']);
    }

    public function render()
    {
        return view('livewire.admin.components.admin-edit-exam-question-form');
    }
}
