<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pai;

class PaiController extends Controller
{
    public function index()
    {
        $registros = Pai::all();
        return view('pai.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('pai.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();
        Pai::create($dados);

        return redirect()->route('pais');
    }

    public function editar($id)
    {
        $registro = Pai::find($id);
        return view('pai.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        Pai::find($id)->update($dados);
        return redirect()->route('pais');
    }

    public function deletar($id)
    {
        Pai::find($id)->delete();
        return redirect('pais');
    }
}
