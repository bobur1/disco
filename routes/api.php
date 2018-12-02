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
Route::get('/user/register', 'ClientApiController@register')->name('client.register');
Route::get('/user/login', 'ClientApiController@login')->name('client.login');
Route::get('/user/info', 'ClientApiController@information')->name('client.info');
Route::get('/user/discount', 'ClientApiController@discount')->name('client.dicount');
Route::get('/sale', 'ClientApiController@sale')->name('client.sale');
Route::get('/openData/amount', 'OpenApiController@index')->name('opendata.amount');
Route::get('/openData/price', 'OpenApiController@price')->name('opendata.price');