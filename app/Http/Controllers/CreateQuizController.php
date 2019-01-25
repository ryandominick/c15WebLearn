<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Quiz;
use Illuminate\Support\Facades\Session;

class CreateQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('createQuiz');
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
        //$mcCount = count(Input::get('mcQuestion'));
        //echo $mcCount;



        //return $request->all();

        //retrieve teacher ID from Session
        $teacherID = Session::get("id");
        //ignore module code for now

        //quiz ID
            $quizID = Quiz::findQuizID();

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

        Quiz::addDetails($newID, $quizTitle, $quizDateStart, $quizDateEnd, $quizStatus, $quizDuration, $moduleCode, $teacherID);

        //return $quizTitle;
        //----Multiple Choice Questions----//
    //retrieve arrays of question inputs, and set a count for the amount
        $mcCount = count(Input::get('mcQuestion'));
        $mcQuestion = Input::get('mcQuestion');
        $mcCorrectAns = Input::get('mcCorrectAnswer');
        $mcIncorrectAnswer1 = Input::get('mcIncorrectAnswer1');
        $mcIncorrectAnswer2 = Input::get('mcIncorrectAnswer2');
        $mcIncorrectAnswer3 = Input::get('mcIncorrectAnswer3');

        for($i = 0; $i < $mcCount; $i++){

           Quiz::addQuestionMC($mcQuestion[$i], $mcCorrectAns[$i], $mcIncorrectAnswer1[$i], $mcIncorrectAnswer2[$i], $mcIncorrectAnswer3[$i], $newID);

        }

        //----Input Questions----//

        $inputCount = count(Input::get('inputQuestion'));
        $inputQuestion = Input::get('inputQuestion');
        $inputAnswer = Input::get('inputAnswer');

        for ($i = 0; $i < $inputCount; $i++) {

           return Quiz::addQuestionInput($inputQuestion[$i], $inputAnswer[$i], $newID);

        }

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
