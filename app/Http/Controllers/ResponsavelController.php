<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Http\Requests\PaiRequest;
use App\Telefone;
use App\User;
use Illuminate\Http\Request;
use App\Responsavel;
use DateTime;
use Illuminate\Support\Facades\Auth;


class ResponsavelController extends Controller
{
    private $permission_id = 4;

    public function index()
    {
        $user_logado = Auth::user();

        $id_usuario = $user_logado->id;

        $escola = Escola::where('user_id', $id_usuario)->first();

        $registros = Responsavel::where('escola_id', '=', $escola->id)->get();

//        $registros = Responsavel::paginate(3);
        return view('responsavel.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('responsavel.adicionar');
    }

    public function salvar(PaiRequest $request)
    {
        $request->flash();
        $dados = $request->all();
        $user['email'] = $dados['login'];
        $user['password'] = bcrypt($dados['senha']);
//        $user['password'] = $dados['senha'];
        $user['permission_id'] = $this->permission_id;
        $user['name'] = $dados['nome'];
        $user = User::create($user);
        $dados['user_id'] = $user->id;
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        $user_logado = $request->user()->id;
        $escola =  Escola::where('user_id', $user_logado)->first();
        $dados['escola_id'] = $escola->id;

        Responsavel::create($dados);

        return redirect()->route('responsaveis');
    }

    public function editar($id)
    {
        $registro = Responsavel::find($id);
        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
        $telefone = Responsavel::find($id)->telefones;
        return view('responsavel.editar', compact('registro', 'telefone'));
    }

    public function atualizar(PaiRequest $request, $id)
    {
        $dados = $request->all();
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
//        if ( false===$novaData )
//        {
//            die('formato de data inválido');
//        }
        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        Responsavel::find($id)->update($dados);
        $novo_login['email'] = $dados['login'];
        $novo_login['password'] = bcrypt($dados['senha']);

        $user_id = Responsavel::where('id', '=', $id)->pluck('user_id');

        User::find($user_id)->update($novo_login);
        return redirect()->route('responsaveis');
    }

    public function deletar($id)
    {
        Responsavel::find($id)->delete();
        return redirect('responsaveis');
    }
}
