<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/compagnie/{q?}', 'CompagnieController@index')->name('compagnie.index');
Route::post('/compagnieStore', 'CompagnieController@store')->name('compagnie.store');
Route::get('/compagnie/Edit/{id}', 'CompagnieController@edit')->name('compagnie.edit');
Route::post('/compagnie/Edit/{id}', 'CompagnieController@update')->name('compagnie.update');
Route::post('/compagnie/delete/{id}', 'CompagnieController@delete')->name('compagnie.delete');





