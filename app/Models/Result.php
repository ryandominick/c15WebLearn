<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Result extends Model
{

    protected $table = 'Model';


    public static function quizTaken($quizID, $studentID){
        $results = DB::select('SELECT EXISTS(SELECT * FROM Result WHERE  quizID = :quizID AND studentID = :studentID LIMIT 1) AS taken;',
            ['quizID' => $quizID, 'studentID' => $studentID]);

        return $results;
    }

    public static function storeGrade($quizID, $studentID, $grade){
        DB::insert('INSERT INTO Result (quizID, studentID, grade) VALUES (:quizID, :studentID, :grade)',
            ['quizID' => $quizID, 'studentID' => $studentID, 'grade' => $grade]);


    }
}
