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
Route::get('/', function () {
    return view('login');
});
Route::post('/authenticate', 'LoginController@store')->middleware('loginAuth');


Route::get('/studentHome', function(){
    return view('studentHomepage');

});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
});


Route::get('/logout', 'LoginController@logout');

Route::resource('reg', 'RegController');

Route::resource('createquiz', 'CreateQuizController');

Route::get('/takequiz', function() {
   return view ('takeQuiz');
});

