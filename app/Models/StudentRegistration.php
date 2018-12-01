<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class StudentRegistration
{


    public static function register($firstName, $lastName, $Email, $stupassword)
    {

        $hashPass = password_hash($stupassword, PASSWORD_DEFAULT);
        //if(self::checkExists($Email) == false) {
            DB::insert('insert into student(firstName, lastName, stuEmail, stupassword) values (:firstName, :lastName, :stuEmail, :stupassword)',
                [':firstName' => $firstName, ':lastName' => $lastName, ':stuEmail' => $Email, ':stupassword' => $hashPass]);
        //}

    }


    public static function checkExists($Email){

        $count = DB::select('select count (stuEmail) from student where stuEmail = :stuEmail', ['stuEmail' => $Email]);

        if($count == 0){

            return false;

        }
        else{

            return "Email already exists";
        }


    }


}
