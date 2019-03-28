<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Chats;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentMessageController extends Controller
{
    /**
     *Create a new controller
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:student');
    }


    public function index(){

         return view("studentMessage");
    }


    public function getTeachers(){

        $courseID = Student::getCourseID(Auth::user()->id);

        return Teacher::messageDetails($courseID[0]->courseID);

    }

    public function getChatStatus(){

      return Chats::getStatusCount(Auth::user()->id);

    }


}
