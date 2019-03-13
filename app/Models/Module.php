<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Module extends Model
{

    public static function getQuizInfo()
    {
        return DB::select("SELECT `moduleCode`, `quizTitle`, `quizEnd`, `quizStatus`, `duration` FROM `TeacherQuiz`");
    }

}