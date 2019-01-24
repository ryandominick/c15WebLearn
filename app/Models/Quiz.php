<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quiz extends Model
{

    public static function addQuestionMC($mcQuestion, $correctAns, $altAns1, $altAns2, $altAns3, $quizID)
    {

        DB::insert('insert into mcquestion(mcQuestion, correctAns, altAns1, altAns2, altAns3, quizID) values (:mcQuestion, :correctAns, :altAns1, :altAns2, :altAns3, :quizID)',

            [':mcQuestion' => $mcQuestion, ':correctAns' => $correctAns, ':altAns1' => $altAns1, ':altAns2' => $altAns2, ':altAns3' => $altAns3, ':quizID' => $quizID]);


    }

    public static function addQuestionInput($inputQuestion, $inputAnswer, $quizID)
    {

            DB::insert('insert into inputquestion(inputQuestion, inputAnswer, quizID) values (:inputQuestion, :inputAnswer, :quizID)',
                [':inputQuestion' => $inputQuestion, ':inputAnswer' => $inputAnswer, ':quizID' => $quizID]);


    }

    public static function findQuizID(){

        $maxID = DB::select('select max(quizID) from teacherquiz');

        $tempMaxID = get_object_vars($maxID[0]);

        return $tempMaxID;
    }

    public static function addDetails($quizID, $quizTitle, $quizStart, $quizEnd, $quizStatus, $duration, $moduleCode, $teacherID){

        DB::insert('insert into teacherquiz(quizID, quizTitle, quizStart, quizEnd, quizStatus, duration, moduleCode, teacherID) values (:quizID, :quizTitle, :quizStart, :quizEnd, :quizStatus, :duration, :moduleCode, :teacherID)',
        [':quizID' => $quizID, ':quizTitle' => $quizTitle, ':quizStart' => $quizStart, ':quizEnd' => $quizEnd, ':quizStatus' => $quizStatus, ':duration' => $duration, ':moduleCode' => $moduleCode, ':teacherID' => $teacherID]);

    }
}
