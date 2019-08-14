<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','AuthController@login');
Route::post('getMapelUjian','AuthController@getMapelUjian');
Route::post('ujianInfo','AuthController@ujianInfo');
Route::post('getSoal','AuthController@getSoal');
Route::post('getRiwayat','AuthController@getRiwayat');
Route::post('getNilai','AuthController@getNilai');
Route::post('resetPassword','AuthController@resetPassword');
Route::post('getLogouts', 'AuthController@getLogouts');
