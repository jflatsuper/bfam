<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function options(){
        return $this->hasMany(ExamQuestionOption::class, 'question_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }


}
