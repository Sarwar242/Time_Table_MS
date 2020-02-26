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

Route::get('/', 'ProjectController@index')->name('index');


Route::get('/home', 'HomeController@index')->name('home');


//Admin Auth
Route::post('/login', 'AdminController@login')->name('login');
Route::post('/logout', 'AdminController@logout')->name('logout');


//Teacher Auth
Route::post('/login', 'TeacherController@login')->name('teacher.login');
Route::post('/logout', 'TeacherController@logout')->name('teacher.logout');






Route::post('/test', 'ProjectController@test')->name('test');



Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/addTeacher', 'TeacherController@store')->name('admin.addTeacher');
    Route::get('/deleteTeacher/{id}', 'TeacherController@destroy')->name('admin.deleteTeacher');
    Route::get('/Subjects', 'SubjectController@index')->name('admin.subjects');
    Route::post('/addSubject', 'SubjectController@store')->name('admin.addSubject');


    //classroom
    Route::get('/classrooms', 'ClassroomController@index')->name('admin.classrooms');
    Route::post('/addClassroom', 'ClassroomController@store')->name('admin.addClassroom');
    Route::get('/deleteClassroom/{id}', 'ClassroomController@destroy')->name('admin.deleteClassroom');
});


//Teacher Routes
