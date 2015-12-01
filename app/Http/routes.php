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

Route::resource('absensi', 'AbsensiController');

Route::resource('cuti', 'CutiController');
Route::get('cuti/{idcuti}/accept', 'CutiController@accept');

Route::resource('lembur', 'LemburController');
Route::get('lembur/{idlembur}/accept', 'LemburController@accept');

Route::resource('training', 'TrainingController');

Route::resource('penilaian', 'PenilaianController');

Route::resource('pelanggaran', 'PelanggaranController');

Route::resource('penggajian', 'PenggajianController');

Route::resource('phk', 'PhkController');

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);