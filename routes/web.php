<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/studies', 'StudyController');

});

Route::prefix('teacher')->namespace('Teacher')->name('teacher.')->group(function() {
    Route::get('/name/quiz', 'QuizController@add')->name('quiz.add');
    Route::post('/name/quiz', 'QuizController@storeQuiz')->name('quiz.store');

    Route::get('/qa/quiz', 'QuizController@addQuestionAndAnswers')->name('quiz.addQA');
    Route::post('/qa/quiz', 'QuizController@storeQuestionAndAnswers')->name('quiz.storeQA');

    Route::resource('/subjects', 'SubjectController');
});

Route::prefix('student')->namespace('Student')->name('student.')->group(function() {

    Route::get('/subjects/select', 'SubjectController@select')->name('subjects.select');
    Route::get('/subjects/select/{id}/quiz', 'QuizController@show')->name('show');
    Route::post('/subjects/select/quiz/result', 'QuizController@storeResult')->name('quiz.store');

    Route::resource('/studies', 'StudyController');
    Route::resource('/subjects', 'SubjectController');


});