<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Quiz extends Model
{
    public static function getQuizzesByStudentID($studentID)
    {
        return DB::select("
          SELECT Module.moduleCode, TeacherQuiz.quizTitle, TeacherQuiz.quizEnd, TeacherQuiz.duration FROM Student
          INNER JOIN Course ON Course.courseID = Student.courseID
          INNER JOIN Module ON Module.courseID = Course.courseID
          INNER JOIN TeacherQuiz ON TeacherQuiz.moduleCode = Module.moduleCode
          WHERE Student.ID = :studentID",  ['studentID' => $studentID]);
    }
}
