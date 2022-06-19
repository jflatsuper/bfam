<?php

namespace App\Http\Livewire;

use App\Models\ExamCompletedStatus;
use App\Models\ExamCurrentQuestion;
use App\Models\ExamQuestion;
use App\Models\ExamQuestionAnswer;
use App\Models\StudentExamAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;

class StudentExam extends Component
{
    public $answer;
    public $submitted;
    public $score;

    public $course;
    public $question;

    public $isLast;
    public $isFirst;
    public $isCompleted;
    public $status;

    public $noExam;

    public function mount($course){
        $this->course = $course;
        $this->fetchNextQuestion();
    }

    public function fetchNextQuestion(){
        if(count($this->course->questions) > 0){
            $current = ExamCurrentQuestion::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if ($current){
                $this->question = ExamQuestion::find($current->question_id);
                $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $this->question->id)->first();
                if ($answer){
                    $this->answer = $answer->answer;
                }
//                dd($answer);

            }else{
                $this->question = $this->course->questions->first();
            }

            $status =  ExamCompletedStatus::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if($status){
                if ($status->status == true){
                    $this->computeScore();
                    $this->isCompleted = true;
                    $this->computeScore();
                }
            }else{
                ExamCompletedStatus::create([
                    'user_id'   => Auth::user()->id,
                    'course_id' => $this->course->id
                ]);
            }


            $this->toggleButtons();
        }else{
            $this->noExam = true;
        }
    }

    public function tryAgain(){
        $this->question = $this->course->questions->first();

        $status =  ExamCompletedStatus::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
        if($status){
            if ($status->status == true){
                $this->isCompleted = false;
                $status->status = false;
            }
            $status->save();

            $current = ExamCurrentQuestion::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if ($current){
                $current->question_id   = $this->question->id;
                $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $this->question->id)->first();
                if($answer){
                    $this->answer = $answer->answer;
                }
                $current->save();
            }

        }else{
            ExamCompletedStatus::create([
                'user_id'   => Auth::user()->id,
                'course_id' => $this->course->id
            ]);
        }



        return redirect(route('student.exam', $this->course->id));
    }

    public function updated($field){
        $this->validate([
            'answer'     => 'required'
        ]);
    }

    public function submitAnswer(){
        $this->validate([
            'answer'     => 'required'
        ]);

        $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $this->question->id)->first();
        if ($answer){
            $answer->answer = $this->answer;
            $answer->save();
        }else{
            StudentExamAnswer::create([
                'user_id'        => Auth::user()->id,
                'course_id'      => $this->course->id,
                'question_id'    => $this->question->id,
                'answer'         => $this->answer,
            ]);
        }


        // Check if it is the last question
        if ($this->isLast){
//            dd('sdf');
            $status =  ExamCompletedStatus::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            $status->status = true;
            $status->save();
        }

        $this->emit('alert', ['type' => 'success', 'message' => 'Answers submitted']);

        if ($this->isLast){
            $this->computeScore();
           return $this->isCompleted = true;
        }
        $this->answer = null;
        return $this->next();
    }



    public function toggleButtons(){
        if ($this->question->sort == $this->course->questions->first()->sort){
            $this->isFirst = true;
        }else{
            $this->isFirst = false;
        }

        if ($this->question->sort == $this->course->questions->last()->sort){
            $this->isLast = true;
        }else{
            $this->isLast = false;
        }
    }

    public function toQuestion($sort)
    {

        $question = ExamQuestion::where('course_id', $this->course->id)->where('sort', $sort)->get()->first();

            $current = ExamCurrentQuestion::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if($current){
                $current->question_id   = $question->id;
                $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $question->id)->first();
                if($answer){
                    $this->answer = $answer->answer;
                }
                $current->save();
            }else{
                ExamCurrentQuestion::create([
                    'user_id'        => Auth::user()->id,
                    'course_id'      => $this->course->id,
                    'question_id'    => $question->id,
                ]);
            }

        $this->question = $question;
        $this->toggleButtons();

    }

    public function next()
    {

        $question = ExamQuestion::where('course_id', $this->course->id)->where('sort', $this->question->sort + 1)->get()->first();

        if (!$this->isLast){
            $current = ExamCurrentQuestion::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if($current){
                $current->question_id   = $question->id;
                $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $question->id)->first();
                if($answer){
                    $this->answer = $answer->answer;
                }
                $current->save();
            }else{
                ExamCurrentQuestion::create([
                    'user_id'        => Auth::user()->id,
                    'course_id'      => $this->course->id,
                    'question_id'    => $question->id,
                ]);
            }
        }


        $this->question = $question;
        $this->toggleButtons();

    }

    public function previous()
    {
        $question = ExamQuestion::where('course_id', $this->course->id)->where('sort', $this->question->sort - 1)->first();
        if (!$this->isFirst){
            $current = ExamCurrentQuestion::where('course_id', $this->course->id)->where('user_id', Auth::user()->id)->first();
            if($current){
                $current->question_id   = $question->id;
                $answer = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('question_id', $question->id)->first();
                if($answer){
                    $this->answer = $answer->answer;
                }
                $current->save();
            }else{
                ExamCurrentQuestion::create([
                    'user_id'        => Auth::user()->id,
                    'course_id'      => $this->course->id,
                    'question_id'    => $question->id,
                ]);
            }
        }

        $this->question = $question;
        $this->toggleButtons();

    }


    public function computeScore(){
        $score  = 0;
        $studentAnswers = StudentExamAnswer::where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->get();
        foreach ($studentAnswers as $studentAnswer){
            $examQuestion = ExamQuestion::where('id', $studentAnswer->question_id)->first();
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
