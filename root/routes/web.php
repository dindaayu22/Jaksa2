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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/pimpinan/dashboard','AdminController@index')->middleware('auth:pimpinan');

Route::group(['middleware'=>['auth:admin']], function(){
	Route::get('/admin/dashboard','AdminController@index')->name('dashboard');
	Route::get('/admin/user','AdminController@get_user');
	Route::get('/admin/dokumen','AdminController@get_dokumen');
	Route::get('/admin/kategori','AdminController@get_kategori');

	Route::get('/admin/kategori/form/{kategori}','AdminController@get_form_kategori');
	Route::post('/admin/kategori/form','AdminController@post_form_kategori');
	Route::put('/admin/kategori/form/{kategori}','AdminController@put_form_kategori');
	Route::get('/admin/user/form/{user}','AdminController@get_form_user');
	Route::post('/admin/user/form','AdminController@post_form_user');
	Route::put('/admin/user/form/{user}','AdminController@put_form_user');
	Route::get('/admin/user/password/{user}','AdminController@get_form_user_pass');
	Route::put('/admin/user/password/{user}','AdminController@put_form_user_pass');
	Route::get('/admin/dokumen/form/{dokumen}','AdminController@get_form_dokumen');
	Route::post('/admin/dokumen/form','AdminController@post_form_dokumen');
	Route::put('/admin/dokumen/form/{dokumen}','AdminController@put_form_dokumen');

	Route::post('/admin/user{page?}','AdminController@get_user');
	Route::post('/admin/kategori{page?}','AdminController@get_kategori');
	Route::post('/admin/dokumen{page?}','AdminController@get_dokumen');
});

//LAnding Page
Route::get('/', 'UserController@index')->name('depan');
Route::get('/dokumen','UserController@get_dokumen');
Route::get('/dokumen/{kategori}','UserController@get_perkategori');
Route::get('/berkas/{berkas}','UserController@get_berkas');
Route::get('/register','UserController@get_register');
Route::get('/register/{user}','UserController@get_form_register');
Route::post('/register','UserController@post_register');
Route::get('/login','UserController@get_login');
Route::get('/login/{user}','UserController@get_form_login');

Route::post('/login/','LoginController@login')->name('login');

Route::get('/logout','LoginController@logout')->name('logout');

Route::get('/download/{berkas}','UserController@post_download_berkas')->name('download');

