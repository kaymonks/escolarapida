<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Estado;
use App\Http\Requests\PaiRequest;
use App\Telefone;
use App\User;
use CidadeController;
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
        $user['login'] = $dados['login'];
        $user['password'] = bcrypt($dados['senha']);
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
        $user_id = $registro->user_id;
        $login = User::where('id', $user_id)->pluck('login');
        $registro['login'] = $login[0];
        return view('responsavel.editar', compact('registro', 'telefone'));
    }

    public function atualizar(PaiRequest $request, $id)
    {
        $dados = $request->all();
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        Responsavel::find($id)->update($dados);
        $novo_login['login'] = $dados['login'];
        $novo_login['password'] = bcrypt($dados['senha']);
        $novo_login['name'] = $dados['nome'];

        $user_id = Responsavel::where('id', '=', $id)->pluck('user_id');

        User::find($user_id)->update($novo_login);
        if (Auth::user()->permission_id == 4) {
            return redirect()->route('perfil', ['perfil'=>'responsavel', 'id'=>Auth::user()->id]);
        }
        return redirect()->route('responsaveis')->with('success', 'Responsável atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $id_user = Responsavel::find($id);
        $responsavel_user = User::find($id_user->user_id)->delete();
        if ($responsavel_user) {
            return redirect()->route('responsaveis')->with('success', 'Responsável excluído com sucesso');
        }else{
            return redirect()->route('responsaveis')->with('error', 'Houve um erro ao excluir. Se persistir o erro, contate o administrador');
        }
    }
}
