<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Telefone;
use DateTime;

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
//        dd($dados);
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data']);
        $dados['data'] = $novaData->format('Y-m-d');
        Professor::create($dados);

        return redirect()->route('professores');
    }

    public function editar($id)
    {
        $registro = Professor::find($id);
        $telefone = Professor::find($id)->telefones;
        $registro['telefone'] = $telefone->telefone;
        $registro['data'] = date( 'd/m/Y' , strtotime($registro->data ) );
        return view('professor.editar', compact('registro', 'telefone'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['data'] = $novaData->format('Y-m-d');
        Professor::find($id)->update($dados);
        return redirect()->route('professores');
    }

    public function deletar($id)
    {
        Professor::find($id)->delete();
        return redirect('professores');
    }
}
