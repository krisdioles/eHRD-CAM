<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// if(Auth::guest())
// {
// 	Route::get('', function () {
//     	return view('auth/login');
// 	});
// }

Route::get('', 'PegawaiController@index');
Route::get('dashboard', 'PegawaiController@index');

// Route::get('login', function () {
//     return view('auth/login');
// });

// Route::get('register', function () {
//     return view('auth/register');
// });

Route::get('absensi', function () {
    return view('pages/absensi');
});

Route::resource('cuti', 'CutiController');

Route::resource('training', 'TrainingController');

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);