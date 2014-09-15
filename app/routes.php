<?php
/* Routes file
 *
 * Declare Route::get's before Route::resource and the like.
 */

/* ROUTES */

// Static pages
Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);
Route::get('proof', 'PageController@proof');

// Session-related
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::get('register', 'UserController@create');
Route::resource('sessions', 'SessionController');

// Users
Route::get('activate/{id}/{token}', 'UserController@activate');
Route::get('profile', ['before' => 'auth', 'uses' => 'UserController@profile']);
Route::resource('users', 'UserController');

// Businesses (rudimentary authentication here, more in controller)
//Route::group(['before' => 'auth'], function() {
	Route::resource('businesses', 'BusinessController', ['only' => ['create', 'destroy', 'store', 'edit', 'update']]);
//});
Route::resource('businesses', 'BusinessController', ['only' => ['index', 'show']]);


/* VIEW COMPOSERS */
View::composer('layouts.master', 'TradBiz\Composers\TitleComposer');





// My test route
Route::get('test', function() {
	return View::make('businesses.create');
});
