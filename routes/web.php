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


Route::group(['middleware' => 'web'], function(){
    Route::get('/', 'HomeController@index');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/users', 'UserProfileController@index')->middleware('auth');
Route::get('/users/new', 'UserProfileController@new')->middleware('auth');
Route::post('/users/add', 'UserProfileController@add')->middleware('auth');
Route::get('/users/{id}/edit', 'UserProfileController@edit')->middleware('auth');
Route::post('/users/update/{id}', 'UserProfileController@update')->middleware('auth');
Route::delete('/users/delete/{id}', 'UserProfileController@delete')->middleware('auth');

Route::get('/users/trashed', 'UserProfileController@trashed')->middleware('auth');
Route::put('/users/restore/{id}', 'UserProfileController@restore')->middleware('auth')->name('trashed.restore');
Route::delete('/users/trashed/delete/{id}', 'UserProfileController@forceDelete')->middleware('auth')->name('trashed.delete');
