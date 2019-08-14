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
Auth::routes(['register' => false, 'password.request' => false, 'reset' => false]);
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
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
    Route::get('/admin/guru/Multimedia','GuruController@multimedia');
    Route::get('/admin/guru/Pemasaran','GuruController@pemasaran');
    Route::get('/admin/guru/Akuntansi','GuruController@akuntansi');

    Route::post('/admin/guru/create','GuruController@create');
    Route::get('/admin/guru/{id}/edit','GuruController@edit');
    Route::post('/admin/guru/{id}/update','GuruController@update');
    route::get('/admin/guru/{id}/delete','GuruController@delete');

    //Nilai
    Route::get('/admin/nilai/cetak_pdf', 'NilaiController@cetak_pdf');
    Route::get('/admin/nilai/Multimedia/kelas1', 'NilaiController@multimedia1');
    Route::get('/admin/nilai/Multimedia/kelas2', 'NilaiController@multimedia2');
    Route::get('/admin/nilai/Multimedia/kelas3', 'NilaiController@multimedia3');

    Route::get('/admin/nilai/Pemasaran/kelas1', 'NilaiController@pemasaran1');
    Route::get('/admin/nilai/Pemasaran/kelas2', 'NilaiController@pemasaran2');
    Route::get('/admin/nilai/Pemasaran/kelas3', 'NilaiController@pemasaran3');

    Route::get('/admin/nilai/Akuntansi/kelas1', 'NilaiController@akuntansi1');
    Route::get('/admin/nilai/Akuntansi/kelas2', 'NilaiController@akuntansi2');
    Route::get('/admin/nilai/Akuntansi/kelas3', 'NilaiController@akuntansi3');

    //Matapelajaran
    Route::get('/admin/mapel','MapelController@index');
    Route::get('/admin/mapel/kejuruan','MapelController@kejuruan');
    Route::post('/admin/mapel/create','MapelController@create');
    Route::get('/admin/mapel/{id}/edit','MapelController@edit');
    Route::post('/admin/mapel/{id}/update','MapelController@update');
    route::get('/admin/mapel/{id}/delete','MapelController@delete');

    //SOAL
    Route::get('/guru','GuruController@index');
    Route::get('/guru/tambah_soal','GuruController@soal');
    Route::post('/guru/input_soal','GuruController@inputSoal');

    //Profile
    Route::get('/layouts/{id}/profile', 'HomeController@profile');
    Route::get('/layouts/{id}/ubah_password', 'GuruController@ubah_password');
    Route::post('/layouts/{id}/resetPassword', 'GuruController@resetPassword');
});
