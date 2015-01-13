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

//Route::get('users', function () {
//    return View::make('users');
//});

Route::get('users', function () {
    $users = User::all();

    return View::make('users')->with('users', $users);
});

Route::get('users1', 'HomeController@showWelcome');



Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::any('signup', 'RegisterController@showFormRegister');

Route::group(array('before' => 'auth'), function () {

    Route::get('profile', function () {
        return 'profile here';
    });
});