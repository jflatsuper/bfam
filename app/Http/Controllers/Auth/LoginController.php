<?php

namespace App\Http\Controllers\Auth;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\User;
use App\Models\StudentCourse;
use App\Exceptions\InvalidOrderException;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    
use AuthenticatesUsers;
   
   
protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    public function login(Request $request)
    {
        
    
        $user = User::where('phone', $request->get('phone'))->first();
    
        // Check Condition Mobile No. Found or Not
        if($request->get('phone') != $user['phone']) {
   
            return back();
        }        
        if($request->get('email') != $user['email']) {
   
            return back();
        }       
    if ($user){
        Auth::login($user, true);
       $vars= StudentCourse::where('user_id', Auth::user()->id)->pluck('course_id')->toArray();
       
       $select = DB::select('select * from CourseTable where id in ('.implode(", ",$vars).')');
    
        if(Auth::user()->usertype=='Administrator')
        {return  redirect('admin')->with('name', $select);
        }
        else
        {
            return redirect('home')->with('name', $select);;
        }
        
        
    }
    else{
        return redirect()->back();
    }
        
       
     
    

    }
    protected function redirectTo(){
        if(Auth::user()->usertype=='Administrator')
        {
            return 'admin';
        }else
        {
            return 'home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}
