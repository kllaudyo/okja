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
    Route::get('/contas/{id}', 'ContaController@show')->where("id","[0-9]+");
    Route::get('/contas/create', 'ContaController@create');

    Route::get('/categorias', 'CategoriaController@index');
    Route::get('/categorias/create', 'CategoriaController@create');

    Route::get('/movimentos', 'MovimentoController@index');
    Route::get('/movimentos/create', 'MovimentoController@create');
});
