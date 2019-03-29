<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TeacherQuiz extends Model
{

    protected $table = 'TeacherQuiz';

    public static function studentSearch($searchText){

        $results = DB::select('SELECT t.quizTitle, t.moduleCode, m.moduleName, t.quizEnd, r.grade, t.quizID, t.duration FROM TeacherQuiz AS t INNER JOIN Module AS m ON t.moduleCode = 
        m.moduleCode LEFT JOIN Result AS r ON t.quizID = r.quizID WHERE  (t.quizTitle LIKE :quizTitle OR t.moduleCode LIKE :moduleCode OR m.moduleName LIKE :moduleName) AND 
        (r.studentID = :studentID OR r.studentID IS NULL) ORDER BY m.moduleCode, t.quizEnd, t.quizTitle;', ['quizTitle' => '%'.$searchText.'%', 'moduleCode' => '%'.$searchText.'%', 'moduleName' => '%'.$searchText.'%', 'studentID' =>  Session::get("id")]);

        return $results;
    }

    public static function teacherSearch($searchText){

        $results = DB::select('SELECT t.quizTitle, t.moduleCode, m.moduleName, t.quizEnd, t.quizID FROM TeacherQuiz AS t INNER JOIN Module AS m ON t.moduleCode = 
        m.moduleCode WHERE t.quizTitle LIKE :quizTitle OR t.moduleCode LIKE :moduleCode OR m.moduleName LIKE :moduleName  
       ORDER BY m.moduleCode, t.quizEnd, t.quizTitle;', ['quizTitle' => '%'.$searchText.'%', 'moduleCode' => '%'.$searchText.'%', 'moduleName' => '%'.$searchText.'%']);

        return $results;
    }

    public static function teacherHomeQuizzes($teacherID){

        $results = DB::select('SELECT quizID, quizTitle, moduleCode, quizEnd FROM TeacherQuiz WHERE teacherID = :teacherID AND 
        (quizEnd BETWEEN NOW() AND DATE_ADD(NOW(),INTERVAL 7 DAY));', ['teacherID' => $teacherID]);

        return $results;
    }

    public static function teacherSubmissions($quizID){

        $results = DB::select('SELECT COUNT(quizID) AS sub FROM result WHERE quizID = :quizID;',['quizID' => $quizID]);

        return $results;
    }

    public static function teacherQuizExpand($quizID){
        $results = DB::select('SELECT s.firstName, s.lastName, r.grade FROM  Result AS r INNER JOIN  Student AS s ON r.studentID = s.id WHERE  r.quizID = :quizID;',
            ['quizID' => $quizID]);

        return $results;
    }

    public static function assertQuizExists($quizID){
        $results = DB::select('SELECT EXISTS(SELECT * FROM TeacherQuiz WHERE quizID = :quizID) AS quiz', ['quizID' => $quizID]);

        return $results;
    }

    public static function findQuizID(){

        $maxID = DB::select('select max(quizID) from teacherquiz;');

        $tempMaxID = get_object_vars($maxID[0]);

        return $tempMaxID;
    }

    public static function addDetails($quizID, $quizTitle, $quizStart, $quizEnd, $quizStatus, $duration, $moduleCode, $teacherID){

        DB::insert('insert into teacherquiz(quizID, quizTitle, quizStart, quizEnd, quizStatus, duration, moduleCode, teacherID) values (:quizID, :quizTitle, :quizStart, :quizEnd, :quizStatus, :duration, :moduleCode, :teacherID)',
            ['quizID' => $quizID, 'quizTitle' => $quizTitle, 'quizStart' => $quizStart, 'quizEnd' => $quizEnd, 'quizStatus' => $quizStatus, 'duration' => $duration, 'moduleCode' => $moduleCode, 'teacherID' => $teacherID]);

    }

    public static function getMCQuestions($quizID){

        $results = DB::select('SELECT m.mcID, m.McQuestion, m.correctAns, m.altAns1, m.altAns2, m.altAns3 FROM MCQuestion AS m WHERE m.quizID = :quizID;', ['quizID' => $quizID]);

    return $results;
    }

    public static function getInputQuestions($quizID){

        $results = DB::select('SELECT i.inputQuestionID, i.inputQuestion FROM InputQuestion AS i WHERE i.quizID = :quizID', ['quizID' => $quizID]);

        return $results;
    }

    public static function getJSQuestions($quizID){

        $results = DB::select('SELECT i.jsID, i.jsQuestion, i.jsInput, i.jsOutput FROM JSQuestion AS i WHERE i.quizID = :quizID', ['quizID' => $quizID]);

        return $results;

    }

    public static function setupTimer($quizID, $studentID, $startTime){

        DB::insert("INSERT INTO QuizTimer (quizID, studentID, startTime) VALUES (:quizID, :studentID, :startTime);", ['quizID' => $quizID, 'studentID' => $studentID, 'startTime' => $startTime ]);
    }

    public static function getQuizTitle($quizID){

        $result = DB::select("SELECT quizTitle, duration FROM TeacherQuiz WHERE quizID = :quizID", ['quizID' => $quizID]);

        return $result;
    }

    // processAttempt Queries


    public static function confirmQuestionCount($quizID){

       $result = DB::select("SELECT SUM(c) AS qcount FROM (SELECT COUNT(*) AS c FROM MCQuestion WHERE quizID = :quizID UNION ALL SELECT 
                          COUNT(*) AS c FROM InputQuestion WHERE quizID = :quizID1 UNION ALL SELECT COUNT(*) AS c FROM JSQuestion WHERE quizID = :quizID2) AS a1;", ["quizID" => $quizID, "quizID1" => $quizID, "quizID2" => $quizID]);

       return $result;

    }

    public static function getQuizzesByStudentID($studentID)
    {
        return DB::select("
          SELECT t.quizID, m.moduleCode, t.quizTitle, t.quizEnd, t.duration FROM Student AS s
          INNER JOIN Course AS c ON c.courseID = s.courseID
          INNER JOIN Module AS m ON m.courseID = c.courseID
          INNER JOIN TeacherQuiz AS t ON t.moduleCode = m.moduleCode
          WHERE s.id = :studentID  AND  (t.quizEnd BETWEEN NOW() AND DATE_ADD(NOW(),INTERVAL 7 DAY)) AND 
          NOT EXISTS (SELECT * FROM Result AS r WHERE r.quizID = t.quizID AND 
          r.studentID = :studentID1) LIMIT 20;  ",  ['studentID' => $studentID, 'studentID1' => $studentID]);
    }


}

