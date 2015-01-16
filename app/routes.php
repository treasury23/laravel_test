<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::any('signup', 'RegisterController@showFormRegister');

Route::group(array('before' => 'auth'), function () {

    Route::get('profile', 'RegisterController@profile');
    Route::any('add', 'PublicationController@addPublication');

});

Route::any('login', 'RegisterController@showFormLogin');

Route::get('logout', 'RegisterController@logout');

Route::get('getCities/{id}', 'PublicationController@getCities')->where('id', '[0-9]+');


