<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Result;


class assertQuizNotTaken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $results = Result::quizTaken("sdfg","erb");
        If(0) {
            return $next($request);
        }


        return redirect('/student/search')->with('message_error', "You already attempted this");

        }
}
