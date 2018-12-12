<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |-------------------------------------------------- ------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('guest:teacher')->except('teacherLogout');
    }
//    /**
//    * Where to redirect users after login.
//     *
//    * @var string
//     */


    //protected $redirectTo = 'teacher/home';

    public function showLoginForm()
    {
        return view('login');
    }

    public function teacherLogin(Request $request)
    {
        // Validate form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('teacher')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
           // return redirect()->intended(route('teacher.home'));
            return redirect()->route('teacher.home');
        }
        return redirect()->back()->WithInput($request->only('email', 'remember'));

    }

    public function teacherLogout(){
        Auth::guard('teacher')->logout();

        return redirect()->route('teacher.home');
    }
}
