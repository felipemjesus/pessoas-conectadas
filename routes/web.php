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

Route::get('/', 'PessoasController@index')->name('pessoas.index');
Route::get('/pessoas/create', 'PessoasController@create')->name('pessoas.create');
Route::post('/pessoas/store','PessoasController@store')->name('pessoas.store');
Route::get('/pessoas/{id}/edit', 'PessoasController@edit')->name('pessoas.edit');
Route::get('/pessoas/{id}/view', 'PessoasController@view')->name('pessoas.view');
Route::get('/pessoas/{id}/destroy', 'PessoasController@destroy')->name('pessoas.destroy');
