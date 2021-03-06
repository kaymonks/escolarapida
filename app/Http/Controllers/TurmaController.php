<?php

namespace App\Http\Controllers;

use App\Aluno;
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
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        if ($tipo_usuario == 2){
            $id_usuario = $user_logado->id;
            $id_user = Escola::where('user_id', '=', $id_usuario)->first();
            $id_escola = $id_user->id;

            $registros = Professor::where('escola_id', $id_escola)->get();
            $nomes = array();

        } else {
            return response('Unauthorized.', 401);
        }
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
        return redirect()->route('turmas')->with('success', 'Turma adicionada com sucesso');
    }

    public function editar($id)
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        if ($tipo_usuario == 2){
            $id_usuario = $user_logado->id;
            $id_user = Escola::where('user_id', '=', $id_usuario)->first();
            $id_escola = $id_user->id;
            $turmas = Turma::find($id);
            $registros = Professor::where('escola_id', $id_escola)->get();
            $nomes = array();
            $a = Turma::find($id)->professores->all();

            foreach($a as $item) {
                $nomes[] = $item->id;

            }
        } else {
            return response('Unauthorized.', 401);
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

    public function alunos($id)
    {
//        $dados = new Turma();
//        $dados = $dados->alunos()->get();
//        echo $id;
        $dados = Aluno::with('responsaveis')->where('turma_id', $id)->get();
//        foreach ($dados as $teste) {
//            foreach ($teste->responsaveiss as $resp){
//                echo $resp->nome;
//            }
//        }
//        dd($dados);
        return view('turma.alunos', compact('dados'));
    }
}
