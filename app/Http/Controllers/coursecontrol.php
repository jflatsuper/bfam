<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class coursecontrol extends Controller
{
    //
    public function index() {
        $select = DB::select('select * from CourseTable');

        return view('course')->with('name',$select);
     }
}
