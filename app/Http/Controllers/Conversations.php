<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Conversations extends Controller
{


    function getData(){
        $data['data'] = DB::table('Student')->get();

        if(count($data) > 0) {
            return view('displayMessages', $data);
        }
        else {
            return view('displayMessages');
        }
    }
}
