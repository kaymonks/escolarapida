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

    Route::get('/alunos', ['as'=>'alunos', 'uses'=>'AlunoController@index']);
    Route::get('/aluno/adicionar', ['as'=>'aluno.adicionar', 'uses'=>'AlunoController@adicionar']);
    Route::post('/aluno/salvar', ['as'=>'aluno.salvar', 'uses'=>'AlunoController@salvar']);
    Route::get('/aluno/editar/{id}', ['as'=>'aluno.editar', 'uses'=>'AlunoController@editar']);
    Route::put('/aluno/atualizar/{id}', ['as'=>'aluno.atualizar', 'uses'=>'AlunoController@atualizar']);
    Route::get('/aluno/deletar/{id}', ['as'=>'aluno.deletar', 'uses'=>'AlunoController@deletar']);


    Route::get('/mensagens', ['as'=>'mensagens', 'uses'=>'MensagemController@index']);
    Route::get('/mensagem/escola', ['as'=>'mensagem.escola', 'uses'=>'MensagemController@escola']);
    Route::post('/mensagem/escola/enviar', ['as'=>'mensagem.escola.enviar', 'uses'=>'MensagemController@salvarMensagemEscola']);
    Route::get('/mensagem/pai', ['as'=>'mensagem.pai', 'uses'=>'MensagemController@pai']);
    Route::post('/mensagem/pai/enviar', ['as'=>'mensagem.pai.enviar', 'uses'=>'MensagemController@salvarMensagemPai']);
    Route::get('/mensagem/turma', ['as'=>'mensagem.turma', 'uses'=>'MensagemController@turma']);
    Route::post('/mensagem/turma/enviar', ['as'=>'mensagem.turma.enviar', 'uses'=>'MensagemController@salvarMensagemTurma']);

    Route::get('/eventos', ['as'=>'eventos', 'uses'=>'EventoController@index']);
    Route::get('/eventos/editar/{id}', ['as'=>'evento.editar', 'uses'=>'EventoController@editar']);
    Route::put('/eventos/atualizar/{id}', ['as'=>'evento.atualizar', 'uses'=>'EventoController@atualizar']);
    Route::get('/evento/escola', ['as'=>'evento.escola', 'uses'=>'EventoController@escola']);
    Route::post('/evento/escola/enviar', ['as'=>'evento.escola.enviar', 'uses'=>'EventoController@salvarEventoEscola']);
    Route::get('/evento/pai', ['as'=>'evento.pai', 'uses'=>'EventoController@pai']);
    Route::post('/evento/pai/enviar', ['as'=>'evento.pai.enviar', 'uses'=>'EventoController@salvarEventoPai']);
    Route::get('/evento/turma', ['as'=>'evento.turma', 'uses'=>'EventoController@turma']);
    Route::post('/evento/turma/enviar', ['as'=>'evento.turma.enviar', 'uses'=>'EventoController@salvarEventoTurma']);

});

