<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentTakeQuizController extends Controller
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

    public function index(){

        return view('studentTakeQuiz');

    }

}
