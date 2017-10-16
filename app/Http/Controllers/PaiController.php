<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;
use App\Pai;
use DateTime;


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

        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['data_nascimento'] = $novaData->format('Y-m-d');

        Pai::create($dados);

        return redirect()->route('pais');
    }

    public function editar($id)
    {
        $registro = Pai::find($id);
        $registro['data_nascimento'] = date( 'd/m/Y' , strtotime($registro->data_nascimento ) );
        $telefone = Pai::find($id)->telefones;
        return view('pai.editar', compact('registro', 'telefone'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $telefone['telefone'] = $dados['telefone'];
        $telefone2 = Telefone::create($telefone);
        $dados['telefone_id'] = $telefone2->id;
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['data_nascimento']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['data_nascimento'] = $novaData->format('Y-m-d');
        Pai::find($id)->update($dados);
        return redirect()->route('pais');
    }

    public function deletar($id)
    {
        Pai::find($id)->delete();
        return redirect('pais');
    }
}
