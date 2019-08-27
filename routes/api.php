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

Route::apiResource('/tagihan', 'TagihanController');
Route::apiResource('/user', 'UserController');
Route::get('/user-data', 'UserController@userTable')->name('user.table');
Route::get('/tagihan-data', 'TagihanController@tableTagihan')->name('user.tagihan.table');
Route::get('/admin-tagihan-data', 'AdminTagihanController@tagihanTable')->name('admin.tagihan.table');
