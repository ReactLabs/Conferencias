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
    return view('welcome');
});

Route::get('/', 'AdminController@index');

/**
 * Rotas de eventos, que serão usadas pelo moderador ou acima
 *
 * Obg ^^/
 */
Route::resource('/moderator/event', 'EventController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/area', 'AreaController');

Route::resource('/admin', 'AdminController');

Route::resource('/moderator', 'ModeratorController');