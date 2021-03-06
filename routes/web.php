<?php

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
    return redirect(route('login'));
});

Route::apiResource('api/cities', 'API\CityController');

Auth::routes(['register'=>false]);

Route::resource('cities', 'CityController');
Route::resource('users', 'UserController');
Route::post('users/update', 'UserController@update')->name('user.update');