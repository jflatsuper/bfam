<?php

namespace App\Http\Livewire;

use App\Models\ExamQuestion;
use App\Models\StudentExamAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;

class StudentExam extends Component
{
    public $question_1;
    public $question_2;
    public $question_3;

    public $submitted;
    public $score;

    public function updated($field){
        $this->validateOnly($field, [
            'question_1'    => 'required',
            'question_2'    => 'required',
            'question_3'    => 'required',
        ]);
    }

    public function submitAnswer(){
        $this->validate([
            'question_1'    => 'required',
            'question_2'    => 'required',
            'question_3'    => 'required',
        ]);

        // Process subittion
        $exam_id = Str::random(10);
        StudentExamAnswer::create([
           'user_id'       => Auth::user()->id,
           'question'      => 'question_1',
           'answer'        => $this->question_1,
           'exam_id'       => $exam_id
        ]);

        StudentExamAnswer::create([
            'user_id'       => Auth::user()->id,
            'question'      => 'question_2',
            'answer'        => $this->question_2,
            'exam_id'       => $exam_id,
        ]);

        StudentExamAnswer::create([
            'user_id'       => Auth::user()->id,
            'question'      => 'question_3',
            'answer'        => $this->question_3,
            'exam_id'       => $exam_id
        ]);

        $this->reset();
        // Compute score
        $this->submitted = true;
        $this->computeScore($exam_id);
        return $this->emit('alert', ['type' => 'success', 'message' => 'Answers submitted']);
    }

    public function computeScore($exam_id){
        $score  = 0;
        $studentAnswers = StudentExamAnswer::where('exam_id', $exam_id)->get();
        foreach ($studentAnswers as $studentAnswer){
            $examQuestion = ExamQuestion::where('question', $studentAnswer->question)->first();
            if ($studentAnswer->answer == $examQuestion->answer){
                $score+=1;
            }
        }
        $this->score = $score;
    }

    public function download(){


        //Send the media file to user
        //PDF file is stored under project/public/uploads


        $headers = array(
            'Content-Type: application/jpeg',
        );

        //Display a success alert message

        $userName = Auth::user()->last_name .' '.Auth::user()->first_name;
        $imageFile =  $this->makeImage($userName);
        $file = public_path("/uploads/images/$imageFile");


        $this->emit('alert', ['type' => 'success', 'message' => 'File downloaded']);
        //Return the requested file to the user
        return \response()->download($file, "BFAM_certificate.jpeg", $headers);

    }

    public function makeImage($userName)
    {
        $img = Image::make(public_path('/uploads/images/certificate.png'));
        $img->text($userName, 1550, 2450,  function($font) {
            $font->file(public_path('OrelegaOne-Regular.ttf'));
            $font->size(140);
            $font->color('#131004');
            $font->align('center');
            $font->valign('top');
        });
        $randStr = Str::random(20);
        $img->save(public_path("/uploads/images/$randStr.jpg"));
        return $randStr.'.jpg';
    }

    public function render()
    {
        return view('livewire.student.components.student-exam');
    }
}
