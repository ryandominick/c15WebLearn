<?php

namespace App\Http\Controllers;

use App\Models\JSQuestion;
use App\Models\TeacherQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class JSQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        return view('createJSQuiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //retrieve teacher ID from Session
        $teacherID = Session::get("id");
        //ignore module code for now

        //quiz ID
        $quizID = TeacherQuiz::findQuizID();

        $newID = $quizID["max(quizID)"] + 1;

        //return $quizIDString;
        //add quizTitle,quizstart,quizend,quizstatus,duration,module code,teacherID to teachquiz table

        $quizTitle = $request ['quizTitle'];
        $quizDateStart = $request ['quizDateStart'];
        $quizDateEnd = $request ['quizDateEnd'];
        $quizDuration = $request ['timer'];
        $moduleCode = $request ['moduleCode'];
        $quizStatus = "active";

        if($quizDateStart > time()){

            $quizStatus = "queued";
        };

        TeacherQuiz::addDetails($newID, $quizTitle, $quizDateStart, $quizDateEnd, $quizStatus, $quizDuration, $moduleCode, $teacherID);


        $jsquestion = Input::get('jsquestion');
        $input = Input::get('input');
        $output = Input::get('output');
        $type = Input::get('type');

        JSQuestion::addQuestionJS($jsquestion, $input, $output, $type, $newID);

        return view('teacherHomepage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
