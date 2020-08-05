<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
// got to /index yung-san
route::get('/index', function () {
    return view('compagnie.index');
})->name('index.index');
route::get('/index2', function () {
    return view('compagnie.index2');
})->name('index.index2');
route::get('/index3', function () {
    return view('compagnie.index3');
})->name('index.index3');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'ContactsController@get')->name('contacts.get');
Route::get('/conversation/{id}', 'MessageController@getMessagesFor')->name('message.getMessagesFor');
Route::post('/conversation/send', 'MessageController@send')->name('message.send');



