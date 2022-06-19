<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionVideos;
use App\Models\ExamQuestion;
use App\Models\StudentProfile;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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

    public function exam($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-create-exam-page', ['course' => $course]);
    }

    public function examList($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-exam-list-page', ['course' => $course]);
    }

    public function editQuestion($question_id){
        $question = ExamQuestion::find($question_id);
        return view('livewire.admin.pages.admin-edit-question-page', ['question' => $question]);
    }

    public function students(){
        $students = StudentProfile::all();
        return view('livewire.admin.pages.admin-all-students-page', ['students' => $students]);
    }

    public function courseStudents($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-course-students-page', ['course' => $course]);
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

    public function fullCourseDetails($course_id){
        $course = Course::find($course_id);
        return view('livewire.admin.pages.admin-full-course-details-page', ['course' => $course]);
    }

    public function uploadSectionContent(Request $request){
        $request->validate([
            'title'         => 'required|string|max:255',
            'sort'          => 'required|numeric|min:1',
            'video'         => 'nullable|file|mimes:mp4|max:100000',
            'material'      => 'nullable|file|mimes:pdf, zip',
        ]);

        $section = CourseSection::find($request->section_id);
        if (CourseSectionVideos::where('course_section_id', $section->id)->where('sort', $request->sort)->first()){
            return redirect()->back()->with('error', 'The sorting number exists');
        }

        $video = null;
        if ($request->file('video')){
            $video =  $uploadedFileUrl = cloudinary()->uploadVideo($request->file('video')->getRealPath())->getSecurePath();
        }


        $material = null;
        if ($request->file('material')){
            $material = $request->file('material')->store('/', 'materials');
        }

        CourseSectionVideos::create([
            'course_section_id'      => $section->id,
            'title'                  => $request->title,
            'sort'                   => $request->sort,
            'video'                  => $video,
            'material'               => $material
        ]);


        return redirect()->back()->with('success', 'Content uploaded');
    }

}
