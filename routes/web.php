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
<<<<<<< HEAD
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
=======
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
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
