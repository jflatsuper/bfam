<?php

namespace App\Models;

use App\Transformers\CourseTransformer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;


   protected $guarded = [];

    /*
     * Sections in this course
     */
    public function sections()
    {
        return $this->hasMany(CourseSection::class, 'course_id', 'id')->orderBy('sort', 'ASC');
    }

    public function getCourseCoverImageAttribute(){
        return asset("uploads/images/$this->cover_image");
    }

    public function enrolled(){
        return $this->hasMany(StudentRegisteredCourses::class, 'course_id');
    }

}
