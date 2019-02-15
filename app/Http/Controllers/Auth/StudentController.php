<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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

    public function contactUs()
    {
        return view('contact');
    }

    public function settings()
    {
        $data['data'] = DB::table('Course')->get();

        if(count($data) > 0)
        {
            return view('settings', $data);
        }
        else {
            return view ('settings');
        }
    }
}
