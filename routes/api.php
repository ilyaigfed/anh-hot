<?php

use Illuminate\Http\Request;

Route::post('/user/login', 'Admin\UserController@login');
Route::get('/user/refresh', 'Admin\UserController@refresh');

Route::group(['namespace' => 'Admin', 'middleware' => ['jwt.auth']], function() {
    Route::group(['prefix' => 'user'], function() {
        Route::delete('/logout', 'UserController@logout');
    });

    Route::group(['prefix' => 'room'], function() {
        Route::post('/', 'RoomController@create');
    });
});
