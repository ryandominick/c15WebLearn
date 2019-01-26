<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

            //Ryan changes start:
            //gets the ID of the email address from database
            $id = Teacher::getID($request->email);
            //extracts the array from the returned object
            $extractID = get_object_vars($id[0]);
            //adds the element of the extracted array to the session with key "id"
            Session::put("id", $extractID['id']);
            //Ryan changes end.

            return redirect()->route('teacher.home');
        }

        return redirect()->back()->WithInput($request->only('email', 'remember'));

    }

    public function teacherLogout(){
        Auth::guard('teacher')->logout();

        return redirect()->route('teacher.home');
    }
}
