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

    public static function getID ($email){

        return DB::select('select id from Teacher where email= :email', [':email' => $email]);

    }



}
