<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Chats extends Authenticatable
{
    protected $table = 'Chats';
    // The authentication guard for admin
    protected $guard = 'chats';

public static function getStatusTeacherCount($studentID){

    DB::select("SELECT c.teacherID, COUNT(m.messageID) FROM Chats  AS c INNER JOIN Messages AS m ON c.chatID = m.chatID WHERE c.studentID = :studentID AND
                      m.status = false AND m.isTeacher = true GROUP BY c.teacherID;", ["studentID"=> $studentID]);
}

}
