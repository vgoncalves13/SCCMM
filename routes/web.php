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



Route::resource('empresas','EmpresaController');
Route::resource('enderecos','EnderecoController');
Route::resource('parques','ParqueController');
Route::post('enderecos/create','EnderecoController@create');
Route::post('parques/create','ParqueController@create');