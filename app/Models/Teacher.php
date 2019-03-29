<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class Teacher extends Authenticatable
{
    protected $table = 'Teacher';
    // The authentication guard for admin
    protected $guard = 'teacher';

    public static function validateTeacher($email){

        $sessionData =  DB::select(' SELECT DISTINCT teacherID, firstName, lastName, teaPassword FROM Teacher WHERE teaEmail = :email', ['email' => $email]);


        return  $sessionData;
    }

    public static function register($firstName, $lastName, $Email, $teaPassword)
    {

        $Password = Hash::make($teaPassword);

        DB::insert('insert into Teacher(firstName, lastName, email, password) values (:firstName, :lastName, :teaEmail, :teaPassword)',
            [':firstName' => $firstName, ':lastName' => $lastName, ':teaEmail' => $Email, ':teaPassword' => $Password]);

        //}
    }

    public static function getID ($email)
    {

        return DB::select('select id from Teacher where email= :email', [':email' => $email]);

    }

    public static function messageDetails($courseID){

        return DB::select("SELECT t.firstName, t.lastName, t.id, m.moduleName, tq.moduleCode FROM Teacher AS t 
                                  INNER JOIN TeacherQuiz AS tq ON t.id = tq.teacherID INNER JOIN Module AS m on tq.moduleCode = m.moduleCode 
                                  INNER JOIN Course AS c ON c.courseID = m.courseID INNER JOIN Student AS s ON s.courseID = c.courseID 
                                  LEFT JOIN Chats AS ch ON ch.studentID = s.id LEFT JOIN Messages AS me ON ch.chatID = me.chatID  WHERE c.courseID = :courseID 
                                  GROUP BY t.id, tq.moduleCode;", ['courseID' => $courseID]);
    }

}
