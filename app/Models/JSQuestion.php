<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JSQuestion extends Model
{
    public static function addQuestionJS($jsquestion, $input, $output, $quizID)
    {
        //adds javascript question details to Jsquestion table
        DB::insert('insert into Jsquestion(jsQuestion, jsInput, jsOutput, quizID) values (:jsQuestion, :input, :output, :quizID)',

            [':jsQuestion' => $jsquestion, ':input' => $input, ':output' => $output, ':quizID' => $quizID]);


    }

    public static function countQuestions($quizID){
        //counts the amount of Javascript questions are in the jsQuestion table
        $questionCount = DB::select('select count(jsQuestion) AS jsQuestionC from JSQuestion where (quizID = :quizID) ',['quizID' => $quizID]);

        return $questionCount;
    }


    public static function retrieveParameters($quizID){

        $parameters = DB::select('select jsInput from JSQuestion where (quizID = :quizID)', ['quizID' => $quizID]);
        return $parameters;
    }
    public static function compareAnswerJS($jsID, $answer){

        $results = DB::select('SELECT EXISTS (SELECT * FROM JSQuestion WHERE ( jsID = :jsID AND jsOutput = :answer)) AS correct',
            ['jsID' => $jsID, 'answer' => $answer]);

        return $results;
    }



}