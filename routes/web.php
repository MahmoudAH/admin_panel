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

//subprojects routes
Route::get('/subproject/create', 'SubProjectController@create');
Route::get('/subproject/{subproject}/edit', 'SubProjectController@edit')->name('subproject.edit');
Route::post('/subproject/store', 'SubProjectController@store')->name('subproject.store');
Route::put('/subproject/{subproject}/update', 'SubProjectController@update')->name('subproject.update');
Route::delete('/subproject/{subproject}/destroy', 'SubProjectController@destroy')->name('subproject.destroy');
Route::get('/subproject', 'SubProjectController@index')->
    name('subproject.index');
    
//search route for country page
Route::get('/search', 'SearchController@search');

//search route for project page
Route::get('/search2', 'SearchController2@search2');

//search route for subproject page
Route::get('/search3', 'SearchController3@search3');
