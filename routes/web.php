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
    Route::post('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
    Route::get('/visimisi/download', 'FileController@downloadPDF')->name('download.visimisi');
    Route::get('/anggota/struktur', 'AnggotaController@showStructure')->name('struktur.anggota');
});

// Route::get('/test', 'TagihanController@test');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/users', 'AdminController@userView')->name('admin.manage.user');
        Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::resource('/keuangan/tagihan', 'AdminTagihanController', [
            'as' => 'admin'
        ]);
        Route::post('/keuangan/tagihan/update/{id}', 'AdminTagihanController@updateTagihan')->name('admin.update.tagihan');
        Route::get('/changePassword', 'AdminController@showChangePasswordForm')->name('form.admin.password');
        Route::post('/changePassword', 'AdminController@changePassword')->name('change.admin.password');
        Route::post('/file/upload', 'FileController@upload')->name('upload.visimisi');
    });
});

Route::get('/tagihan', 'TagihanController@userView');
