<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class TeacherRegistration
{


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
