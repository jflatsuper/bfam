<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class admincoursecontrol extends Controller
{
    //
    public function index() {
        $select = DB::select('select * from CourseTable');

        return view('adcourse')->with('name',$select);
     }
}
