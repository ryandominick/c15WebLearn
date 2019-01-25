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

    public static function register($firstName, $lastName, $Email, $stupassword)
    {

        $hashPass = Hash::make($stupassword);
        //if(self::checkExists($Email) == false) {
        DB::insert('insert into student(firstName, lastName, email, password) values (:firstName, :lastName, :stuEmail, :stupassword)',
            [':firstName' => $firstName, ':lastName' => $lastName, ':stuEmail' => $Email, ':stupassword' => $hashPass]);
        //}

    }

    public static function getID ($email){

        return DB::select('select id from Student where email= :email', [':email' => $email]);

    }





}
