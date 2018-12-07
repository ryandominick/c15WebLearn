<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;




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
        //if(self::checkExists($Email) == false) {
        DB::insert('insert into teacher(firstName, lastName, teaEmail, teaPassword) values (:firstName, :lastName, :teaEmail, :teaPassword)',
            [':firstName' => $firstName, ':lastName' => $lastName, ':teaEmail' => $Email, ':teaPassword' => $Password]);

        //}
    }

    public static function checkExists($Email){

        $count = DB::select('select count(teaEmail) from teacher where teaEmail = :teaEmail', [':teaEmail' => $Email]);

        if($count == 0){

            return false;

        }
        else{

            return "Email already exists";
        }


    }
}
