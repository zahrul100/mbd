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


//route CRUD
Route::get('/pelanggan','PelangganController@index'); //menampilkan pelanggan
Route::get('/pelanggan/tambah','PelangganController@tambah'); //menambah pelanggan 
Route::post('/pelanggan/store','PelangganController@store'); //store data pelanggan

Route::get('/pelanggan/cek','PelangganController@pesan'); //untuk pesan hotel

Route::post('/pelanggan/lihat','PelangganController@lihat'); //untuk pesan hotel