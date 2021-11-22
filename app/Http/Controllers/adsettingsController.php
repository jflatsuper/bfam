<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class adsettingsController extends Controller
{
    //
   
    public function show1(){
       $val= Auth::user()->phone;
        return view('setview')->with('val',$val);
        
    }
    public function show2(){
        $val= Auth::user();
        return view('setview2');
    }
    public function show3(){
        $val= Auth::user();
        return view('setview3')->with('val',$val);
    }
    public function show4(Request $request){
        User::where('email',Auth::user()->email)->update(array(
            'phone'=>($request->get('phone')),
));
$val= Auth::user()->phone;
        return view('setview')->with('val',$val);

    }

    public function show5(Request $request){
        $rules = [
			'first_name' => 'required|string|min:3|max:255',
			'last_name' => 'required|string|min:3',
			'country' => 'required|string|max:255',
			
            
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
            $val= Auth::user();
            return view('setview3')->with('val',$val);
		}
		else{
           
                User::where('email',Auth::user()->email)->update([
                    'first_name'=>$request->get('first_name'),'last_name'=>$request->get('last_name'),'country'=>$request->get('country')]);
				
        
            }
            return redirect()->back();
           
            
        

    }
    public function show6(Request $request){
      
   
        $imglink=cloudinary()->upload($request->file('profpic')->getRealPath())->getSecurePath();
        DB::table('users')->where('email',Auth::user()->email)->update(array(
            'profphoto'=>$imglink,
));

    
return redirect()->back();

    }
}

