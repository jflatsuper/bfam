<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Course;

use App\Models\StudentCourse;
class admincoursecontrol extends Controller
{
    //
    public function index() {
        $select = DB::select('select * from CourseTable');
  $prev=StudentCourse::where('user_id', Auth::user()->id)->pluck('course_id')->toArray();
            $on=[];
           
            if($prev != null){
                $on = DB::select('select * from CourseTable where id in ('.implode(", ",$prev).')');
                $select = DB::select('select * from CourseTable where id not in ('.implode(", ",$prev).')');
               
            }
           

        return view('adcourse')->with(['name'=>$select,'on'=>$on]);
     }
     public function delete(Request $request){
         $val=$request->get('ids');
        DB::table('StudentCourseTable')->where('user_id',Auth::user()->id)
        ->where('course_id',$val)
        ->delete();
        return $this->index();
        
     }
     public function add(Request $request){
        $name = $request->get('id');
        $user = Auth::user()->id;
$course= Course::where('id','=',$name)->value('videolinks');

$values = array('course_id' => $name,'user_id' => $user);
$value2=Course::where('id','=',$name)->value('filetype');
StudentCourse::firstOrCreate(
$values, $values);

return redirect()->back();

     }
}
