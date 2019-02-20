<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Result extends Model
{

    protected $table = 'Model';


    public static function quizTaken($quizID, $studentID){
        $results = DB::select('SELECT EXISTS(SELECT * FROM Result WHERE  (quizID = :quizID AND studentID = :studentID LIMIT 1))',
            ['quizID' => $quizID, 'studentID' => $studentID]);

        return $results;
    }
}
