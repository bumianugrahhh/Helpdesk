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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//Route Pengguna
Route::get('/data-pengguna', 'InstansiController@index')->name('instansi.index');
Route::get('/data-pengguna-create', 'InstansiController@create')->name('instansi.create');
Route::post('/data-pengguna-create', 'InstansiController@store')->name('instansi.store');
Route::get('/data-pengguna-edit', 'InstansiController@edit')->name('instansi.edit');
Route::post('/data-pengguna-edit', 'InstansiController@update')->name('instansi.update');
Route::post('/data-pengguna-delete', 'InstansiController@destroy')->name('instansi.delete');

//Route Teknisi
Route::get('/data-teknisi', 'TeknisiController@index')->name('teknisi.index');
Route::get('/data-teknisi-create', 'TeknisiController@create')->name('teknisi.create');
Route::post('/data-teknisi-create', 'TeknisiController@store')->name('teknisi.store');
Route::get('/data-teknisi-edit', 'TeknisiController@edit')->name('teknisi.edit');
Route::post('/data-teknisi-edit', 'TeknisiController@update')->name('teknisi.update');
Route::post('/data-teknisi-delete', 'TeknisiController@destroy')->name('teknisi.delete');

Route::get('/teknisi-getdata', 'TeknisiController@getTeknisi')->name('teknisi.getdata');

//Route Ubah Passwrod
Route::get('/ubah-password', 'UbahPasswordController@index')->name('ubah-password.index');
Route::post('/ubah-password-update', 'UbahPasswordController@update')->name('ubah-password.update');

//Route Pengaduan
Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan.index');
Route::get('/pengaduan-create', 'PengaduanController@create')->name('pengaduan.create');
Route::post('/pengaduan-create', 'PengaduanController@store')->name('pengaduan.store');
Route::get('/pengaduan-edit/{id}', 'PengaduanController@edit')->name('pengaduan.edit');
Route::post('/pengaduan-edit', 'PengaduanController@update')->name('pengaduan.update');
Route::post('/pengaduan-delete', 'PengaduanController@destroy')->name('pengaduan.delete');
Route::get('/pengaduan/get/{id}', 'PengaduanController@getdata')->name('pengaduan.getdata');
Route::get('/pengaduan/get1/{id}', 'PengaduanController@getdata1')->name('pengaduan.getdata1');
Route::post('/pengaduan-edit-user', 'PengaduanController@update1')->name('pengaduan.update1');

//Route Laporan
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::post('/laporan', 'LaporanController@cetak')->name('laporan.cetak');
