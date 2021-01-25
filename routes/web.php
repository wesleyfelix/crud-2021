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


Route::get('/produto/listar', 'Produto@listar')->name('produto.listar');
Route::get('/produto/novo', 'Produto@criar')->name('produto.novo');
Route::post('/produto/criar', 'Produto@criar')->name('produto.criar');

Route::get('/produto/editar/{id}', 'Produto@editar')->name('produto.editar');
Route::post('/produto/salvar', 'Produto@salvar')->name('produto.salvar');

Route::get('/produto/deletar/{id}', 'Produto@deletar')->name('produto.deletar');



