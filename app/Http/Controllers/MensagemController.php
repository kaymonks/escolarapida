<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Mensagem;
use App\MensagemPara;
use App\Pai;
use App\Turma;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        return view('mensagem.escola.adicionar');
    }

    public function escola()
    {
        $escolas = Escola::all(); //alterar para where($id) da escola com ->first()
        return view('mensagem.escola.enviar', compact('escolas'));
    }

    public function salvarMensagemEscola(Request $request)
    {
        $dados = $request->all();

        $mensagem = Mensagem::create($dados);

        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['escola_id']  = $request->destinatario;
        MensagemPara::create($destinatario);

        return redirect()->route('mensagem.escola');
    }

    public function pai()
    {
        $pais = Pai::orderBy('nome', 'asc')->get();
        return view('mensagem.pai.enviar', compact('pais'));
    }

    public function salvarMensagemPai(Request $request)
    {
        $dados = $request->all();

        $mensagem = Mensagem::create($dados);

        $mensagem_id = $mensagem->id;

        foreach ($request->destinatario as $item) {
            $destinatario['mensagem_id'] = $mensagem_id;
            $destinatario['pai_id']  = $item;
            MensagemPara::create($destinatario);
        }

        return redirect()->route('mensagem.pai');
    }

    public function turma()
    {
        $turmas = Turma::orderBy('ano', 'asc')->get();
        return view('mensagem.turma.enviar', compact('turmas'));
    }

    public function salvarMensagemTurma(Request $request)
    {
        $dados = $request->all();
        $turma = Mensagem::create($dados);
        $turma_id = $turma->id;

        foreach ($request->destinatario as $item) {
            $destinatario['mensagem_id'] = $turma_id;
            $destinatario['turma_id']  = $item;
            MensagemPara::create($destinatario);
        }

        return redirect()->route('mensagem.turma');
    }
}
