<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class StudentController extends Controller
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

    /**
     *
     * Show student homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studentHomepage');
    }


    public function results()
    {
        return view('myResults');
    }

}
