<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Student extends Model
{

    protected $table = 'Student';

    public function validateStudent($email){

        $sessionData =  DB::select(' SELECT DISTINCT studentID, firstName, lastName, stupassword FROM Student WHERE stuEmail = :email', ['email' => $email]);

        //$builder = new Builder('');

        return $sessionData;
    }


}
