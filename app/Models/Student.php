<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{

    use Notifiable;
    protected $table = 'Student';
    // Auth guard for admin
    protected $guard = 'student';

    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validateStudent($email){

        $sessionData =  DB::select(' SELECT DISTINCT studentID, firstName, lastName, stupassword FROM Student WHERE stuEmail = :email', ['email' => $email]);


        return $sessionData;
    }

    public static function register($firstName, $lastName, $Email, $stupassword, $courseID)
    {

        $hashPass = Hash::make($stupassword);
        //if(self::checkExists($Email) == false) {
        DB::insert('insert into student(firstName, lastName, email, password, courseID) values (:firstName, :lastName, :stuEmail, :stupassword, :courseID)',
            [':firstName' => $firstName, ':lastName' => $lastName, ':stuEmail' => $Email, ':stupassword' => $hashPass, ':courseID' => $courseID]);
        //}

    }

    public static function getID ($email){

        return DB::select('select id from Student where email= :email', [':email' => $email]);

    }


    public static function checkExists ($email){

        return DB::select('select email from Student where email= :email', ['email' => $email]);

    }

    public static function getCourseNameByStudentID ($studentID)
    {
        return DB::select("SELECT `courseName` FROM `Course` INNER JOIN Student ON Student.courseID = Course.courseID WHERE Student.id = :studentID", ['studentID' => $studentID]);
    }

<<<<<<< HEAD
    public static function getStudentDetails(){

        return DB::select('SELECT id, firstName, lastName, email FROM Student');

    }

    public static function removeStudent($id){

        DB::delete('DELETE FROM Student WHERE id = :studentID', ['studentID' => $id]);
        DB::delete('DELETE FROM result WHERE studentID = :studentID', ['studentID' => $id]);
    }

=======

    //B function to get courseID of a student for use in filtering the messenger lecturer selection query
    public static function getCourseID($studentID){

        return DB::select("SELECT courseID FROM Student WHERE id = :studentID", ['studentID' => $studentID]);

    }
>>>>>>> 3cc735349f6d814f34ed1bcd4486849788d089cd
}
