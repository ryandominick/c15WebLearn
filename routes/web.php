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
//Route::any('/', ["as" => "user/login", "uses" => "TeacherLoginController@login"]);

//Route::post('/authenticate', 'TeacherLoginController@store')->middleware('loginAuth');

//Route::any('/', ["as" => "/student/login", "uses" => "Auth\StudentLoginController@login"]);
//
//Route::get('/login', function(){
//    return view('login');
//});

Route::post('reg/check', 'RegController@check');
Route::resource('reg', 'RegController');

Route::get('/student/search', 'StudentSearchController@index');
Route::post('/student/search/query', 'StudentSearchController@query');

Route::get('/student/quiz', 'StudentTakeQuizController@index');


Route::get('/teacher/search', 'TeacherSearchController@index');
Route::post('/teacher/search/query', 'TeacherSearchController@query');
Route::post('/teacher/search/expand', 'TeacherSearchController@expand');

//Route::resource('myResults', 'ResultsController');

Route::resource('/createquiz', 'CreateQuizController');

//Display the results view whilst using the StudentController
Route::get('/student/results', 'Auth\StudentController@results');

//Display contact us page for student
Route::get('/contact', 'Auth\StudentController@contactUs');

//display manage student page
Route::get('/teacher/manageStudents', 'Auth\TeacherController@manage');

//Display createquiz page
Route::get('/teacher/createquiz', 'Auth\TeacherController@create');


//View the manage

//Route::get('student/login', 'Auth\StudentLoginController@showLoginForm');


//Route::prefix('/student')->group(function(){
// ->name() allows for route alias

// Authentication Routes

Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->middleware('guest:teacher', 'guest:student');

//Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('student.showLogin');
Route::post('/student/login', 'Auth\StudentLoginController@studentLogin')->name('student.login');
Route::get('/student/logout', 'Auth\StudentLoginController@studentLogout')->name('student.logout');
Route::get('/student/home', 'Auth\StudentController@index')->name('student.home');
//});

//Route::prefix('/teacher')->group(function(){
//Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.showLogin');
Route::post('/teacher/login', 'Auth\TeacherLoginController@teacherLogin')->name('teacher.login');
Route::get('/teacher/logout', 'Auth\TeacherLoginController@teacherLogout')->name('teacher.logout');
Route::get('/teacher/home', 'Auth\TeacherController@index')->name('teacher.home');
//});

Route::any('/', ["as" => "/student/home", "uses" => "Auth\StudentController@index"]);

//Route::get('/', ['as' => 'teacher/home', 'uses' => 'Auth\TeacherController@index']);

