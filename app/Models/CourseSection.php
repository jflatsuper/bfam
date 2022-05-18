<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contents(){
        return $this->hasMany(CourseSectionVideos::class, 'course_section_id', 'id')->orderBy('sort', 'ASC');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

}
