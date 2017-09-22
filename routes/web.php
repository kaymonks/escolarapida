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

Route::get('/login', ['as'=>'login', 'uses'=>'LoginController@index']);
Route::post('/login/entrar', ['as'=>'login.entrar', 'uses'=>'LoginController@entrar']);
Route::get('/login/sair', ['as'=>'login.sair', 'uses'=>'LoginController@sair']);


Route::group(['middleware'=>'auth'], function (){

    Route::get('/escolas', ['as'=>'escolas', 'uses'=>'escolaController@index']);
    Route::get('/escola/adicionar', ['as'=>'escola.adicionar', 'uses'=>'escolaController@adicionar']);
    Route::post('/escola/salvar', ['as'=>'escola.salvar', 'uses'=>'escolaController@salvar']);
    Route::get('/escola/editar/{id}', ['as'=>'escola.editar', 'uses'=>'escolaController@editar']);
    Route::put('/escola/atualizar/{id}', ['as'=>'escola.atualizar', 'uses'=>'escolaController@atualizar']);
    Route::get('/escola/deletar/{id}', ['as'=>'escola.deletar', 'uses'=>'escolaController@deletar']);

    Route::get('/professores', ['as'=>'professores', 'uses'=>'ProfessorController@index']);
    Route::get('/professor/adicionar', ['as'=>'professor.adicionar', 'uses'=>'ProfessorController@adicionar']);
    Route::post('/professor/salvar', ['as'=>'professor.salvar', 'uses'=>'ProfessorController@salvar']);
    Route::get('/professor/editar/{id}', ['as'=>'professor.editar', 'uses'=>'ProfessorController@editar']);
    Route::put('/professor/atualizar/{id}', ['as'=>'professor.atualizar', 'uses'=>'ProfessorController@atualizar']);
    Route::get('/professor/deletar/{id}', ['as'=>'professor.deletar', 'uses'=>'ProfessorController@deletar']);

    Route::get('/turmas', ['as'=>'turmas', 'uses'=>'TurmaController@index']);
    Route::get('/turma/adicionar', ['as'=>'turma.adicionar', 'uses'=>'TurmaController@adicionar']);
    Route::post('/turma/salvar', ['as'=>'turma.salvar', 'uses'=>'TurmaController@salvar']);
    Route::get('/turma/editar/{id}', ['as'=>'turma.editar', 'uses'=>'TurmaController@editar']);
    Route::put('/turma/atualizar/{id}', ['as'=>'turma.atualizar', 'uses'=>'TurmaController@atualizar']);
    Route::get('/turma/deletar/{id}', ['as'=>'turma.deletar', 'uses'=>'TurmaController@deletar']);

    Route::get('/pais', ['as'=>'pais', 'uses'=>'PaiController@index']);
    Route::get('/pai/adicionar', ['as'=>'pai.adicionar', 'uses'=>'PaiController@adicionar']);
    Route::post('/pai/salvar', ['as'=>'pai.salvar', 'uses'=>'PaiController@salvar']);
    Route::get('/pai/editar/{id}', ['as'=>'pai.editar', 'uses'=>'PaiController@editar']);
    Route::put('/pai/atualizar/{id}', ['as'=>'pai.atualizar', 'uses'=>'PaiController@atualizar']);
    Route::get('/pai/deletar/{id}', ['as'=>'pai.deletar', 'uses'=>'PaiController@deletar']);
});

