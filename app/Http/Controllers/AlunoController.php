<?php

namespace App\Http\Controllers;

use App\AlunoResponsavel;
use App\Http\Requests\AlunoRequest;
use App\Telefone;
use App\Escola;

use Illuminate\Http\Request;
use App\Aluno;
use App\Responsavel;
use App\Turma;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function index()
    {
        $registros = Aluno::paginate(15);
        return view('aluno.index', compact('registros'));
    }

    public function adicionar()
    {
        $usuario = Auth::user();
        $escola_id = Escola::where('user_id', '=', $usuario->id)->pluck('id');
        $responsaveis = Responsavel::where('escola_id', $escola_id)->orderBy('nome', 'asc')->get();
        $turmas = Turma::where('escola_id', $escola_id)->get();
        $nomepais = array();
        return view('aluno.adicionar', compact('responsaveis', 'turmas', 'nomepais'));
    }

    public function salvar(AlunoRequest $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        $telefone['telefone'] = $dados['telefone'];
        $get_tel_id = Telefone::create($telefone);
        $dados['telefone_id'] = $get_tel_id->id;

        $user_logado = $request->user()->id;

        $escola =  Escola::where('user_id', $user_logado)->first();
        $dados['escola_id'] = $escola->id;

        $aluno = Aluno::create($dados);

        $aluno_id = $aluno->id;

        foreach ($request->pai_id as $item) {
            $pai['aluno_id'] = $aluno_id;
            $pai['responsavel_id'] = $item;
            AlunoResponsavel::create($pai);
        }

        return redirect()->route('alunos');
    }

    public function editar($id)
    {
        $usuario = Auth::user();
        $escola_id = Escola::where('user_id', '=', $usuario->id)->pluck('id');
        $registro = Aluno::find($id);
//        dd($registro);
//        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
        $turmas = Turma::where('escola_id', $escola_id)->get();
        $responsaveis = Responsavel::where('escola_id', $escola_id)->orderBy('nome', 'asc')->get();
        $turmaNome = Aluno::find($id)->turmas;
        $paiNome = Aluno::find($id)->pais;
        $telefone = Aluno::find($id)->telefones;
        $paisAlunos = Aluno::find($id)->responsaveis->all();

        foreach ($paisAlunos as $item) {
            $nomepais[] = $item->id;
        }

        return view('aluno.editar', compact('registro', 'turmas', 'responsaveis', 'turmaNome', 'paiNome', 'telefone', 'nomepais'));
    }

    public function atualizar(AlunoRequest $request, $id)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);

        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        Aluno::find($id)->update($dados);
        AlunoResponsavel::where('aluno_id', '=', $id)->delete();
        foreach ($request->pai_id as $item) {
            $pai['aluno_id'] = $id;
            $pai['responsavel_id'] = $item;
            AlunoResponsavel::create($pai);
        }
        $novoTelefone['telefone'] = $dados['telefone'];
        $get_tel_id = Aluno::where('id', $id)->pluck('telefone_id');
        $telefone = Telefone::find($get_tel_id)->update($novoTelefone);

        return redirect()->route('alunos');
    }

    public function deletar($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }
}
