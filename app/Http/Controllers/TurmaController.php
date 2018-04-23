<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaRequest;
use Illuminate\Http\Request;
use App\Turma;
use App\Escola;
use App\Professor;
use App\TurmaProfessor;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{

    public function index()
    {
        $usuario = Auth::user();


        if ($usuario->permission_id == 3)
        {
            $professor = Professor::where('user_id', '=', $usuario->id)->first();
            $professor_id = $professor->id;
            $escola_id = $professor->escola_id;
            $turmas = Professor::find($professor_id)->turmas()->paginate(10);

        }else{
            $escola = Escola::where('user_id', $usuario->id)->first();
            $escola_id = $escola->id;
            $turmas = Turma::where('escola_id', $escola_id)->paginate(4);
        }
        $turmas->permission_id = $usuario->permission_id;


        return view('turma.index', compact('turmas'));
    }

    public function adicionar()
    {
        $registros = Professor::all();
        $nomes = array();
        return view('turma.adicionar', compact('registros', 'nomes'));
    }

    public function salvar(TurmaRequest $request)
    {
        $dados = $request->all();

        $user_logado = $request->user()->id;

        $escola =  Escola::where('user_id', $user_logado)->first();
        $dados['escola_id'] = $escola->id;
        $turma = Turma::create($dados);

        $turma_id =  $turma->id;



        foreach ($request->professor as $item) {
            $professor['turma_id'] = $turma_id;
            $professor['professor_id'] = $item;
            TurmaProfessor::create($professor);
        }
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

    public function atualizar(TurmaRequest $request, $id)
    {
        $dados = $request->all();

        Turma::find($id)->update($dados);
        TurmaProfessor::where('turma_id', '=', $id)->delete();
        foreach ($request->professor as $item) {
            $professor['turma_id'] = $id;
            $professor['professor_id'] = $item;
            TurmaProfessor::create($professor);
        }

        return redirect()->route('turmas');
    }

    public function deletar($id)
    {
        Turma::find($id)->delete();
        return redirect('turmas');
    }
}
