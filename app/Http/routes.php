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

Route::get('cuti/{idcuti}/accept', 'CutiController@accept');
Route::get('cuti/{idcuti}/decline', 'CutiController@decline');
Route::resource('cuti', 'CutiController', ['except' => ['index', 'show']]);
Route::controller('cuti', 'CutiController', ['getData'  => 'cuti.data','getIndex' => 'cuti']);

Route::get('lembur/{idlembur}/accept', 'LemburController@accept');
Route::get('lembur/{idlembur}/decline', 'LemburController@decline');
Route::resource('lembur', 'LemburController', ['except' => ['index', 'show']]);
Route::controller('lembur', 'LemburController', ['getData'  => 'lembur.data', 'getIndex' => 'lembur']);

Route::get('training/{idtraining}/show', 'TrainingController@show');
Route::resource('training', 'TrainingController', ['except' => ['index', 'show']]);
Route::controller('training', 'TrainingController', ['getData'  => 'training.data','getIndex' => 'training']);

Route::get('penilaian/{idpegawai}/create', 'PenilaianController@create');
Route::resource('penilaian', 'PenilaianController', ['except' => ['create', 'edit', 'index', 'show']]);
Route::controller('penilaian', 'PenilaianController', ['getData'  => 'penilaian.data','getIndex' => 'penilaian']);

Route::resource('pelanggaran', 'PelanggaranController', ['except' => ['index', 'show']]);
Route::controller('pelanggaran', 'PelanggaranController', ['getData'  => 'pelanggaran.data','getIndex' => 'pelanggaran']);

Route::get('penggajian/{idpegawai}/create', 'PenggajianController@create');
Route::resource('penggajian', 'PenggajianController', ['except'=>['create', 'edit']]);

Route::resource('phk', 'PhkController', ['except' => ['index', 'show']]);
Route::controller('phk', 'PhkController', ['getData'  => 'phk.data','getIndex' => 'phk']);

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);