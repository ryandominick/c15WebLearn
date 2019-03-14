<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Response;


class assertQuizNotTaken
{
    /**
     * assert the requested quiz has not been taken by the student
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $results = Result::quizTaken(request()->input('quizID'), Auth::user()->id);



        If(!((int) $results[0]->taken)) {

            return $next($request);
       }else {

            //return new Response();
            return redirect('/student/search')->with('alert', "You already attempted this quiz");

        }
        }
}
