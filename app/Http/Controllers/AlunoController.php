<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;
use App\Aluno;
use App\Pai;
use App\Turma;
use DateTime;

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
        $registro = Aluno::all();
        $paiNome = array('id'=>1);
        $turmaNome = array('id'=>1);
        $telefone = array('telefone'=>'3r32r3');
        return view('aluno.adicionar', compact('pais', 'turmas'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        $telefone['telefone'] = $dados['telefone'];
        $get_tel_id = Telefone::create($telefone);
        $dados['telefone_id'] = $get_tel_id->id;
        Aluno::create($dados);

        return redirect()->route('alunos');
    }

    public function editar($id)
    {
        $registro = Aluno::find($id);
        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
        $turmas = Turma::all();
        $pais = Pai::all();
        $turmaNome = Aluno::find($id)->turmas;
        $paiNome = Aluno::find($id)->pais;
        $telefone = Aluno::find($id)->telefones;

        return view('aluno.editar', compact('registro', 'turmas', 'pais', 'turmaNome', 'paiNome', 'telefone'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        Aluno::find($id)->update($dados);
        return redirect()->route('alunos');
    }

    public function deletar($id)
    {
        Aluno::find($id)->delete();
        return redirect('alunos');
    }
}
