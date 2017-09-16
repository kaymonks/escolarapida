<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/escolas', ['as'=>'escolas', 'uses'=>'escolaController@index']);
Route::get('/escola/adicionar', ['as'=>'escola.adicionar', 'uses'=>'escolaController@adicionar']);
Route::post('/escola/salvar', ['as'=>'escola.salvar', 'uses'=>'escolaController@salvar']);
Route::get('/escola/editar/{id}', ['as'=>'escola.editar', 'uses'=>'escolaController@editar']);
Route::put('/escola/atualizar/{id}', ['as'=>'escola.atualizar', 'uses'=>'escolaController@atualizar']);
Route::get('/escola/deletar/{id}', ['as'=>'escola.deletar', 'uses'=>'escolaController@deletar']);

Route::get('/professores', ['as'=>'professores', 'uses'=>'ProfessorController@index']);
Route::get('/professor/adicionar', ['as'=>'professor.adicionar', 'uses'=>'ProfessorController@adicionar']);
Route::post('/professor/salvar', ['as'=>'professor.salvar', 'uses'=>'professorController@salvar']);
Route::get('/professor/editar/{id}', ['as'=>'professor.editar', 'uses'=>'professorController@editar']);
Route::put('/professor/atualizar/{id}', ['as'=>'professor.atualizar', 'uses'=>'professorController@atualizar']);
Route::get('/professor/deletar/{id}', ['as'=>'professor.deletar', 'uses'=>'professorController@deletar']);
