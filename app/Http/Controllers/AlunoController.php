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

class AlunoController extends Controller
{
    public function index()
    {
        $registros = Aluno::paginate(15);
        return view('aluno.index', compact('registros'));
    }

    public function adicionar()
    {
        $pais = Responsavel::orderBy('nome', 'asc')->get();
        $turmas = Turma::all();
        $registro = Aluno::all();
        $paiNome = array('id'=>1);
        $turmaNome = array('id'=>1);
        $telefone = array('telefone'=>'3r32r3');
        $nomepais = array();
        return view('aluno.adicionar', compact('pais', 'turmas', 'nomepais'));
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
        $registro = Aluno::find($id);
        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
        $turmas = Turma::all();
        $pais = Responsavel::all();
        $turmaNome = Aluno::find($id)->turmas;
        $paiNome = Aluno::find($id)->pais;
        $telefone = Aluno::find($id)->telefones;
        $paisAlunos = Aluno::find($id)->responsaveis->all();
//        dd($paisAlunos);
        foreach ($paisAlunos as $item) {
            $nomepais[] = $item->id;
        }
//        dd($nomepais);
        return view('aluno.editar', compact('registro', 'turmas', 'pais', 'turmaNome', 'paiNome', 'telefone', 'nomepais'));
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
        return redirect()->route('alunos');
    }

    public function deletar($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }
}
