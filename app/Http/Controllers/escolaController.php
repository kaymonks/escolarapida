<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escola;

class escolaController extends Controller
{

    public function index()
    {
        $registros = Escola::all();
        return view('escola.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('escola.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        Escola::create($dados);

        return redirect()->route('escolas');
    }

    public function editar($id)
    {
        $registro = Escola::find($id);
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
