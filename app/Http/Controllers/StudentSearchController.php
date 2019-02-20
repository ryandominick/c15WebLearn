<?php

namespace App\Http\Controllers;

use App\Models\TeacherQuiz;
use Illuminate\Http\Request;

class StudentSearchController extends Controller
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

        return view('studentSearch');

    }

    public function query(Request $request){

        $results =  TeacherQuiz::studentSearch($request->input('searchInput'));

        return response()->json($results);

    }
}
