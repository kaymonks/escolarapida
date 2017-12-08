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
//        echo $id_usuario;
//        echo $tipo_usuario;
        switch ($tipo_usuario){
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->paginate(10);
                break;
            case 2:
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_escola_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->paginate(10);
                break;
            case 3:
                $id_user = Professor::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_professor_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->paginate(10);
                break;
        }

//        $mensagens = Mensagem::orderBy('id', 'desc')->paginate(5);
        return view('mensagem.index', compact('mensagens'));
    }

    public function view($id)
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
//        echo $id_usuario;
//        echo $tipo_usuario;
//        $remetente = array();
        switch ($tipo_usuario){
            case 4:// Responsavel
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
//                $id_user_escola = $id_user->escola_id;
                $mensagens_id = MensagemDestinatario::where('destinatario_id', '=', $id_user)->pluck('mensagem_id')->toArray();
//                print_r($mensagens_id);
                $mensagens = Mensagem::where('id', $id)->get();
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_escola_id != NULL){
                        $remetente =  Escola::where('id', $mensagem->remetente_escola_id)->pluck('nome')->toArray();
                    }elseif ($mensagem->remetente_professor_id != NULL){
                        $remetente =  Professor::where('id', $mensagem->remetente_professor_id)->pluck('nome')->toArray();
                    }
                }

                break;
            case 2: //Escola
                $mensagens = Mensagem::where('id', $id)->get();
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_responsavel_id != NULL){
                        $remetente = Responsavel::where('id', $mensagem->remetente_responsavel_id)->pluck('nome')->toArray();
                    }
                }
                break;
        }
        $mensagem = Mensagem::find($id);
//        dd($mensagens);
        $destinatarios = MensagemDestinatario::where('mensagem_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel ou escola.
//        dd($destinatarios);
        $nomeTurmas = array();
        $nomePais = array();
        $escola = "";
        foreach($destinatarios as $destinatario) {
            if($destinatario->turma_id != NULL){
                $turmas = Turma::find($destinatario->turma_id);
                $nomeTurmas[] = $turmas->ano;
            }
            if($destinatario->destinatario_escola_id != NULL){
//                echo $destinatario->destinatario_escola_id; die('ola teste');
                $escola = Escola::where('id', $destinatario->destinatario_escola_id)->get()->toArray();
//                foreach ($escola as $item) {
//                   print_r($item['nome']);
//               }
//                dd($escola);
            }
            if($destinatario->destinatario_id != NULL){
                $pais = Responsavel::find($destinatario->destinatario_id);
                $nomePais[] = $pais->nome;
            }
        }

        return view('mensagem.editar', compact('mensagem', 'destinatarios', 'remetente', 'nomeTurmas', 'nomePais', 'escola'));
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

        switch ($tipo_usuario) {
            case 4:
                $id_user = Responsavel::where('user_id', '=', $id_usuario)->first();
                $dados['remetente_responsavel_id'] = $id_user->id;
                break;
            case 2:

                break;
        }
//        dd($dados);
        $mensagem = Mensagem::create($dados);
//        dd($dados);
        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['destinatario_escola_id']  = $request->escola_id;
        $destinatario['tipo_destinatario']  = $tipo_usuario;
        MensagemDestinatario::create($destinatario);

        return redirect()->route('mensagem.escola');
    }

    public function responsavel()
    {
//        $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->paginate(10);
        $tipo_usuario = Auth::user()->permission_id;
        $user_logado = Auth::user()->id;
        switch ($tipo_usuario) {
            case 3://professor
                $professor = Professor::where('user_id', $user_logado)->first();
                $turmas_id = TurmaProfessor::where('professor_id', $professor->id)->pluck('turma_id')->toArray();
                $alunos = Aluno::select('id')->whereIn('turma_id', $turmas_id)->pluck('id')->toArray();
                $responsaveis_id = AlunoResponsavel::select('responsavel_id')->whereIn('aluno_id', $alunos)->pluck('responsavel_id')->toArray();
                $responsaveis = Responsavel::select('*')->whereIn('id', $responsaveis_id)->get();
//                echo "<pre>";
//                print_r($responsaveis); die();
                break;
            case 2://escola
                $escola = Escola::where('user_id', $user_logado)->first();
                $escola_id = $escola->id;
//                print_r($escola_id); die();
                $responsaveis = Responsavel::where('escola_id', $escola_id)->get();
//                echo "<pre>";
//                print_r($responsaveis); die();
                break;
        }
//        echo $tipo_usuario. "  ".$user_logado;die();
//        $responsaveis = Responsavel::orderBy('nome', 'asc')->get();
//        echo "<pre>";
//        print_r($responsaveis);die();
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
//die('teste');
        $dados['escola_id'] = $escola_id;
        $dados['remetente_escola_id'] = $remetene_escola;
        $dados['remetente_professor_id'] = $remetente_professor;
        $dados['remetente_responsavel_id'] = null;
        $dados['tipo_remetente'] = $tipo_usuario;
//        dd($dados);
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
//            $turmas = Turma::orderBy('ano', 'asc')->get();
        return view('mensagem.turma.enviar', compact('turmas'));
    }

    public function salvarMensagemTurma(MensagemRequest $request)
    {
        $dados = $request->all();
//dd($dados);
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
//        foreach ($request->destinatario as $item) {
//            echo $item;
//
//        }
//        die('turma');
        return redirect()->route('mensagem.turma');
    }

    public function professor()
    {
        //if father obtains teacher, only to the ones linked to the class of the son
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
            //Professor pode receber mensagem de escola...?
        }
//        dd($dados);
        $dados['escola_id'] = $escola_id;
//        dd($request->destinatario);
        $mensagem = Mensagem::create($dados);
//        dd($dados);
        $destinatario['destinatario_turma_id'] = null;
        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['destinatario_professor_id']  = $request->destinatario;
        $destinatario['tipo_destinatario']  = $tipo_usuario;
        MensagemDestinatario::create($destinatario);

        return redirect()->route('mensagem.escola');
    }
}
