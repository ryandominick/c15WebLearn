<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use App\Models\TeacherRegistration;
use Illuminate\Http\Request;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $correctKey = '123';
            $key = $request ['teacherKey'];
            $userType = $request['userType'];
            $firstName = $request['firstName'];
            $lastName = $request['lastName'];
            $Email = $request['email'];
            $password = $request['password'];

            if($userType === "student") {
                StudentRegistration::register($firstName, $lastName, $Email, $password);
                return redirect('/login');
            }
            elseif ($userType === "teacher"){
                if ($key === $correctKey) {
                    TeacherRegistration::register($firstName, $lastName, $Email, $password);
                    return redirect('/login');
                }
                else{

                    return "wrong key";
                }


            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
