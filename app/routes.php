<?php

// Routes
Route::get('/', 'PagesController@index');
Route::resource('users', 'UsersController');

// View composers
View::composer('layouts.master', 'TradConnect\Composers\TitleComposer');
