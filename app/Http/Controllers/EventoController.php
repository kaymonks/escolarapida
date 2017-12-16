<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Evento;
use App\EventoDestinatario;
use App\Http\Requests\EscolaRequest;
use App\Http\Requests\EventoRequest;
use App\Responsavel;
use App\Turma;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{

    public function __construct()
    {

    }
    public function index()
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;

        switch ($tipo_usuario) {
            case 2:
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();

                $id_user_escola = $id_user->id;
//                $eventos_id = EventoDestinatario::where('escola_id', '=', $id_user)->pluck('evento_id')->toArray();
                $eventos = Evento::where('escola_id', $id_user_escola)->orderBy('id', 'desc')->get();
                break;
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_user_escola = $id_user->escola_id;
                $id_user = $id_user->id;
                $eventos_id = EventoDestinatario::where('responsavel_id', '=', $id_user)->orWhere('escola_id', $id_user_escola)->pluck('evento_id')->toArray();
                $eventos = Evento::select('*')->whereIn('id', $eventos_id)->orderBy('id', 'desc')->get();
                break;
        }

        return view('evento.index', compact('eventos', 'tipo_usuario'));
    }

    public function editar($id)
    {
        $eventos = Evento::find($id);
        $eventos['date'] = date( 'd/m/Y' , strtotime($eventos->date ) );
        $destinatarios = EventoDestinatario::where('evento_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel ou escola.
        $nomeTurmas = array();
        $nomePais = array();
        $nomeEscola = array();
        foreach($destinatarios as $destinatario) {
            if($destinatario->turma_id != NULL){
                $turmas = Turma::find($destinatario->turma_id);
                $nomeTurmas[] = $turmas->ano;
            }
            if($destinatario->responsavel_id != NULL){
                $pais = Responsavel::find($destinatario->responsavel_id);
                $nomePais[] = $pais->nome;
            }
            if($destinatario->escola_id != NULL){
                $escola = Escola::find($destinatario->escola_id);
                $nomeEscola[] = $escola->nome;
            }
        }
        return view('evento.editar', compact('eventos', 'destinatarios', 'nomeTurmas', 'nomePais', 'nomeEscola'));
    }

    public function visualizar($id)
    {
        $eventos = Evento::find($id);
        $eventos['date'] = date( 'd/m/Y' , strtotime($eventos->date ) );
        $destinatarios = EventoDestinatario::where('evento_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel ou escola.
        $nomeTurmas = array();
        $nomePais = array();
        $nomeEscola = array();
        foreach($destinatarios as $destinatario) {
            if($destinatario->turma_id != NULL){
                $turmas = Turma::find($destinatario->turma_id);
                $nomeTurmas[] = $turmas->ano;
            }
            if($destinatario->responsavel_id != NULL){
                $pais = Responsavel::find($destinatario->responsavel_id);
                $nomePais[] = $pais->nome;
            }
            if($destinatario->escola_id != NULL){
                $escola = Escola::find($destinatario->escola_id);
                $nomeEscola[] = $escola->nome;
            }
        }
        return view('evento.visualizar', compact('eventos', 'destinatarios', 'nomeTurmas', 'nomePais', 'nomeEscola'));
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
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        switch ($tipo_usuario) {
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_escola = $id_user->escola_id;
                break;
            case 2:
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();
                $id_escola = $id_user->id;
                break;
        }


        $escolas = Escola::find($id_escola);
        return view('evento.escola.enviar', compact('escolas'));
    }

    public function salvarEventoEscola(EventoRequest $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);
        foreach ($request->destinatario as $item) {
            $destinatario['escola_id']  = $item;
        }

        $dados['date'] = $novaData->format('Y-m-d');
        $dados['escola_id'] = $destinatario['escola_id'];
        print_r($dados);
        $evento = Evento::create($dados);

        $destinatario['evento_id'] = $evento->id;
        EventoDestinatario::create($destinatario);

        return redirect()->route('eventos');
    }

    public function responsavel()
    {
        $responsaveis = Responsavel::orderBy('nome', 'asc')->get();
        return view('evento.responsavel.enviar', compact('responsaveis'));
    }

    public function salvarEventoResponsavel(EventoRequest $request)
    {
        $dados = $request->all();
        $novaData = DateTime::createFromFormat('d/m/Y', $dados['date']);
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $id_user = Escola::where('user_id', '=', $id_usuario)->pluck('id')->first();

        $dados['date'] = $novaData->format('Y-m-d');
        $dados['escola_id'] = $id_user;

        $evento = Evento::create($dados);
        $evento_id = $evento->id;

        foreach ($request->destinatario as $item)
        {
            $destinatario['evento_id'] = $evento_id;
            $destinatario['responsavel_id']  = $item;
            EventoDestinatario::create($destinatario);
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
            EventoDestinatario::create($destinatario);
        }

        return redirect()->route('eventos');
    }
}
