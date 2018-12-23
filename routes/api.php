<?php

use Illuminate\Http\Request;


Route::group(['prefix'=> 'auth'], function(){

	Route::post('login','Api\AuthController@login');
	
});

Route::resource('books', 'Api\BookController');
