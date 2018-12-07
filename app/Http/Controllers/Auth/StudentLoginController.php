<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('guest:student')->except('studentLogout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

//   protected function guard(){
//        return Auth::guard('student');
//    }

    /**
     * redirect after login
     *???need
     */

    //protected $redirectTo = 'student/home';

    public function studentLogin(Request $request)
    {
        // Validate form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('student')->attempt(['email'=> $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->route('student.home');
        }
        return redirect()->back()->WithInput($request->only('email', 'remember'));
    }

    public function studentLogout(){
        Auth::guard('student')->logout();
        //$request->session()->flush();
        return redirect()->route('student.home');
    }
}
