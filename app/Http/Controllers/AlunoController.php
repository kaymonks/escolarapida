<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Pai;
use App\Turma;

class AlunoController extends Controller
{
    public function index()
    {
        $registros = Aluno::all();
        return view('aluno.index', compact('registros'));
    }

    public function adicionar()
    {
        $pais = Pai::all();
        $turmas = Turma::all();

        return view('aluno.adicionar', compact('pais', 'turmas', 'paiNome', 'turmaNome'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        Aluno::create($dados);

        return redirect()->route('alunos');
    }

    public function editar($id)
    {
        $registro = Aluno::find($id);
        $turmas = Turma::all();
        $pais = Pai::all();
        $turmaNome = Aluno::find($id)->turmas;
        $paiNome = Aluno::find($id)->pais;

        return view('aluno.editar', compact('registro', 'turmas', 'pais', 'turmaNome', 'paiNome'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
//        dd($dados);
        Aluno::find($id)->update($dados);
        return redirect()->route('alunos');
    }

    public function deletar($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }
}
