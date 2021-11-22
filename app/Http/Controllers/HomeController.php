<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use App\Models\StudentCourse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        $vars= StudentCourse::where('user_id', Auth::user()->id)->pluck('course_id')->toArray();
           $select=[];
           if($vars != null){
               $select = DB::select('select * from CourseTable where id in ('.implode(", ",$vars).')');
           }
      return view('home')->with('name', $select);
   }
}
