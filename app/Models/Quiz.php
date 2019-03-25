<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Quiz extends Model
{
    public static function getQuizzesByStudentID($studentID)
    {
        return DB::select("
          SELECT m.moduleCode, t.quizTitle, t.quizEnd, t.duration FROM Student AS s
          INNER JOIN Course AS c ON c.courseID = s.courseID
          INNER JOIN Module AS m ON m.courseID = c.courseID
          INNER JOIN TeacherQuiz AS t ON t.moduleCode = m.moduleCode
          WHERE s.id = :studentID  AND  (t.quizEnd BETWEEN NOW() AND DATE_ADD(NOW(),INTERVAL 7 DAY)) AND 
          NOT EXISTS (SELECT * FROM Result AS r WHERE r.quizID = t.quizID AND 
          r.studentID = :studentID1) LIMIT 20;  ",  ['studentID' => $studentID, 'studentID1' => $studentID]);
    }
}
