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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('Jabatan','JabatanController');
Route::resource('Golongan','GolonganController');
Route::resource('Kategori','KategoriController');
Route::resource('Pegawai','PegawaiController');
Route::resource('Lembur','LemburController');
Route::resource('Tunjangan','TunjanganController');
Route::resource('TunjanganP','TunjanganPController');

Route::resource('Penggajians','PenggajianController');
Route::resource('Penggajian2','penggajian2');//view pegawai

Route::resource('User','UserController');

//edit2
Route::resource('Pegawai2','Pegawai2');
Route::resource('Golongan2','golongan2');
Route::resource('Jabatan2','jabatan2');
Route::resource('Kategori2','kategori2');
Route::resource('Tunjangan2','tunjangans2');
