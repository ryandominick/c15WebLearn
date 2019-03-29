<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherQuiz;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    /**
     *Create a new controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     *
     * Show student homepage
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //retrieves quizzes based on teacher ID
       $quizzes = TeacherQuiz::teacherHomeQuizzes(Auth::user()->id);
       $submissions = array();
       //retrieves amount of submissions for each quiz
       foreach($quizzes as $quiz){
           $subAmount = (TeacherQuiz::teacherSubmissions($quiz->quizID))[0];
            array_push($submissions, $subAmount);

        }
        //returns this data to the view
        return view('teacherHomepage', array('quizzes' => $quizzes), array('submissions' => $submissions));

    }

    public function manage()
    {
        return view('manageStudents');
    }

    public function create()
    {
        return view('createQuiz');
    }

    public function profile()
    {
        return view('teacherProfile');
    }
}
