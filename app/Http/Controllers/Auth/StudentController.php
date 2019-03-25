<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Result;
use App\Models\TeacherQuiz;
use Illuminate\Support\Facades\Auth;

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
        $modules = TeacherQuiz::getQuizzesByStudentID(Auth::user()->id);
        return view('studentHomepage', array('modules' => $modules));
    }


    public function results()
    {
        $grades = Result::getGradesByStudentID(Auth::user()->id);
        return view('myResults', array('grades' => $grades));
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function profile()
    {
        $courseName = Student::getCourseNameByStudentID(Auth::user()->id)[0];
        return view('studentProfile', array('courseName' => $courseName));
    }
}
