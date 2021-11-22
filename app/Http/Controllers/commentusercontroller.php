<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\Course;
use Illuminate\Http\Request;

class commentusercontroller extends Controller
{
    //
    public function comment(Request $request){
       $name= $request->get('course_id');
        DB::table('comments')->insert([
            'comment' => $request->input('comment'), //$request->title
            'username' => $request->get('username'), //$request->details
            'course_id' => $request->get('course_id') 
       ]);
       $value3=$request->get('username');
       $value4=$request->input('comment');
       
       return response()->json(
        ["$value3","$value4"]
   );

    }
}
