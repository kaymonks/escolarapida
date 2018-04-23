<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\User;
use App\Escola;
use Illuminate\Http\Request;
use App\Professor;
use App\Telefone;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    private $permission_id = 3;

    public function index()
    {
        $user_logado = Auth::user()->id;
        $escola = Escola::where('user_id', $user_logado)->first();
        $escola_id = $escola->id;
        $registros = Professor::with('telefones')->where('escola_id', $escola_id)->paginate(10);

        return view('professor.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('professor.adicionar');
    }

    public function salvar(ProfessorRequest $request)
    {
        $dados = $request->all();
        $user['email'] = $dados['email'];
        $user['password'] = bcrypt($dados['senha']);
        $user['permission_id'] = $this->permission_id;
        $user['name'] = $dados['login'];
        $user = User::create($user);
        $dados['user_id'] = $user->id;
        $user_logado = $request->user()->id;

        $escola =  Escola::where('user_id', $user_logado)->first();

        $telefone['telefone'] = $dados['telefone'];
        $telefone_id = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone_id->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        $dados['escola_id'] = $escola->id;
//        dd($dados);
        Professor::create($dados);

        return redirect()->route('professores');
    }

    public function editar($id)
    {
        $registro = Professor::find($id);
        $user_id = $registro->user_id;
        $login = User::find($user_id);
        $registro['login'] = $login->email;

        $telefone = Professor::find($id)->telefones;
        $registro['telefone'] = $telefone->telefone;
        $registro['telefone_id'] = $telefone->id;
        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );

        return view('professor.editar', compact('registro', 'telefone'));
    }

    public function atualizar(ProfessorRequest $request, $id)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        $telefone = Telefone::find($dados['telefone_id']);
        $telefone->telefone = $dados['telefone'];
        $telefone->save();
        $professor = Professor::find($id)->update($dados);
        $novo_login['email'] = $dados['login'];
        $novo_login['password'] = bcrypt($dados['senha']);

        $user_id = Professor::where('id', '=', $id)->pluck('user_id');

        User::find($user_id)->update($novo_login);

        return redirect()->route('professores');
    }

    public function deletar($id)
    {
        Professor::find($id)->delete();
        return redirect('professores');
    }
}
