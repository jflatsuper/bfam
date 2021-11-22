<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\StudentCourse;
use Auth;


class videoController extends Controller
{
    //
   
    public function show(Request $request){
        $name = $request->id;
      
        $user = Auth::user()->id;
$course= Course::where('id','=',$name);

$values = array('course_id' => $name,'user_id' => $user);
$value2=Course::where('id','=',$name)->value('filetype');
StudentCourse::firstOrCreate(
$values, $values);
$value3=DB::select('select * from comments where course_id in (?)',[$name]);






        
        
        return view('videoplayer')->with(['c' => $name,'name'=>$course,'us'=>$user,'filetype'=>$value2,'comments'=>$value3]);
    }
   
}

