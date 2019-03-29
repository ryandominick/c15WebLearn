<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\TeacherQuiz;

class ManageStudentsController extends Controller
{

    /**
     *Create a new controller
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index(){
        //retrieves results from query in Student model
        $students = Student::getStudentDetails();
        //returns the manageStudents view with the results variable
        return view('manageStudents', array ('students' => $students));

    }

    public function removeStudent(Request $request){
        //retrieves the ID of the selected student sent in the AJAX request
        $id = $request->input('studentID');
        //parses this ID into the query in the Student Model
        Student::removeStudent($id);
        //returns "1" to the AJAX call to identify that the query was complete
        return "1";

    }

}