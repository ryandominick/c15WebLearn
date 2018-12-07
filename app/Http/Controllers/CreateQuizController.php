<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        //retrieve teacher ID from Session
        $studentID = $_SESSION["id"];
        //assign to variable

        //ignore module code for now


        //add quizTitle,quizstart,quizend,quizstatus,duration,module code,teacherID to teachquiz table
        $quizTitle = $request ['quizTitle'];
        $quizDateStart = $request ['quizDateStart'];
        $quizDateEnd = $request ['quizDateEnd'];
        $quizDuration = $request ['timer'];
        $quizStatus = "active";
        if($quizDateStart > time()){

            $quizStatus = "queued";
        };
        //----Multiple Choice Questions----//
    //retrieve arrays of question inputs, and set a count for the amount
        $mcCount = count(Input::get('mcQuestion'));
        $mcQuestion = Input::get('mcQuestion');
        $mcCorrectAnswer = Input::get('mcCorrectAnswer');
        $mcIncorrectAnswer1 = Input::get('mcIncorrectAnswer1');
        $mcIncorrectAnswer2 = Input::get('mcIncorrectAnswer1');
        $mcIncorrectAnswer3 = Input::get('mcIncorrectAnswer1');
        //add question arrays to respective question tables
        //return $mcQuestions;
        $mcQuestions = array();
        for($i=0;$i<$mcCount;$i++){
            $mcQuestions(
              array($mcQuestion[$i],$mcCorrectAnswer[$i],$mcIncorrectAnswer1[$i],$mcIncorrectAnswer2[$i],$mcIncorrectAnswer3[$i])
            );
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
