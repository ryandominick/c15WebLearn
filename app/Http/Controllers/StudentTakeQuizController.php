<?php

namespace App\Http\Controllers;

use App\Models\TeacherQuiz;
use App\Models\MCQuestion;
use App\Models\InputQuestion;
use App\Models\QuizTimer;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentTakeQuizController extends Controller
{
     /**
 *Create the StudentTakeQuizController
 *
 * @return void
 */

    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index(){

        $mQuestionsRet = array();
        $quiz = request()->input('quizID');
        $user = Auth::user()->id;

        $mQuestions = TeacherQuiz::getMCQuestions($quiz);
        $iQuestions = TeacherQuiz::getInputQuestions($quiz);
        $jQuestions = TeacherQuiz::getJSQuestions($quiz);
        $quizDetails = array('quizID' => $quiz, 'quizTitle' => (TeacherQuiz::getQuizTitle($quiz))[0]->quizTitle);

        foreach($mQuestions as $mQuestion){

            $tmpArray = array($mQuestion->correctAns, $mQuestion->altAns1, $mQuestion->altAns2, $mQuestion->altAns3);
            shuffle($tmpArray);

            array_push($mQuestionsRet, array($mQuestion->McQuestion, $mQuestion->mcID, $tmpArray[0], $tmpArray[1], $tmpArray[2], $tmpArray[3]));
        }

        $results = QuizTimer::assertNotStarted(request()->input('quizID'), Auth::user()->id);

        If(!((int) $results[0]->started)) {

        $mytime = Carbon\Carbon::now();

        TeacherQuiz::setupTimer($quiz, $user, $mytime->toDateTimeString());

            }

        return view('studentTakeQuiz')->with('mQuestions',$mQuestionsRet)->with('iQuestions',$iQuestions)->with('jQuestions', $jQuestions)->with($quizDetails);

    }


    public function processAttempt(Request $request){


        // variable for keeping track of each question, the number of correct answers and number of answers

        //return Response()->json(['test'=>'hi']);
        $index = 0;
        $count = 0;
        $correct = 0;

        $resultsArray = array();

        $quizID = $request->input('quizID');
        $studentID = Auth::user()->id;

        // SECTION TO VERIFY QUIZ STARTED AND TIME LIMIT NOT REACHED USING ID AND QUIZID

        $existsAndTimely = QuizTimer::assertStartedAndTimely($quizID, $studentID);

        // APPLY SAME MIDDLEWARE TO ROUTE TO PREVENT USER PASTING HTML FOR COMPLETED QUIZ IN NEW ONE


        if($existsAndTimely[0]->valSubmission == 1) {

            // if the first question exists get the value and decode json string to object for use in question query
            if ($request->has($index)) {
                $currentValue = json_decode($request->input($index));
            }

            // loop while the value of the named field is an object denoting its status as an MCQuestion
            while (is_object($currentValue)) {

                // increment the correct answer by the value 0 or 1 in addition to assigning the value to the ResultsArray and index of question ID
                $correct += $resultsArray[$count] = (MCQuestion::compareAnswerMC($currentValue->mcID, $currentValue->text))[0]->correct;

                // increment index for finding next question
                $index++;
                $count++;
                // if question exists increment count and attempt to convert its value to object
                if ($request->has($index)) {


                    $currentValue = json_decode($request->input($index));
                } else{
                    break;
                }

            }

            // the object conversion will fail if the question type is now input ending the loop with the value null so update the currentValue
            //$currentValue = $request->input($index);

            //----------------------------------------------------------------------------------------------------------------------------------

            // SECTION TO IMPLEMENT JS INTERPRETER QUESTIONS

            //----------------------------------------------------------------------------------------------------------------------------------


            // loop while there are questions
            while ($request->has($index)) {



                // gets the id of input question from hidden field
                if ($request->has($index)) {
                    $currentValue1 = $request->input($index);
                }

                $index++;

                // gets the text answer of the user
                if ($request->has($index)) {
                    $currentValue = $request->input($index);
                }

                $index++;
                // increment the correct answer by the value 0 or 1 in addition to assigning the value to the ResultsArray and index of question ID
                $correct += $resultsArray[$count] = (InputQuestion::compareAnswerInput($currentValue1, $currentValue))[0]->correct;

                $count++;
            }

            // ALSO NEED TO VERIFY NUMBER OF QUESTIONS CORRECT ELSE STUDENT COULD REMOVE ALL BUT ONE AND GET 100%
            $questionCount = TeacherQuiz::confirmQuestionCount($quizID )[0]->qcount;

            if($questionCount == $count) {

                // SECTION TO CALCULATE AND STORE RESULT AND REDIRECT RETURN THE RESULT TO THE STUDENT PAGE

                $percentage = $correct / $count;
                $percent_final = ceil(number_format($percentage * 100, 2));

                // QUERY FOR ADDING RESULT + add middleware

                Result::storeGrade($quizID,$studentID, $percent_final);
                QuizTimer::removeTimerEntry($quizID,$studentID);

               $res['grade'] = $percent_final;
               $res['results'] = $resultsArray;

               return Response()->json($res);

                // add table and query for storing individual student quiz answers?

            } else {
                // redirect with alert question count mismatch
                return Response()->json(['alert'=>'This quiz has the wrong number of fields']);
            }

        } else {
            // invalid no time record or overun time limit redirect with alert
            QuizTimer::removeTimerEntry($quizID,$studentID);
            $res = (Result::quizTaken($quizID,$studentID)[0]->taken);
            if($res == 0){
                Result::storeGrade($quizID,$studentID, 0);
            }
            return Response()->json(['alert'=>'The time limit was overrun']);
        }




    }

}
