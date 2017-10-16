<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;
use App\Escola;

class escolaController extends Controller
{

    public function index()
    {
        $registros = Escola::all();
        return view('escola.index', compact('registros'))->with(['page' => 'escola']);
    }

    public function adicionar()
    {
        return view('escola.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        Escola::create($dados);

        return redirect()->route('escolas');
    }

    public function editar($id)
    {
        $registro = Escola::find($id);
        $telefone = Escola::find($id)->telefones;
        $registro['telefone'] = $telefone->telefone;
//        dd($telefone);
        return view('escola.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        Escola::find($id)->update($dados);

        return redirect()->route('escolas');
    }

    public function deletar($id)
    {
        Escola::find($id)->delete();
        return redirect('escolas');
    }
}
