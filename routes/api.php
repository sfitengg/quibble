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
    Route::group(['prefix'=>'auth',['middleware'=>'ability:admin,give-access-rights']],function(){
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
    
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('users', 'UserController@getUsers');
});
