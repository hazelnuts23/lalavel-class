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

//Route to resources of this url, to see run command php artisan route:list
Route::resource('/education/courses', 'Education\CoursesController', ['except' => ['show']]);

//Route get to this url, mapping to controller and then call index() function
//Route::get('/education/courses/{courseId}', 'Education\CoursesController@index')->name('education.courses.index');
//Route::post('/education/courses/{courseId}/add', 'Education\CoursesController@store')->name('education.courses.store');