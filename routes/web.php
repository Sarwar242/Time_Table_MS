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
Route::post('/teacherlogin', 'TeacherController@login')->name('teacher.login');
Route::post('/teacherlogout', 'TeacherController@logout')->name('teacher.logout');






Route::get('/test', 'ProjectController@pass')->name('pass');
Route::post('/test', 'ProjectController@test')->name('test');

//Admin Routes

Route::group(['prefix' => '/admin','middleware'=> 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::post('/addTeacher', 'TeacherController@store')->name('admin.addTeacher');
    Route::get('/deleteTeacher/{id}', 'TeacherController@destroy')->name('admin.deleteTeacher');
    Route::get('/Subjects', 'SubjectController@index')->name('admin.subjects');
    Route::post('/addSubject', 'SubjectController@store')->name('admin.addSubject');
    Route::get('/deleteSubject/{id}', 'SubjectController@destroy')->name('admin.deleteSubject');


    //classroom
    Route::get('/classrooms', 'ClassroomController@index')->name('admin.classrooms');
    Route::post('/addClassroom', 'ClassroomController@store')->name('admin.addClassroom');
    Route::get('/deleteClassroom/{id}', 'ClassroomController@destroy')->name('admin.deleteClassroom');

    //Allotment Theory
    Route::get('/subject_allotment_theory', 'AllotmentController@subject_allotment_theory')->name('admin.subject_allotment_theory');
    Route::post('/subject_allotment_theory', 'AllotmentController@allotTry')->name('admin.allotTry.store');
    Route::get('/delete_allotment_theory/{id}', 'AllotmentController@delete_allotment_theory')->name('admin.delete_allotment_theory');


    //Allotment Lab
    Route::get('/subject_allotment_lab', 'AllotmentController@subject_allotment_lab')->name('admin.subject_allotment_lab');
    Route::post('/subject_allotment_lab', 'AllotmentController@allotLab')->name('admin.allotLab.store');
    Route::get('/delete_allotment_lab/{id}', 'AllotmentController@delete_allotment_lab')->name('admin.delete_allotment_lab');

    //Allotment Classroom
    Route::get('/classroom_allotment', 'AllotmentController@classroom_allotment')->name('admin.classroom_allotment');
    Route::post('/classroom_allotment', 'AllotmentController@allotClassroom')->name('admin.allotClassroom.store');
    Route::get('/delete_classroom_allotment/{id}', 'AllotmentController@delete_classroom_allotment')->name('admin.delete_classroom_allotment');


    //Routine Routes
    
    Route::get('/routine_semester/{id}', 'RoutineController@index')->name('admin.semester.routine');

    Route::get('/get-teachers/{id}', function ($id) {
        $subject= App\Models\Subject::find($id);
        
        return json_encode($subject->teachers);
    });

    Route::post('/routine_semester', 'RoutineController@store')->name('admin.semester.routine.store');
    //Route::get('/delete_classroom_allotment/{id}', 'RoutineController@delete_classroom_allotment')->name('admin.delete_classroom_allotment');
});


//Teacher Routes

Route::group(['prefix' => '/teacher'], function () {
    Route::get('/', 'TeacherController@index')->name('teacher'); 
});