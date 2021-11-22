<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class settingsController extends Controller
{
    //
    public function show11(){
        $val= Auth::user()->phone;
         return view('set1')->with('val',$val);
         
     }
     public function show22(){
         $val= Auth::user();
         return view('set2');
     }
     public function show33(){
         $val= Auth::user();
         return view('set3')->with('val',$val);
     }
     public function show44(Request $request){
         User::where('email',Auth::user()->email)->update(array(
             'phone'=>($request->get('phone')),
 ));
 $val= Auth::user()->phone;
         return view('set1')->with('val',$val);
 
     }
 
     public function show55(Request $request){
         $rules = [
             'first_name' => 'required|string|min:3|max:255',
             'last_name' => 'required|string|min:3',
             'country' => 'required|string|max:255',
             
             
         ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $val= Auth::user();
             return view('set3')->with('val',$val);
         }
         else{
            
                 User::where('email',Auth::user()->email)->update([
                     'first_name'=>$request->get('first_name'),'last_name'=>$request->get('last_name'),'country'=>$request->get('country')]);
                 
         
             }
             return redirect()->back();
            
             
         
 
     }
     public function show66(Request $request){
       
    
         $imglink=cloudinary()->upload($request->file('profpic')->getRealPath())->getSecurePath();
         DB::table('users')->where('email',Auth::user()->email)->update(array(
             'profphoto'=>$imglink,
 ));
 
     
 return redirect()->back();
 
     }
}
