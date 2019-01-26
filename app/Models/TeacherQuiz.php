<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeacherQuiz extends Model
{
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