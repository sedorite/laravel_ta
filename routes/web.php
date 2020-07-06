<?php

use Illuminate\Support\Facades\Route;

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
    return view('board/board');
});
Route::get('/addkaryawan','karyawanController@add');
Route::get('/datakaryawan','karyawanController@index');
Route::get('/karyawan/delete/{id}','karyawanController@delete');
Route::get('/karyawan/edit/{id}','karyawanController@add');
Route::post('/karyawan/save','karyawanController@save');
Route::post('/karyawan/save/{id}','karyawanController@save');

Route::get('/absensilog','logabsensiController@index');

Route::get('/qrcodelog','qrcodeController@index');
Route::get('/qrcode/cek','qrcodeController@ceksttqr');
Route::post('/qrcode/update','qrcodeController@updatesttqr');
Route::post('/qrcodelog','qrcodeController@index');