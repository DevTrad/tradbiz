<?php

// Routes
Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::get('register', 'UserController@create');
Route::get('profile', ['before' => 'auth', 'uses' => 'UserController@profile']);
Route::get('activate/{id}/{token}', 'UserController@activate');

Route::resource('users', 'UserController');
Route::resource('businesses', 'BusinessController');
Route::resource('sessions', 'SessionController');

Route::get('test', function() {
	Mail::send('emails.auth.activate', ['id' => '123', 'token' => '321'], function($message) {
		$message->from('noreply@TradConnect.org', 'TradConnect');
		$message->to('flyingfisch@toppagedesign.com', 'Flying Fisch')->subject('Activate your TradConnect account');
	});
});

// View composers
View::composer('layouts.master', 'TradConnect\Composers\TitleComposer');
