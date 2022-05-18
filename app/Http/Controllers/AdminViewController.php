<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    public function dashboard(){
        return view('livewire.admin.pages.admin-dashboard');
    }

    public function createCourse(){
        return view('livewire.admin.pages.admin-create-course-page');
    }


    public function categories(){
        return view('livewire.admin.pages.admin-create-category-page');
    }

    public function students(){
        $students = StudentProfile::all();
        return view('livewire.admin.pages.admin-all-students-page', ['students' => $students]);
    }


    public function categoryCourses($category_name){
        $courses = Course::where('category', $category_name)->get();
        return view('livewire.admin.pages.admin-category-courses', ['courses' => $courses]);
    }


    public function createCourseCategory(){
        return view('livewire.admin.pages.admin-create-course-page');
    }


    public function editCourse($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-edit-course-page', ['course'  => $course]);
    }


    public function courses(){
        return view('livewire.admin.pages.admin-course-lists');
    }

    public function addSections($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-add-course-section-page', ['course' => $course]);
    }

    public function editSection($section_id){
        $section = CourseSection::find($section_id);
        return view('livewire.admin.pages.admin-edit-course-section-page', ['section' => $section]);
    }

    public function addSectionContents($section_id){
        $section = CourseSection::find($section_id);
        return view('livewire.admin.pages.admin-add-course-section-content-page', ['section' => $section]);
    }

    public function courseDetails($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-course-details-page', ['course' => $course]);
    }
}
