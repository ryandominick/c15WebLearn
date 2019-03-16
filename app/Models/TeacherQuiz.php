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

        $results = DB::select('SELECT t.quizTitle, t.moduleCode, m.moduleNamgit e, t.quizEnd, t.quizID FROM TeacherQuiz AS t INNER JOIN Module AS m ON t.moduleCode = 
        m.moduleCode WHERE t.quizTitle LIKE :quizTitle OR t.moduleCode LIKE :moduleCode OR m.moduleName LIKE :moduleName  
       ORDER BY m.moduleCode, t.quizEnd, t.quizTitle;', ['quizTitle' => '%'.$searchText.'%', 'moduleCode' => '%'.$searchText.'%', 'moduleName' => '%'.$searchText.'%']);

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

    public static function setupTimer($quizID, $studentID, $startTime){

        DB::insert("INSERT INTO QuizTimer (quizID, studentID, startTime) VALUES (:quizID, :studentID, :startTime);", ['quizID' => $quizID, 'studentID' => $studentID, 'startTime' => $startTime ]);
    }

    public static function getQuizTitle($quizID){

        $result = DB::select("SELECT quizTitle FROM TeacherQuiz WHERE quizID = :quizID", ['quizID' => $quizID]);

        return $result;
    }

    // processAttempt Queries


    public static function confirmQuestionCount($quizID){

       $result = DB::select("SELECT SUM(c) AS qcount FROM (SELECT COUNT(*) AS c FROM MCQuestion WHERE quizID = :quizID UNION ALL SELECT 
                          COUNT(*) AS c FROM InputQuestion WHERE quizID = :quizID1) AS a1;", ["quizID" => $quizID, "quizID1" => $quizID]);

       return $result;

    }


}

