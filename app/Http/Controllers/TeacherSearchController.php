<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherQuiz;

class TeacherSearchController extends Controller
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


    public function index(){

        return view('teacherSearch');

    }

    public function query(Request $request){

        $results =  TeacherQuiz::teacherSearch($request->input('searchInput'));

        return response()->json($results);

    }
}
