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

Route::get('/401',function () {
   return view('errors/401');
});

Route::get('/login', ['as'=>'login', 'uses'=>'LoginController@index']);
Route::post('/login/entrar', ['as'=>'login.entrar', 'uses'=>'LoginController@entrar']);
Route::get('/login/sair', ['as'=>'login.sair', 'uses'=>'LoginController@sair']);

Route::group(['middleware'=> ['admin']], function () {
    Route::get('/escolas', ['as'=>'escolas', 'uses'=>'escolaController@index']);
    Route::get('/escola/adicionar', ['as'=>'escola.adicionar', 'uses'=>'escolaController@adicionar']);
    Route::post('/escola/salvar', ['as'=>'escola.salvar', 'uses'=>'escolaController@salvar']);
    Route::get('/escola/editar/{id}', ['as'=>'escola.editar', 'uses'=>'escolaController@editar']);
    Route::put('/escola/atualizar/{id}', ['as'=>'escola.atualizar', 'uses'=>'escolaController@atualizar']);
    Route::get('/escola/deletar/{id}', ['as'=>'escola.deletar', 'uses'=>'escolaController@deletar']);
});

Route::group(['middleware'=> ['checkEscola']], function () {
    Route::get('/professores', ['as'=>'professores', 'uses'=>'ProfessorController@index']);
    Route::get('/professor/adicionar', ['as'=>'professor.adicionar', 'uses'=>'ProfessorController@adicionar']);
    Route::post('/professor/salvar', ['as'=>'professor.salvar', 'uses'=>'ProfessorController@salvar']);
    Route::get('/professor/editar/{id}', ['as'=>'professor.editar', 'uses'=>'ProfessorController@editar']);
    Route::put('/professor/atualizar/{id}', ['as'=>'professor.atualizar', 'uses'=>'ProfessorController@atualizar']);
    Route::get('/professor/deletar/{id}', ['as'=>'professor.deletar', 'uses'=>'ProfessorController@deletar']);
});

Route::group(['middleware'=> 'checkResponsaveis'], function () {
    Route::get('/responsaveis', ['as'=>'responsaveis', 'uses'=>'ResponsavelController@index']);
    Route::get('/responsavel/adicionar', ['as'=>'responsavel.adicionar', 'uses'=>'ResponsavelController@adicionar']);
    Route::post('/responsavel/salvar', ['as'=>'responsavel.salvar', 'uses'=>'ResponsavelController@salvar']);
    Route::get('/responsavel/editar/{id}', ['as'=>'responsavel.editar', 'uses'=>'ResponsavelController@editar']);
    Route::put('/responsavel/atualizar/{id}', ['as'=>'responsavel.atualizar', 'uses'=>'ResponsavelController@atualizar']);
    Route::get('/responsavel/deletar/{id}', ['as'=>'responsavel.deletar', 'uses'=>'ResponsavelController@deletar']);
});

Route::group(['middleware'=> ['checkAluno']], function () {
    Route::get('/alunos', ['as'=>'alunos', 'uses'=>'AlunoController@index']);
    Route::get('/aluno/adicionar', ['as'=>'aluno.adicionar', 'uses'=>'AlunoController@adicionar']);
    Route::post('/aluno/salvar', ['as'=>'aluno.salvar', 'uses'=>'AlunoController@salvar']);
    Route::get('/aluno/editar/{id}', ['as'=>'aluno.editar', 'uses'=>'AlunoController@editar']);
    Route::put('/aluno/atualizar/{id}', ['as'=>'aluno.atualizar', 'uses'=>'AlunoController@atualizar']);
    Route::get('/aluno/deletar/{id}', ['as'=>'aluno.deletar', 'uses'=>'AlunoController@deletar']);
});

