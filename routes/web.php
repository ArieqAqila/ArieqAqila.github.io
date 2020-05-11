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


//LOGIN & REGISTER
Route::get('/login', function () {
    return view('Front/Login');
});

Route::post('/login/auth', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/register', function () {
    return view('Front/Register');
});

Route::post('/register/auth', 'LoginController@register');



//FRONTEND
Route::get('/', function () {
    return view('index');
});
Route::get('/home', 'PengaduanController@index');

//PENGADUAN FRONTEND
Route::post('/home/store', 'PengaduanController@store');
Route::get('/catch/{id}', 'PengaduanController@catch');
Route::post('/home/update', 'PengaduanController@update');
Route::get('/home/delete/{id}', 'PengaduanController@delete');







//BACKEND
Route::get('/admin', 'LoginController@index');
//BACKEND LOGIN
Route::get('/login/admin', function () {
    return view('Back/Login');
});
Route::post('/login/admin/auth', 'LoginController@loginAdmin');
Route::get('/logout/admin', 'LoginController@logoutAdmin');

//URL PETUGAS
Route::get('admin/viewPetugas', 'PetugasController@view');
Route::post('admin/viewPetugas/store', 'PetugasController@store');
Route::get('admin/viewPetugas/json/{id}', 'PetugasController@json');
Route::post('admin/viewPetugas/update', 'PetugasController@update');
Route::get('admin/viewPetugas/delete/{id}', 'PetugasController@delete');

//URL MASYARAKAT
Route::get('admin/viewMasyarakat', 'MasyarakatController@view');
Route::post('admin/viewMasyarakat/store', 'MasyarakatController@store');
Route::get('admin/viewMasyarakat/json/{id}', 'MasyarakatController@json');
Route::post('admin/viewMasyarakat/update', 'MasyarakatController@update');
Route::get('admin/viewMasyarakat/delete/{id}', 'MasyarakatController@delete');

//URL PENGADUAN
Route::get('admin/viewPengaduan', 'PengaduanController@tampil');
Route::get('admin/verifikasi/{id}', 'PengaduanController@verifikasi');
Route::get('admin/validasi/{id}', 'PengaduanController@validasi');

//URL TANGGAPAN
Route::get('admin/viewTanggapan', 'TanggapanController@view');
Route::get('admin/viewTanggapan/insert/{id}', 'TanggapanController@insert');
Route::post('admin/viewTanggapan/store', 'TanggapanController@store');
Route::get('admin/viewTanggapan/json/{id}', 'TanggapanController@json');
Route::post('admin/viewTanggapan/update', 'TanggapanController@update');
Route::get('admin/viewTanggapan/delete/{id}', 'TanggapanController@delete');