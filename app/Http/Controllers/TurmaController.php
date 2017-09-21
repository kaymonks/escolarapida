<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Professor;
use App\TurmaProfessor;
Use Illuminate\Support\Facades\DB;

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
        $nomes = array();
        return view('turma.adicionar', compact('registros', 'nomes'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $turma = Turma::create($dados);

        $turma_id =  $turma->id;


        foreach ($request->professor as $item) {
            $professor['turma_id'] = $turma_id;
            $professor['professor_id'] = $item;
            TurmaProfessor::create($professor);
        }
//        print_r($professor);die();
        return redirect()->route('turmas');
    }

    public function editar($id)
    {
        $turmas = Turma::find($id);
        $registros = Professor::all();

        $a = Turma::find($id)->professores->all();

        $nomes = array();
        foreach($a as $item) {
            $nomes[] = $item->id;

        }

        return view('turma.editar', compact('turmas', 'registros', 'nomes'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        Turma::find($id)->update($dados);

        foreach ($request->professor as $item) {
            echo "Turma id".$professor['turma_id'] = $id;
            echo "Professor id".$professor['professor_id'] = $item;
            TurmaProfessor::updated($professor);
        }

        return redirect()->route('turmas');
    }

    public function deletar($id)
    {
        Turma::find($id)->delete();
        return redirect('turmas');
    }
}
