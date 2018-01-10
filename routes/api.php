<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>['jwt.refresh','jwt.auth']],function(){
    Route::group(['prefix'=>'auth',['middleware'=>'ability:admin']],function(){
        /*
        *   Create roles and permission
        */
        Route::post('role','Auth\AccessController@createRole');
        Route::post('permission','Auth\AccessController@createPermission');

        /*
        *   Assign roles and permission
        */
        Route::post('assign-role','Auth\AccessController@assignRole');
        Route::post('assign-permission','Auth\AccessController@attachPermission');
    });
    
    Route::group(['prefix'=>'department'],function(){
        Route::get('/{id}','DepartmentController@getById');
        Route::get('/{id}/subjects','DepartmentController@getSubjects');
        Route::get('/{id}/subjects/sem/{sem}','DepartmentController@getSubjects');
        Route::get('','DepartmentController@getAll');
        Route::get('/{id}/classroom','DepartmentController@getClass');
        Route::post('','DepartmentController@post');
        Route::delete('/{id}','DepartmentController@delete');
        Route::patch('','DepartmentController@patch');
    });

    Route::group(['prefix'=>'classroom'],function(){
        Route::get('/{id}','ClassRoomController@getById');
        Route::get('/{id}/students','ClassRoomController@getStudents');
        Route::get('','ClassRoomController@getAll');
        Route::post('','ClassRoomController@post');
        Route::delete('/{id}','ClassRoomController@delete');
        Route::patch('','ClassRoomController@patch');
    });

    Route::group(['prefix'=>'student'],function(){
        Route::get('/{id}','StudentController@getById');
        Route::get('','StudentController@getAll');
        Route::post('','StudentController@postMultiple');
        Route::post('/single','StudentController@postSingle');
        Route::delete('/{id}','StudentController@delete');
        Route::patch('','StudentController@patch');
    });

    Route::group(['prefix'=>'subject'],function(){
        Route::get('/{id}/exams','SubjectController@getExams');
    });


    Route::group(['prefix'=>'user'],function(){

        Route::get('user', function (Request $request) {
            return $request->user();
        });
    
        Route::get('users', 'UserController@getUsers');
    });

});
