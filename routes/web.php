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

Route::get('/empresa/listar', 'Empresa@listar')->name('empresa.listar');
Route::get('/empresa/novo', 'Empresa@criar')->name('empresa.novo');
Route::post('/empresa/novo', 'Empresa@criar')->name('empresa.criar');
Route::get('/empresa/editar/{id}', 'Empresa@editar')->name('empresa.editar');
Route::post('/empresa/salvar', 'Empresa@salvar')->name('empresa.salvar');
Route::get('/empresa/deletar/{id}', 'Empresa@deletar')->name('empresa.deletar');

Route::get('/usuario/listar', 'User@listar')->name('usuario.listar');
Route::get('/usuario/novo', 'User@criar')->name('usuario.novo');
Route::post('/usuario/novo', 'User@criar')->name('usuario.criar');
Route::get('/usuario/editar/{id}', 'User@editar')->name('usuario.editar');
Route::post('/usuario/salvar', 'User@salvar')->name('usuario.salvar');
Route::get('/usuario/deletar/{id}', 'User@deletar')->name('usuario.deletar');






