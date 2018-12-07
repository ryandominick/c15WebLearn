<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Teacher extends Model
{
    protected $table = 'Teacher';

    public function validateTeacher($email){

        $sessionData =  DB::select(' SELECT DISTINCT teacherID, firstName, lastName, teaPassword FROM Teacher WHERE teaEmail = :email', ['email' => $email]);


        return  $sessionData;
    }
}
