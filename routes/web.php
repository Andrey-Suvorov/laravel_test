<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('', [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('students', [ 'uses' => 'ExportController@viewStudents', 'as' => 'students'] );
Route::get('courses', [ 'uses' => 'ExportController@viewCourses', 'as' => 'courses'] );
Route::post('/export', [ 'uses' => 'ExportController@exportStudents', 'as' => 'export'] );
Route::post('/export_courses', [ 'uses' => 'ExportController@exportCourseAttendence', 'as' => 'export_courses'] );