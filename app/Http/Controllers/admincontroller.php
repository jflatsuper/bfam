<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use DB;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    //
    public function index(){
         $vars= StudentCourse::where('user_id', Auth::user()->id)->pluck('course_id')->toArray();
            $select=[];
            if($vars != null){
                $select = DB::select('select * from CourseTable where id in ('.implode(", ",$vars).')');
            }
       return view('admin')->with('name', $select);
    }
}