Route::group(['middleware'=> ['checkMensagem']], function () {
    Route::get('/mensagens', ['as'=>'mensagens', 'uses'=>'MensagemController@index']);
    Route::get('/mensagens/enviados', ['as'=>'mensagens.enviados', 'uses'=>'MensagemController@enviados']);
    Route::get('/mensagem/view/{id}', ['as'=>'mensagem.view', 'uses'=>'MensagemController@view']);
    Route::put('/mensagem/atualizar/{id}', ['as'=>'mensagem.atualizar', 'uses'=>'MensagemController@atualizar']);
    Route::get('/mensagem/escola', ['as'=>'mensagem.escola', 'uses'=>'MensagemController@escola']);
    Route::post('/mensagem/escola/enviar', ['as'=>'mensagem.escola.enviar', 'uses'=>'MensagemController@salvarMensagemEscola']);
    Route::get('/mensagem/responsavel', ['as'=>'mensagem.responsavel', 'uses'=>'MensagemController@responsavel']);
    Route::post('/mensagem/responsavel/enviar', ['as'=>'mensagem.responsavel.enviar', 'uses'=>'MensagemController@salvarMensagemResponsavel']);
    Route::get('/mensagem/turma', ['as'=>'mensagem.turma', 'uses'=>'MensagemController@turma']);
    Route::post('/mensagem/turma/enviar', ['as'=>'mensagem.turma.enviar', 'uses'=>'MensagemController@salvarMensagemTurma']);
    Route::get('/mensagem/professor', ['as'=>'mensagem.professor', 'uses'=>'MensagemController@professor']);
    Route::post('/mensagem/professor/enviar', ['as'=>'mensagem.professor.enviar', 'uses'=>'MensagemController@salvarMensagemProfessor']);
});

Route::group(['middleware'=> ['checkEvento']], function () {
    Route::get('/eventos/editar/{id}', ['as' => 'evento.editar', 'uses' => 'EventoController@editar']);
    Route::put('/eventos/atualizar/{id}', ['as' => 'evento.atualizar', 'uses' => 'EventoController@atualizar']);
    Route::get('/eventos/deletar/{id}', ['as' => 'evento.deletar', 'uses' => 'EventoController@deletar']);
    Route::get('/evento/responsavel', ['as' => 'evento.responsavel', 'uses' => 'EventoController@responsavel']);
    Route::post('/evento/responsavel/enviar', ['as' => 'evento.responsavel.enviar', 'uses' => 'EventoController@salvarEventoResponsavel']);
    Route::get('/evento/turma', ['as' => 'evento.turma', 'uses' => 'EventoController@turma']);
    Route::post('/evento/turma/enviar', ['as' => 'evento.turma.enviar', 'uses' => 'EventoController@salvarEventoTurma']);
});

Route::get('/eventos', ['as' => 'eventos', 'uses' => 'EventoController@index'])->middleware('checkEventoResponsavel');
Route::get('/eventos/visualizar/{id}', ['as' => 'evento.visualizar', 'uses' => 'EventoController@visualizar'])->middleware('checkEventoResponsavel');
Route::get('/evento/{id}/confirmar', ['as' => 'evento.confirmar', 'uses' => 'EventoController@confirmarEvento'])->middleware('checkEventoResponsavel');
Route::get('/evento/escola', ['as' => 'evento.escola', 'uses' => 'EventoController@escola'])->middleware('checkEventoEscola');
Route::post('/evento/escola/enviar', ['as' => 'evento.escola.enviar', 'uses' => 'EventoController@salvarEventoEscola'])->middleware('checkEventoEscola');

Route::group(['middleware'=> ['checkTurma']], function () {
    Route::get('/turmas', ['as'=>'turmas', 'uses'=>'TurmaController@index']);
    Route::get('/turma/adicionar', ['as'=>'turma.adicionar', 'uses'=>'TurmaController@adicionar']);
    Route::post('/turma/salvar', ['as'=>'turma.salvar', 'uses'=>'TurmaController@salvar']);
    Route::get('/turma/editar/{id}', ['as'=>'turma.editar', 'uses'=>'TurmaController@editar']);
    Route::put('/turma/atualizar/{id}', ['as'=>'turma.atualizar', 'uses'=>'TurmaController@atualizar']);
    Route::get('/turma/deletar/{id}', ['as'=>'turma.deletar', 'uses'=>'TurmaController@deletar']);
});

Route::get('/perfil', ['as' => 'perfil', 'uses' => 'PerfilController@index']);


//Auth::routes();

Route::get('/home', 'HomeController@index');
