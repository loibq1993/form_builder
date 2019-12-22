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
Route::get('/formbuilder', 'FormBuilderController@index')->name('index');
Route::get('/formbuilder/create', 'FormBuilderController@create')->name('create');
Route::post('/formbuilder/store', 'FormBuilderController@store')->name('store');
Route::get('/formbuilder/edit/{id}', 'FormBuilderController@edit')->name('edit');
Route::post('/formbuilder/update/{id}', 'FormBuilderController@update')->name('update');
Route::get('/formbuilder/delete/{id}', 'FormBuilderController@delete')->name('delete');
Route::get('/formbuilder/preview/{id}', 'FormBuilderController@preview')->name('preview');
