<?php

// Routes
Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');

Route::resource('users', 'UserController');
Route::resource('businesses', 'BusinessController');
Route::resource('sessions', 'SessionController');

Route::get('test', function() {
	return Redirect::route('home');
});

// View composers
View::composer('layouts.master', 'TradConnect\Composers\TitleComposer');
