<?php

namespace App\Http\Controllers;

use App\Models\InputQuestion;
use App\Models\JSQuestion;
use App\Models\MCQuestion;
use App\Models\TeacherQuiz;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CreateQuizController extends Controller
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
        $teacherID = Session::get("id");

        //gets the last quiz ID from the database
        $quizID = TeacherQuiz::findQuizID();
        //uses this to create a new quizID
        $newID = $quizID["max(quizID)"] + 1;

        //assign request data to variables
        $quizTitle = $request ['quizTitle'];
        $quizDateStart = $request ['quizDateStart'];
        $quizDateEnd = $request ['quizDateEnd'];
        $quizDuration = $request ['timer'];
        $moduleCode = $request ['moduleCode'];
        $quizStatus = "active";
        //parses these details into an SQL query in the TeacherQuiz model.
        TeacherQuiz::addDetails($newID, $quizTitle, $quizDateStart, $quizDateEnd, $quizStatus, $quizDuration, $moduleCode, $teacherID);

        //checks if any multiple choice questions have been entered
        if(Input::get('mcQuestion') != null) {
            //gets the amount of multiple choice questions that need to be entered
            $mcCount = count(Input::get('mcQuestion'));
            //assigns the inputs to array variables
            $mcQuestion = Input::get('mcQuestion');
            $mcCorrectAns = Input::get('mcCorrectAnswer');
            $mcIncorrectAnswer1 = Input::get('mcIncorrectAnswer1');
            $mcIncorrectAnswer2 = Input::get('mcIncorrectAnswer2');
            $mcIncorrectAnswer3 = Input::get('mcIncorrectAnswer3');
            //adds each question to the database through a query in the MCQuestion model.
            for ($i = 0; $i < $mcCount; $i++) {
                MCQuestion::addQuestionMC($mcQuestion[$i], $mcCorrectAns[$i], $mcIncorrectAnswer1[$i], $mcIncorrectAnswer2[$i], $mcIncorrectAnswer3[$i], $newID);

            }
        }

        //----Input Questions----//
        //checks if any input questions have been entered
        if(Input::get('inputQuestion') != null) {
            //assigns the inputs to array variables
            $inputCount = count(Input::get('inputQuestion'));
            $inputQuestion = Input::get('inputQuestion');
            $inputAnswer = Input::get('inputAnswer');

            for ($i = 0; $i < $inputCount; $i++) {
                //adds each question to the database through a query in the InputQuestion model.
                InputQuestion::addQuestionInput($inputQuestion[$i], $inputAnswer[$i], $newID);

            }
        }
        //checks if any javascript questions have been entered
        if(Input::get('jsQuestion') != null) {
            //assigns the inputs to array variables
            $jsCount = count(Input::get('jsQuestion'));
            $jsQuestion = Input::get('jsQuestion');
            $jsInput1 = Input::get('jsInput1');
            $jsInput1Type = Input::get('jsInputType1');
            $jsInput2 = Input::get('jsInput2');
            $jsInput2Type = Input::get('jsInputType2');
            $jsInput3 = Input::get('jsInput3');
            $jsInput3Type = Input::get('jsInputType3');
            $jsInput4 = Input::get('jsInput4');
            $jsInput4Type = Input::get('jsInputType4');
            $jsInput5 = Input::get('jsInput5');
            $jsInput5Type = Input::get('jsInputType5');
            $jsOutput = Input::get('jsOutput');

            for ($i = 0; $i < $jsCount; $i++) {
                //concatenate inputs so they can be stored in 1 field in the database. Separated with ",+-+," to allow
                //separation when retrieving. Separator is used so that arrays seperated with "," are unaffected.
                $jsInput = $jsInput1Type[$i].$jsInput1[$i].",+-+,".$jsInput2Type[$i].$jsInput2[$i].",+-+,".$jsInput3Type[$i].$jsInput3[$i].",+-+,".$jsInput4Type[$i].$jsInput4[$i].",+-+,".$jsInput5Type[$i].$jsInput5[$i];

                JSQuestion::addQuestionJS($jsQuestion[$i], $jsInput, $jsOutput[$i], $newID);
            }
        }

        return redirect('teacher/home')->with('created', 'Quiz created successfully');
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
