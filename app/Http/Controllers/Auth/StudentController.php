<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Quiz;

class StudentController extends Controller
{
    /**
     *Create a new controller
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     *
     * Show student homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $modules = Quiz::getQuizzesByStudentID(Auth::user()->id);
        return view('studentHomepage', array('modules' => $modules));
    }


    public function results()
    {
        return view('myResults');
    }

    public function contactUs()
    {
        return view('contact');
    }
}
