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
Route::get('', 'PegawaiController@getIndex');
//Route::get('dashboard', 'PegawaiController@index');
Route::controller('dashboard', 'PegawaiController', [
	'getData'  => 'dashboard.data',
	'getIndex' => 'dashboard',
	]);

Route::resource('absensi', 'AbsensiController');

Route::resource('cuti', 'CutiController', ['except' => ['index', 'show']]);
Route::controller('cuti', 'CutiController', ['getData'  => 'cuti.data','getIndex' => 'cuti']);
Route::get('cuti/{idcuti}/accept', 'CutiController@accept');
Route::get('cuti/{idcuti}/decline', 'CutiController@decline');

Route::resource('lembur', 'LemburController', ['except' => ['index', 'show']]);
Route::controller('lembur', 'LemburController', ['getData'  => 'lembur.data', 'getIndex' => 'lembur']);
Route::get('lembur/{idlembur}/accept', 'LemburController@accept');
Route::get('lembur/{idlembur}/decline', 'LemburController@decline');

Route::resource('training', 'TrainingController');

Route::get('penilaian/{idpegawai}/create', 'PenilaianController@create');
Route::resource('penilaian', 'PenilaianController', ['except' => ['create', 'edit']]);

Route::resource('pelanggaran', 'PelanggaranController');

Route::get('penggajian/{idpegawai}/create', 'PenggajianController@create');
Route::resource('penggajian', 'PenggajianController', ['except'=>['create', 'edit']]);

Route::resource('phk', 'PhkController');

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);