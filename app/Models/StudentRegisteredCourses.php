<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegisteredCourses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function course(){
        return $this->hasOne(Course::class,'id','course_id');
    }

}
