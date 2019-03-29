<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    public static function getCourseID($courseName)
    {
        //retrieves course ID based on course name
        return DB::select('select courseID from course where courseName= :courseName', [':courseName' => $courseName]);

    }

}