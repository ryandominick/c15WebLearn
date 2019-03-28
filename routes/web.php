<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('reg/check', 'RegController@check');
Route::resource('reg', 'RegController');

Route::get('/student/search', 'StudentSearchController@index')->name('student.search');
Route::post('/student/search/query', 'StudentSearchController@query');

Route::get('/student/messages/status', 'StudentMessageController@getChatStatus');
Route::get('/student/messages/init', 'StudentMessageController@getTeachers');
Route::get('/student/messages', 'StudentMessageController@index');

Route::get('/student/quiz', 'StudentTakeQuizController@index')->middleware('assertQuizNotTaken','assertQuizExists');
Route::post('/student/quiz/submit', 'StudentTakeQuizController@processAttempt')->middleware('assertQuizNotTaken','assertQuizExists');
Route::post('/student/quiz/getparam','StudentTakeQuizController@getParameters');

Route::get('/teacher/search', 'TeacherSearchController@index');
Route::post('/teacher/search/query', 'TeacherSearchController@query');
Route::post('/teacher/search/expand', 'TeacherSearchController@expand');

//Route::resource('myResults', 'ResultsController');

Route::resource('/jsquiz', 'JSQuizController');

Route::resource('/createquiz', 'CreateQuizController');

//Display the results view whilst using the StudentController
Route::get('/student/results', 'Auth\StudentController@results');


Route::get('/student/profile', 'Auth\StudentController@profile');

//Display contact us page for student
Route::get('/contact', 'Auth\StudentController@contactUs');

//display manage student page
Route::get('/teacher/manageStudents', 'Auth\TeacherController@manage');

//display manage student page
Route::get('/teacher/profile', 'Auth\TeacherController@profile');

//Display createquiz page
Route::get('/teacher/createquiz', 'Auth\TeacherController@create');




Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->middleware('guest:teacher', 'guest:student');


Route::post('/student/login', 'Auth\StudentLoginController@studentLogin')->name('student.login');
Route::get('/student/logout', 'Auth\StudentLoginController@studentLogout')->name('student.logout');
Route::get('/student/home', 'Auth\StudentController@index')->name('student.home');
//});


Route::post('/teacher/login', 'Auth\TeacherLoginController@teacherLogin')->name('teacher.login');
Route::get('/teacher/logout', 'Auth\TeacherLoginController@teacherLogout')->name('teacher.logout');
Route::get('/teacher/home', 'Auth\TeacherController@index')->name('teacher.home');
//});

Route::any('/', ["as" => "/student/home", "uses" => "Auth\StudentController@index"]);



