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

Route::get('', 'PegawaiController@index');

Route::get('login', function () {
    return view('auth/login');
});

Route::get('register', function () {
    return view('auth/register');
});

Route::get('absensi', function () {
    return view('pages/absensi');
});

Route::get('cuti', function () {
    return view('pages/cuti');
});

// Route::get('/training/create', function () {
//     return view('/pages/training/create');
// });

Route::get('training', 'TrainingController@index');
Route::get('training/create', 'TrainingController@create');