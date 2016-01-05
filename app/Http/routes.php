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
Route::get('', 'DashboardController@index');

Route::get('pegawai/{idpegawai}/show', 'PegawaiController@show');
Route::get('pegawai/{idpegawai}/delete', 'PegawaiController@delete');
Route::resource('pegawai', 'PegawaiController', ['except' => ['index', 'show']]);
Route::controller('pegawai', 'PegawaiController', [
	'getData'  => 'pegawai.data',
	'getIndex' => 'pegawai',
	]);

Route::get('dashboard/upload', 'DashboardController@upload');
Route::get('dashboard/detailprofil', 'DashboardController@detail');
Route::resource('dashboard', 'DashboardController', ['only' => ['index']]);

Route::get('absensi/masuk', 'AbsensiController@masuk');
Route::get('absensi/pulang', 'AbsensiController@pulang');
Route::get('absensi/{idabsensi}/show', 'AbsensiController@show');
Route::get('absensi/{idabsensi}/delete', 'AbsensiController@delete');
Route::resource('absensi', 'AbsensiController', ['except' => ['index', 'show']]);
Route::controller('absensi', 'AbsensiController', ['getData'  => 'absensi.data', 'getIndex' => 'absensi']);

Route::get('cuti/{idcuti}/accept', 'CutiController@accept');
Route::get('cuti/{idcuti}/decline', 'CutiController@decline');
Route::get('cuti/{idcuti}/show', 'CutiController@show');
Route::get('cuti/{idcuti}/delete', 'CutiController@delete');
Route::resource('cuti', 'CutiController', ['except' => ['index', 'show']]);
Route::controller('cuti', 'CutiController', ['getData'  => 'cuti.data', 'getIndex' => 'cuti']);

Route::get('lembur/{idlembur}/accept', 'LemburController@accept');
Route::get('lembur/{idlembur}/decline', 'LemburController@decline');
Route::get('lembur/{idlembur}/show', 'LemburController@show');
Route::get('lembur/{idlembur}/delete', 'LemburController@delete');
Route::resource('lembur', 'LemburController', ['except' => ['index', 'show']]);
Route::controller('lembur', 'LemburController', ['getData'  => 'lembur.data', 'getIndex' => 'lembur']);

Route::get('training/{idtraining}/show', 'TrainingController@show');
Route::get('training/{idtraining}/delete', 'TrainingController@delete');
Route::resource('training', 'TrainingController', ['except' => ['index', 'show']]);
Route::controller('training', 'TrainingController', ['getData'  => 'training.data', 'getIndex' => 'training']);

Route::get('penilaian/{idpenilaian}/show', 'PenilaianController@show');
Route::get('penilaian/{idpenilaian}/delete', 'PenilaianController@delete');
Route::resource('penilaian', 'PenilaianController', ['except' => ['index', 'show']]);
Route::controller('penilaian', 'PenilaianController', ['getData'  => 'penilaian.data', 'getIndex' => 'penilaian']);

Route::get('pelanggaran/{idpelanggaran}/show', 'PelanggaranController@show');
Route::get('pelanggaran/{idpelanggaran}/delete', 'PelanggaranController@delete');
Route::resource('pelanggaran', 'PelanggaranController', ['except' => ['index', 'show']]);
Route::controller('pelanggaran', 'PelanggaranController', ['getData'  => 'pelanggaran.data', 'getIndex' => 'pelanggaran']);

Route::get('penggajian/{idpenggajian}/show', 'PenggajianController@show');
Route::get('penggajian/{idpenggajian}/delete', 'PenggajianController@delete');
Route::resource('penggajian', 'PenggajianController', ['except'=>['index', 'show']]);
Route::controller('penggajian', 'PenggajianController', ['getData'  => 'penggajian.data', 'getIndex' => 'penggajian']);

Route::get('phk/{idphk}/show', 'PhkController@show');
Route::get('phk/{idphk}/delete', 'PhkController@delete');
Route::resource('phk', 'PhkController', ['except' => ['index', 'show']]);
Route::controller('phk', 'PhkController', ['getData'  => 'phk.data', 'getIndex' => 'phk']);

Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);