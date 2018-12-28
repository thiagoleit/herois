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
  return redirect('guerreiros');
});

Route::resource('tipos', 'TipoController');
//Route::resource('guerreiros', '');
Route::get('guerreiros', 'GuerreiroController@index')->name('guerreiro_index');
Route::prefix('guerreiros')->group(function() {
  Route::get('create', 'GuerreiroController@create')->name('guerreiro_create');
  Route::post('store', 'GuerreiroController@store')->name('guerreiro_store');
  Route::get('{guerreiro}/edit', 'GuerreiroController@edit')->name('guerreiro_edit');
  Route::post('{guerreiro}/update', 'GuerreiroController@update')->name('guerreiro_update');
  Route::get('{guerreiro}/delete', 'GuerreiroController@delete')->name('guerreiro_delete');
});

Route::get('tipos', 'TipoController@index')->name('tipo_index');
Route::prefix('tipos')->group(function() {
  Route::get('create', 'TipoController@create')->name('tipo_create');
  Route::post('store', 'TipoController@store')->name('tipo_store');
  Route::get('{tipo}/edit', 'TipoController@edit')->name('tipo_edit');
  Route::post('{tipo}/update', 'TipoController@update')->name('tipo_update');
  Route::get('{tipo}/delete', 'TipoController@delete')->name('tipo_delete');
});

Route::get('especialidades', 'EspecialidadeController@index')->name('especialidade_index');
Route::prefix('especialidades')->group(function() {
  Route::get('create', 'EspecialidadeController@create')->name('especialidade_create');
  Route::post('store', 'EspecialidadeController@store')->name('especialidade_store');
  Route::get('{especialidade}/edit', 'EspecialidadeController@edit')->name('especialidade_edit');
  Route::post('{especialidade}/update', 'EspecialidadeController@update')->name('especialidade_update');
  Route::get('{especialidade}/delete', 'EspecialidadeController@delete')->name('especialidade_delete');
});
