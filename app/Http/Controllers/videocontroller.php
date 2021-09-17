<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\StudentCourse;
use Auth;

class videocontroller extends Controller
{
    //
    public function show(Request $request){
        $name = $request->get('videolinks');
        $user = Auth::user()->id;
$course= Course::where('videolinks','=',$name)->value('id');

$values = array('course_id' => $course,'user_id' => $user);
StudentCourse::firstOrCreate(
$values, $values);





        
        
        return view('videoplayer')->with(['name' => $name,'c'=>$course,'us'=>$user]);
    }
}
