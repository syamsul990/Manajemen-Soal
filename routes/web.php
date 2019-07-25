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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
    Route::get('/layouts/profile',);
    //create data siswa
    Route::get('/admin/siswa','SiswaController@index');
    Route::get('/admin/siswa/Multimedia','SiswaController@multimedia');
    Route::get('/admin/siswa/Pemasaran','SiswaController@pemasaran');
    Route::get('/admin/siswa/Akuntansi','SiswaController@akuntansi');

    Route::post('/admin/siswa/create','SiswaController@create');
    Route::get('/admin/siswa/{id}/edit','SiswaController@edit');
    Route::post('/admin/siswa/{id}/update','SiswaController@update');
    route::get('/admin/siswa/{id}/delete','SiswaController@delete');

    //cretae data guru
    Route::get('/admin/guru','GuruController@index');
    Route::post('/admin/guru/create','GuruController@create');
    Route::get('/admin/guru/{id}/edit','GuruController@edit');
    Route::post('/admin/guru/{id}/update','GuruController@update');
    route::get('/admin/guru/{id}/delete','GuruController@delete');

    //Matapelajaran
    Route::get('/admin/mapel','MapelController@index');
    Route::post('/admin/mapel/create','MapelController@create');
    Route::get('/admin/mapel/{id}/edit','MapelController@edit');
    Route::post('/admin/mapel/{id}/update','MapelController@update');
    route::get('/admin/mapel/{id}/delete','MapelController@delete');

    //SOAL
    Route::get('/guru','GuruController@index');
    Route::get('/guru/tambah_soal','GuruController@soal');
    Route::get('/guru/input_soal','GuruController@inputSoal');
});
