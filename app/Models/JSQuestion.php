<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JSQuestion extends Model
{
    public static function addQuestionJS($jsquestion, $input, $output, $type, $quizID)
    {

        DB::insert('insert into Jsquestion(jsQuestion, jsInput, jsOutput, jsType, quizID) values (:jsQuestion, :input, :output, :type, :quizID)',

            [':jsQuestion' => $jsquestion, ':input' => $input, ':output' => $output, ':type' => $type, ':quizID' => $quizID]);


    }

    public static function countQuestions($quizID){

        $questionCount = DB::select('select count(jsQuestion) from JSQuestion where (quizID = :quizID)',['quizID' => $quizID]);

        return $questionCount;
    }


}