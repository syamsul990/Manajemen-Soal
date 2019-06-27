<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admins','SiswaController@index');

Route::get('/admins/siswa','SiswaController@index');
Route::get('/admins/siswa/Multimedia','SiswaController@multimedia');
Route::get('/admins/siswa/Pemasaran','SiswaController@pemasaran');
Route::get('/admins/siswa/Akuntansi','SiswaController@akuntansi');

Route::post('/admins/siswa/create','SiswaController@create');
Route::get('/admins/siswa/{id}/edit','SiswaController@edit');
Route::post('/admins/siswa/{id}/update','SiswaController@update');
route::get('/admins/siswa/{id}/delete','SiswaController@delete');

Route::get('/admins/pengajar','PengajarController@index');
Route::post('/admins/pengajar/create','PengajarController@create');
Route::get('/admins/pengajar/{id}/edit','PengajarController@edit');
Route::post('/admins/pengajar/{id}/update','PengajarController@update');
route::get('/admins/pengajar/{id}/delete','PengajarController@delete');

Route::get('/guru','GuruController@index');
Route::get('/guru/soal','GuruController@soal');
Route::get('/guru/soal/input','GuruController@inputSoal');