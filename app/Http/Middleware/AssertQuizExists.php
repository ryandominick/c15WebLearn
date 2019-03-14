<?php

namespace App\Http\Middleware;

use App\Models\TeacherQuiz;
use Closure;

class AssertQuizExists
{
    /**
     * assert the requested quiz exists
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $results = TeacherQuiz::assertQuizExists(request()->input('quizID'));

        if($results[0]->quiz){

        return $next($request);

            }else{
            return redirect('/student/search')->with('alert', "This quiz was not found");
        }
    }
}
