<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Evento;
use App\EventoPara;
use App\Pai;
use App\Turma;
use Illuminate\Http\Request;
use DateTime;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('evento.index', compact('eventos'));
    }

    public function editar($id)
    {
        $eventos = Evento::find($id);
        $eventos['date'] = date( 'd/m/Y' , strtotime($eventos->date ) );
        return view('evento.editar', compact('eventos'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);
        if ( false===$novaData )
        {
            die('formato de data inválido');
        }
        $dados['date'] = $novaData->format('Y-m-d');
        Evento::find($id)->update($dados);
        return redirect()->route('eventos');
    }

    public function escola()
    {
        $escolas = Escola::all(); //alterar para find($id) da escola

        return view('evento.escola.enviar', compact('escolas'));
    }

    public function salvarEventoEscola(Request $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);

        $dados['date'] = $novaData->format('Y-m-d');;
        $evento = Evento::create($dados);

        $destinatario['evento_id'] = $evento->id;
        $destinatario['escola_id']  = $request->destinatario;
        EventoPara::create($destinatario);

        return redirect()->route('eventos');
    }

    public function pai()
    {
        $pais = Pai::orderBy('nome', 'asc')->get();
        return view('evento.pai.enviar', compact('pais'));
    }

    public function salvarEventoPai(Request $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);
        if ( false===$novaData )
        {
          die('formato de data inválido');
        }

        $dados['date'] = $novaData->format('Y-m-d');
        $evento = Evento::create($dados);
        $evento_id = $evento->id;

        foreach ($request->destinatario as $item)
        {
            $destinatario['evento_id'] = $evento_id;
            $destinatario['pai_id']  = $item;
            EventoPara::create($destinatario);
        }

        return redirect()->route('eventos');
    }

    public function turma()
    {
        $turmas = Turma::orderBy('ano', 'asc')->get();
        return view('evento.turma.enviar', compact('turmas'));
    }

    public function salvarEventoTurma(Request $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);
        if ( false===$novaData )
        {
          die('formato de data inválido');
        }

        $dados['date'] = $novaData->format('Y-m-d');
        $turma = Evento::create($dados);

        $turma_id = $turma->id;

        foreach ($request->destinatario as $item) {
            $destinatario['evento_id'] = $turma_id;
            $destinatario['turma_id']  = $item;
            EventoPara::create($destinatario);
        }

        return redirect()->route('eventos');
    }
}
