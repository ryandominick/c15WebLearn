<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Message extends Model
{
    public static function createMessage($messageID, $body, $user_type, $timestamps, $studentID, $teacherID)
    {

        DB::insert('insert into  messages(messageID, body, user_type, timestamps, studentID, teacherID) values (:messageID, :body, :user_type, :timestamps, :studentID, :teacherID)',

            [':messageID' => $messageID, ':body' => $body, ':user_type' => $user_type, ':timestamps' => $timestamps, ':studentID' => $studentID, ':teacherID' => $teacherID]);

    }


    //public static function addQuestionMC($mcQuestion, $correctAns, $altAns1, $altAns2, $altAns3, $quizID)
    //DB::insert('insert into mcquestion(mcQuestion, correctAns, altAns1, altAns2, altAns3, quizID) values (:mcQuestion, :correctAns, :altAns1, :altAns2, :altAns3, :quizID)',
    //
    //            [':mcQuestion' => $mcQuestion, ':correctAns' => $correctAns, ':altAns1' => $altAns1, ':altAns2' => $altAns2, ':altAns3' => $altAns3, ':quizID' => $quizID]);
}

