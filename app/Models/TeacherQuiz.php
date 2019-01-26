<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeacherQuiz extends Model
{
    protected $table = 'TeacherQuiz';

    public static function studentSearch($searchText){

       $results = DB::select('SELECT t.quizTitle, t.moduleCode, m.moduleName, t.quizEnd, r.grade, t.quizID, t.duration FROM TeacherQuiz AS t INNER JOIN Module AS m ON t.moduleCode = 
        m.moduleCode LEFT JOIN Result AS r ON t.quizID = r.quizID WHERE  (t.quizTitle LIKE :quizTitle OR t.moduleCode LIKE :moduleCode OR m.moduleName LIKE :moduleName) AND 
        (r.studentID = 3 OR r.studentID IS NULL) ORDER BY m.moduleCode, quizEnd, quizTitle;', ['quizTitle' => '%'.$searchText.'%', 'moduleCode' => '%'.$searchText.'%', 'moduleName' => '%'.$searchText.'%']);

       return $results;
    }


    public static function teacherSearch(){

    }
}
