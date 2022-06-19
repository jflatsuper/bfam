<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentViewController extends Controller
{
    public function dashboard(){
        return view('livewire.student.pages.student-dashboard');
    }

    public function exam($course_id){
        $course = Course::find($course_id);
        return view('livewire.student.pages.student-exam-page', ['course' => $course]);
    }

    public function courses(){
        return view('livewire.student.pages.student-courses-list-page');
    }

    public function myCourses(){
        return view('livewire.student.pages.student-my-courses-list-page');
    }


    public function categoryCourses($category_name){
        $courses = Course::where('category', $category_name)->get();
        return view('livewire.student.pages.student-category-courses', ['courses' => $courses]);
    }

    public function courseDetails($course_id){
        $course = Course::find($course_id);
        return view('livewire.student.pages.student-course-details-page', ['course' => $course]);
    }


    public function coursePreview($course_id){
        $course = Course::find($course_id);
        return view('livewire.student.pages.student-course-preview-page', ['course' => $course]);
    }

    public function profile(){
        return view('livewire.student.pages.student-profile-page');
    }
}
