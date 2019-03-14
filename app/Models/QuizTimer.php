<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuizTimer extends Model
{
    protected $table = 'QuizTimer';

    public static function assertStartedAndTimely($quizID, $studentID){

        $result = DB::select("SELECT EXISTS ( SELECT * FROM QuizTimer WHERE quizID = :quizID AND studentID = :studentID AND NOW() < 
                        ADDTIME((SELECT startTime FROM QuizTimer WHERE quizID = :quizID1 AND studentID = :studentID1) , (SELECT duration FROM 
                        TeacherQuiz WHERE quizID = :quizID2))) AS valSubmission;", ["quizID" => $quizID, "studentID" => $studentID,"quizID1" => $quizID, "studentID1" => $studentID,"quizID2" => $quizID ]);

        return $result;

    }

    public static function removeTimerEntry($quizID, $studentID){

        DB::delete("DELETE FROM QuizTimer WHERE quizID = quizID AND studentID = studentID;", ["quizID"=>$quizID, "studentID" => $studentID]);
    }

    public static function assertNotStarted($quizID, $studentID){

       $results =  DB::select("SELECT EXISTS ( SELECT * FROM QuizTimer WHERE quizID = :quizID AND studentID = :studentID) AS started;", ['quizID'=> $quizID ,'studentID'=> $studentID]);
        return $results;
    }

}
