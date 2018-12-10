<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class TeacherController extends Controller
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

    /**
     *
     * Show student homepage
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('teacherHomepage');
    }
}