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

Auth::routes();

Route::get('/admin', 'HomeController@dashboard')->name('admin');

Route::resource('/country', 'CountryController');
Route::resource('/project', 'ProjectController');

Route::get('/subproject/create', 'SubProjectController@create');
Route::get('/subproject/{subproject}/edit', 'SubProjectController@edit')->name('subproject.edit');

Route::post('/subproject/store', 'SubProjectController@store')->name('subproject.store');

Route::put('/subproject/{subproject}/update', 'SubProjectController@update')->name('subproject.update');


Route::delete('/subproject/{subproject}/destroy', 'SubProjectController@destroy')->name('subproject.destroy');
Route::get('/subproject', 'SubProjectController@index')->
    name('subproject.index');


Route::get('/search', 'SearchController@search');
Route::get('/search2', 'SearchController2@search2');
