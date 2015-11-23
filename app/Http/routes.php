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

Route::get('/', function () {
    return view('/pages/dashboard');
});

Route::get('/login', function () {
    return view('/auth/login');
});

Route::get('/register', function () {
    return view('/auth/register');
});

Route::get('/absensi', function () {
    return view('/pages/absensi');
});

Route::get('/cuti', function () {
    return view('/pages/cuti');
});
