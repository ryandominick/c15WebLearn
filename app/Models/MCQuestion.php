<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MCQuestion extends Model
{
    public static function addQuestionMC($mcQuestion, $correctAns, $altAns1, $altAns2, $altAns3, $quizID)
    {

        DB::insert('insert into mcquestion(mcQuestion, correctAns, altAns1, altAns2, altAns3, quizID) values (:mcQuestion, :correctAns, :altAns1, :altAns2, :altAns3, :quizID)',

            [':mcQuestion' => $mcQuestion, ':correctAns' => $correctAns, ':altAns1' => $altAns1, ':altAns2' => $altAns2, ':altAns3' => $altAns3, ':quizID' => $quizID]);


    }


}