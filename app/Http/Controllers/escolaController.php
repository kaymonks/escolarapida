<?php

namespace App\Http\Controllers;

use App\Http\Requests\EscolaRequest;
use App\Telefone;
use App\User;
use Illuminate\Http\Request;
use App\Escola;

class escolaController extends Controller
{

    public function index()
    {
        $registros = Escola::all();
        return view('escola.index', compact('registros'))->with(['page' => 'escola']);
    }

    public function adicionar()
    {
        return view('escola.adicionar');
    }

    public function salvar(EscolaRequest $request)
    {
        $dados = $request->all();
        $user['login'] = $dados['login'];
        $user['password'] = bcrypt($dados['senha']);
        $user['permission_id'] = 2;
        $user['name'] = $dados['nome'];
        $user = User::create($user);
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $dados['user_id'] = $user->id;
        Escola::create($dados);

        return redirect()->route('escolas');
    }

    public function editar($id)
    {
        $registro = Escola::find($id);
        $telefone = Escola::find($id)->telefones;
        $registro['telefone'] = $telefone->telefone;
        $escola = Escola::find($id)->usuarios;
        $user_id = $escola->id;
        $user = User::find($user_id);
        $registro['login'] = $user->login;
        return view('escola.editar', compact('registro'));
    }

    public function atualizar(EscolaRequest $request, $id)
    {
        $dados = $request->all();
        $dadosUser = array();
        $dadosUser['login'] = $dados['login'];
        $dadosUser['password'] = bcrypt($dados['senha']);

        Escola::find($id)->update($dados);
        $escolaUser = Escola::where('id', $id)->pluck('user_id');
        $escolaUser = $escolaUser[0];

        User::find($escolaUser)->update($dadosUser);
        return redirect()->route('escolas');
    }

    public function deletar($id)
    {
        Escola::find($id)->delete();
        return redirect('escolas');
    }
}
