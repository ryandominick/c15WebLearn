<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InputQuestion extends Model
{
    public static function addQuestionInput($inputQuestion, $inputAnswer, $quizID)
    {

        DB::insert('insert into inputquestion(inputQuestion, inputAnswer, quizID) values (:inputQuestion, :inputAnswer, :quizID)',
            [':inputQuestion' => $inputQuestion, ':inputAnswer' => $inputAnswer, ':quizID' => $quizID]);

    }

    public static function compareAnswerInput($inputQuestionID, $inputAnswer){

      $results =  DB::select('SELECT EXISTS (SELECT * FROM InputQuestion WHERE ( inputQuestionID = :inputQuestionID AND inputAnswer = :inputAnswer)) AS correct',
            ['inputQuestionID' => $inputQuestionID, 'inputAnswer' => $inputAnswer]);

      return $results;
    }

    public static function countQuestions($quizID){

        $questionCount = DB::select('select count(inputQuestion) from InputQuestion where (quizID = :quizID)',['quizID' => $quizID]);

        return $questionCount;
    }


}