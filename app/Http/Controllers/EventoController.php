<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Evento;
use App\EventoPara;
use App\Http\Requests\EscolaRequest;
use App\Http\Requests\EventoRequest;
use App\Pai;
use App\Turma;
use Illuminate\Http\Request;
use DateTime;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('id', 'desc')->paginate(5);
        return view('evento.index', compact('eventos'));
    }

    public function editar($id)
    {
        $eventos = Evento::find($id);
        $eventos['date'] = date( 'd/m/Y' , strtotime($eventos->date ) );
        $destinatarios = EventoPara::where('evento_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel ou escola.
        $nomeTurmas = array();
        $nomePais = array();
        $nomeEscola = array();
        foreach($destinatarios as $destinatario) {
            if($destinatario->turma_id != NULL){
                $turmas = Turma::find($destinatario->turma_id);
                $nomeTurmas[] = $turmas->ano;
            }
            if($destinatario->pai_id != NULL){
                $pais = Pai::find($destinatario->pai_id);
                $nomePais[] = $pais->nome;
            }
            if($destinatario->escola_id != NULL){
                $escola = Escola::find($destinatario->escola_id);
                $nomeEscola[] = $escola->nome;
            }
        }
        return view('evento.editar', compact('eventos', 'destinatarios', 'nomeTurmas', 'nomePais', 'nomeEscola'));
    }

    public function atualizar(EventoRequest $request, $id)
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

    public function deletar($id)
    {
        Evento::find($id)->delete();
        return redirect('eventos');
    }

    public function escola()
    {
        $escolas = Escola::all(); //alterar para find($id) da escola

        return view('evento.escola.enviar', compact('escolas'));
    }

    public function salvarEventoEscola(EventoRequest $request)
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
        return view('evento.responsavel.enviar', compact('pais'));
    }

    public function salvarEventoPai(EventoRequest $request)
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

    public function salvarEventoTurma(EventoRequest $request)
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
