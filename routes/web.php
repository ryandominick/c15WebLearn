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


Route::resource('reg', 'RegController');

Route::get('/filter', function(){
    return view('myResults');
});

//Route::get('student/login', 'Auth\StudentLoginController@showLoginForm');


//Route::prefix('/student')->group(function(){
    // ->name() allows for route alias
   Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('student.showLogin');
   Route::post('/student/login', 'Auth\StudentLoginController@studentLogin')->name('student.login');
   Route::get('/student/logout', 'Auth\StudentLoginController@studentLogout')->name('student.logout');
    Route::get('/student/home', 'Auth\StudentController@index')->name('student.home');
//});

//Route::prefix('/teacher')->group(function(){
    Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm')->name('teacher.showLogin');
    Route::post('/teacher/login', 'Auth\TeacherLoginController@teacherLogin')->name('teacher.login');
    Route::get('/teacher/logout', 'Auth\TeacherLoginController@teacherLogout')->name('teacher.logout');
    Route::get('/teacher/home', 'Auth\TeacherController@index')->name('teacher.home');
//});

//Route::get('/', ['as' => 'teacher/home', 'uses' => 'Auth\TeacherController@index']);

