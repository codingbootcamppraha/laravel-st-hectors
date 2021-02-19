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

Route::get('/', 'IndexController@index')->name('index');

Route::get('/animal/{id}/{visit_id?}', 'AnimalController@show')->name('animal.show');

Route::get('/admin/animal/create', 'Admin\AnimalController@create');
Route::get('/admin/animal', 'Admin\AnimalController@store');
Route::get('/admin/animal/{id}/edit', 'Admin\AnimalController@edit');
Route::put('/admin/animal/{id}', 'Admin\AnimalController@update');
Route::delete('/admin/animal/{id}', 'Admin\AnimalController@delete');

Route::get('/visit', 'VisitController@store')->name('visit.store');
Route::put('/visit/{id}', 'VisitController@update')->name('visit.update');