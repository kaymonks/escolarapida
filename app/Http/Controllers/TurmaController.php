<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Professor;

class TurmaController extends Controller
{
    public function index()
    {
        $registros = Turma::all();
        return view('turma.index', compact('registros'));
    }

    public function adicionar()
    {
        $registros = Professor::all();
        return view('turma.adicionar', compact('registros'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        Turma::create($dados);

        return redirect()->route('turmas');
    }

    public function editar($id)
    {
        $registro = Turma::find($id);
        return view('turma.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        Turma::find($id)->update($dados);

        return redirect()->route('turmas');
    }

    public function deletar($id)
    {
        Turma::find($id)->delete();
        return redirect('turmas');
    }
}
