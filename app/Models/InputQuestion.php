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


}