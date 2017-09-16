<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $registros = Professor::all();
        return view('professor.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('professor.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        Professor::create($dados);

        return redirect()->route('professores');
    }

    public function editar($id)
    {
        $registro = Professor::find($id);
        return view('professor.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        Professor::find($id)->update($dados);
        return redirect()->route('professores');
    }

    public function deletar($id)
    {
        Professor::find($id)->delete();
        return redirect('professores');
    }
}
