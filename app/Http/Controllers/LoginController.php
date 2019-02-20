<?php


namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;


class LoginController extends Controller
{



    public function login()
    {
        return view("login");


        //$request->session()->regenerate();
    }


    //-----------------------------------------------------------------------------------------------------------------

//$email = $request->get('email');
//$password = $request->get('password');
//
//
//
//if(intval($studentData = Student::validateStudent($email)) > 0){
//if(password_verify($password, $studentData[0]->stupassword)){
//    //if(Hash::check($password, $studentData[0]->stupassword)){
//$this->storeSession($request, $studentData[0]->studentID, $studentData[0]->firstName, $studentData[0]->lastName, 'S');
//return view('studentHomepage');
//    //>with('firstname', $request->session()->get('firstname'));
//}
//
//}else if(intval($teacherData = Teacher::validateTeacher($email)) > 0 ){
//    //if(Hash::check($password, $teacherData[0]->teaPassword)){
//    if(password_verify($password, $teacherData[0]->teaPassword)){
//        $this->storeSession($request, $teacherData[0]->teacherID, $teacherData[0]->firstName, $teacherData[0]->lastName, 'T');
//        return view('teacherHomepage');
//        //->with('firstname', $request->session()->get('firstname'));
//    }
//}
//
//return redirect('/login');
//



    //-----------------------------------------------------------------------------------------------------------------



    public function accessSession(Request $request){
        if($request->session()->has('firstname'))
            alert($request->session()->get('firstname'));
        else
            alert("no data in the session");
    }

    public function storeSession(Request $request, $id, $firstname, $lastname, $account){
        $request->session()->put(['id'=> $id, 'firstname' => $firstname, 'lastname' => $lastname, 'account' => $account]);
        $request->session()->save();
    }

    public function deleteSession(Request $request){
        $request->session()->flush();
    }
}

