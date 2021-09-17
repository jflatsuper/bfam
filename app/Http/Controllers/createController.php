<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use Auth;

class createController extends Controller
{
    //
    public function insert(){
      
        return view('create');
    }
    public function create(Request $request){
        $rules = [
			'CourseTitle' => 'required|string|min:3|max:255',
			'Description' => 'required|string|min:3',
            'Comments' => 'required|string|max:255',
            
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('upload')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$table = new Course;
                $table->CourseTitle = $data['CourseTitle'];
                $table->Description = $data['Description'];
				$table->Comments= $data['Comments'];
               
                $table->CourseCreator= Auth::user()->first_name.' '.Auth::user()->last_name;
				$uploadedFileUrl = cloudinary()->uploadVideo($request->file('videolinks')->getRealPath())->getSecurePath();
				$newfilename=substr($uploadedFileUrl, 0 , (strrpos($uploadedFileUrl, ".")));
                $table->videolinks = $newfilename;
      

				$table->save();
				return redirect('upload')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('upload')->with('failed',"operation failed");
			}
		}
    }
}
