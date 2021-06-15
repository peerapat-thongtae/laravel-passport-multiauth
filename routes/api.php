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

Route::group(['middleware' => ['multiauth:admin']], function () {
    Route::get('/admin', function () {
        return 'is admin'; // You can use too `$request->user('admin')` passing the guard.
    });
});

Route::group(['middleware' => ['multiauth:api']], function () {
    Route::get('/user', function () {
        return 'is user'; // You can use too `$request->user('admin')` passing the guard.
    });
});

