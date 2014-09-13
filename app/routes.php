<?php

/* ROUTES */

// Static pages
Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);

// Session-related
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::get('register', 'UserController@create');
Route::resource('sessions', 'SessionController');

// Users
Route::get('profile', ['before' => 'auth', 'uses' => 'UserController@profile']);
Route::resource('users', 'UserController');
Route::get('activate/{id}/{token}', 'UserController@activate');

// Businesses
Route::group(['before' => 'auth'], function() {
	Route::resource('businesses', 'BusinessController', ['only' => ['create', 'destroy', 'store', 'edit', 'update']]);
});
Route::resource('businesses', 'BusinessController', ['only' => ['index', 'show']]);


/* VIEW COMPOSERS */
View::composer('layouts.master', 'TradBiz\Composers\TitleComposer');





// My test route
Route::get('test', function() {
	Mail::send('emails.auth.activate', ['id' => '123', 'token' => '321'], function($message) {
		$message->to('flyingfisch@toppagedesign.com', 'Flying Fisch')->subject('Activate your TradBiz account');
	});
});
