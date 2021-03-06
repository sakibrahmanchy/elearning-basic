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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('results', 'ResultsController');
Route::resource('adminpanel', 'AdminPanelController');
Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
Route::resource('lessons', 'LessonController');
Route::post('lessons/{lesson_id}/questions', 'LessonController@addQuestions');
