<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\AlunoResponsavel;
use App\Escola;
use App\Http\Requests\MensagemRequest;
use App\Mensagem;
use App\MensagemDestinatario;
use App\Professor;
use App\Responsavel;
use App\Turma;
use App\TurmaProfessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;

        switch ($tipo_usuario){
            case 4: //Responsável
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::with('remetente_escola:id,nome', 'remetente_resp:id,nome', 'remetente:id,nome')->whereIn('id', $mensagens_id)->orderBy('id', 'desc')->paginate(10);
                break;
            case 2: //Escola
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_escola_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::with('remetente_resp:id,nome')->whereIn('id', $mensagens_id)->paginate(10);
                break;
            case 3: //Professor
                $id_user = Professor::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_professor_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->paginate(10);
                break;
        }

        return view('mensagem.index', compact('mensagens'));
    }

    public function view($id)
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $mensagens = Mensagem::where('id', $id)->get();
        switch ($tipo_usuario){
            case 4:// Responsavel
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;

                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_escola_id != NULL){
                        $remetente =  Escola::where('id', $mensagem->remetente_escola_id)->pluck('nome')->toArray();
                    }elseif ($mensagem->remetente_professor_id != NULL){
                        $remetente =  Professor::where('id', $mensagem->remetente_professor_id)->pluck('nome')->toArray();
                    }
                }
                break;
            case 2: //Escola
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_responsavel_id != NULL){
                        $remetente = Responsavel::where('id', $mensagem->remetente_responsavel_id)->pluck('nome')->toArray();
                    }
                }
                break;
            case 3:
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_responsavel_id != NULL){
                        $remetente = Responsavel::where('id', $mensagem->remetente_responsavel_id)->pluck('nome')->toArray();
                    }
                }
        }

        $mensagem = Mensagem::find($id);
        $destinatarios = MensagemDestinatario::where('mensagem_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel, escola ou professor.
        $nomeTurmas = array();
        $nomePais = array();
        $escola = "";
        $professor = "";
        foreach($destinatarios as $destinatario) {
            if($destinatario->turma_id != NULL){
                $turmas = Turma::find($destinatario->turma_id);
                $nomeTurmas[] = $turmas->ano;
            }
            if($destinatario->destinatario_escola_id != NULL){
                $escola = Escola::where('id', $destinatario->destinatario_escola_id)->get()->toArray();
            }
            if($destinatario->destinatario_id != NULL){
                $pais = Responsavel::find($destinatario->destinatario_id);
                $nomePais[] = $pais->nome;
            }
            if ($destinatario->destinatario_professor_id != NULL) {
                $professor = Professor::where('id', $destinatario->destinatario_professor_id)->get()->toArray();
            }
        }

        return view('mensagem.editar', compact('mensagem', 'destinatarios', 'remetente', 'nomeTurmas', 'nomePais', 'escola', 'professor'));
    }

    public function atualizar(MensagemRequest $request, $id)
    {
        $dados = $request->all();
        Mensagem::find($id)->update($dados);
        return redirect()->route('mensagens');
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
        }

        $escolas = Escola::find($id_escola);
        return view('mensagem.escola.enviar', compact('escolas'));
    }

    public function salvarMensagemEscola(MensagemRequest $request)
    {
        //ESCOLA RECEBE MENSAGEM
        $dados = $request->all();
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $dados['remetente_escola_id'] = null;
        $dados['remetente_professor_id'] = null;
        $dados['destinatario_id'] = null;
        foreach ($request->destinatario as $item) {
            $dados['escola_id']  = $item;
        }

        switch ($tipo_usuario) {
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $dados['remetente_responsavel_id'] = $id_user->id;
                break;
            case 2:

                break;
        }
        $mensagem = Mensagem::create($dados);
        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['destinatario_escola_id']  = $dados['escola_id'];
        $destinatario['tipo_destinatario']  = $tipo_usuario;

        MensagemDestinatario::create($destinatario);

        return redirect()->route('mensagem.escola');
    }

    public function responsavel()
    {
        $tipo_usuario = Auth::user()->permission_id;
        $user_logado = Auth::user()->id;
        switch ($tipo_usuario) {
            case 3://professor
                $professor = Professor::where('user_id', $user_logado)->first();
                $turmas_id = TurmaProfessor::where('professor_id', $professor->id)->pluck('turma_id')->toArray();
                $alunos = Aluno::select('id')->whereIn('turma_id', $turmas_id)->pluck('id')->toArray();
                $responsaveis_id = AlunoResponsavel::select('responsavel_id')->whereIn('aluno_id', $alunos)->pluck('responsavel_id')->toArray();
                $responsaveis = Responsavel::select('*')->whereIn('id', $responsaveis_id)->get();
                break;
            case 2://escola
                $escola = Escola::where('user_id', $user_logado)->first();
                $escola_id = $escola->id;
                $responsaveis = Responsavel::where('escola_id', $escola_id)->get();

                break;
        }

        return view('mensagem.responsavel.enviar', compact('responsaveis'));
    }

    public function salvarMensagemResponsavel(MensagemRequest $request)
    {
        //RESPONSAVEL RECEBE MENSAGEM
        $dados = $request->all();

        $user_logado = $request->user()->id;
        $tipo_usuario = Auth::user()->permission_id;
        $remetene_escola = null;
        $remetente_professor = null;
        switch ($tipo_usuario) {
            case 2:
                $remetene_escola = Escola::where('user_id', $user_logado)->first();
                $remetene_escola = $remetene_escola->id;
                $escola_id = $remetene_escola;
                break;
            case 3:
                $professor = Professor::where('user_id', $user_logado)->first();
                $remetente_professor = $professor->id;
                $escola_id = $professor->escola_id;
                break;
        }

        $dados['escola_id'] = $escola_id;
        $dados['remetente_escola_id'] = $remetene_escola;
        $dados['remetente_professor_id'] = $remetente_professor;
        $dados['remetente_responsavel_id'] = null;
        $dados['tipo_remetente'] = $tipo_usuario;

        $mensagem = Mensagem::create($dados);

        $mensagem_id = $mensagem->id;

        foreach ($request->destinatario as $item) {
            $destinatario['mensagem_id'] = $mensagem_id;
            $destinatario['destinatario_id']  = $item;
            $destinatario['tipo_destinatario'] = 4;
            MensagemDestinatario::create($destinatario);
        }

        return redirect()->route('mensagem.responsavel');
    }

    public function turma()
    {
        $usuario = Auth::user();

        if ($usuario->permission_id == 3) {
            $professor_id = Professor::where('user_id', '=', $usuario->id)->pluck('id');

            $turmas = Professor::find($professor_id)->turmas()->get();
        }

        return view('mensagem.turma.enviar', compact('turmas'));
    }

    public function salvarMensagemTurma(MensagemRequest $request)
    {
        $dados = $request->all();
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $dados['remetente_escola_id'] = null;
        $dados['remetente_professor_id'] = null;
        $dados['remetente_responsavel_id'] = null;

        switch ($tipo_usuario) {
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $escola_id = $id_user->escola_id;
                $dados['remetente_responsavel_id'] = $id_user->id;
                break;
            case 3:
                $professor = Professor::where('user_id', $id_usuario)->first();
                $dados['remetente_professor_id']= $professor->id;
                $escola_id = $professor->escola_id;
                break;
        }

        $dados['escola_id'] = $escola_id;
        $mensagem = Mensagem::create($dados);
        $mensagem_id = $mensagem->id;

        foreach ($request->destinatario as $item) {
            $destinatario['mensagem_id'] = $mensagem_id;
            $destinatario['destinatario_turma_id']  = $item;
            $destinatario['tipo_destinatario'] = null;
            MensagemDestinatario::create($destinatario);
        }

        return redirect()->route('mensagem.turma');
    }

    public function professor()
    {

        $professores = Professor::orderBy('nome', 'asc')->get();
        return view('mensagem.professor.enviar', compact('professores'));
    }

    public function salvarMensagemProfessor(MensagemRequest $request)
    {
        //PROFESSOR RECEBE MENSAGEM
        $dados = $request->all();
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $dados['remetente_escola_id'] = null;
        $dados['remetente_professor_id'] = null;
        $dados['destinatario_id'] = null;

        switch ($tipo_usuario) {
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $escola_id = $id_user->escola_id;
                $dados['remetente_responsavel_id'] = $id_user->id;
                break;
        }

        $dados['escola_id'] = $escola_id;
        $mensagem = Mensagem::create($dados);
        $destinatario['destinatario_turma_id'] = null;
        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['destinatario_professor_id']  = $request->destinatario;
        $destinatario['tipo_destinatario']  = $tipo_usuario;
        MensagemDestinatario::create($destinatario);
        return redirect()->route('mensagens');
    }
}
