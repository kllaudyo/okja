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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function (){

    Route::get('/contas', 'ContaController@index');
    Route::get('/contas/{id}', 'ContaController@edit')->where('id','[0-9]+');
    Route::get('/contas/create', 'ContaController@create');
    Route::post('/contas', 'ContaController@store');
    Route::put('/contas/{id}', 'ContaController@update')->where('id','[0-9]+');
    Route::delete('/contas/{id}','ContaController@destroy')->where('id','[0-9]+');

    Route::get('/categorias', 'CategoriaController@index');
    Route::get('/categorias/create', 'CategoriaController@create');
    Route::get('/categorias/{id}', 'CategoriaController@edit')->where('id','[0-9]+');
    Route::post('/categorias', 'CategoriaController@store');
    Route::put('/categorias/{id}', 'CategoriaController@update')->where('id','[0-9]+');
    Route::delete('/categorias/{id}', 'CategoriaController@destroy')->where('id','[0-9]+');

    Route::get('/movimentos/{data?}','MovimentoController@index')->where('data','(0[1-9]|10|11|12)20[0-9]{2}$');
    Route::get('/movimentos/create', 'MovimentoController@create');
    Route::get('/movimentos/{id}', 'MovimentoController@edit')->where('id','[0-9]+');
    Route::post('/movimentos', 'MovimentoController@store');
    Route::put('/movimentos/{id}', 'MovimentoController@update')->where('id','[0-9]+');
    Route::delete('/movimentos/{id}', 'MovimentoController@destroy')->where('id','[0-9]+');
});
