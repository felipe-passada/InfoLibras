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

// Route::prefix('qrcode')->group(function() {
//     Route::get('/', 'QrCodeController@getAll');
//     Route::get('/{id}', 'QrCodeController@get');
//     Route::post('/', 'QrCodeController@store');
//     Route::put('/{id}', 'QrCodeController@update');
//     Route::delete('/{id}','QrCodeController@destroy');
// });