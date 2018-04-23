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
use PhpParser\Node\Expr\Array_;
use function Symfony\Component\VarDumper\Dumper\esc;

class MensagemController extends Controller
{
    public function index()
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;

        switch ($tipo_usuario){
            case 4: //Responsável
                $alunos = Responsavel::with('alunoss')->where('user_id', '=', $id_usuario)->get();
                foreach ($alunos as $aluno) {
                    $id_user = $aluno->id;
                    $escola_id_responsavel = $aluno->escola_id;
                    if ($aluno->alunoss->count() > 0){
                        foreach ($aluno->alunoss as $nome) {
                            $turma_id[] = $nome->turma_id;
                        }
                    }
                    else{
                        $turma_id = array();
                    }
                }

                $mensagens_id = MensagemDestinatario::where('destinatario_id', '=', $id_user)->orWhere('destinatario_escola_id', $escola_id_responsavel)->orWhereIn('destinatario_turma_id', $turma_id)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::with('remetente_escola:id,nome', 'remetente_resp:id,nome', 'remetente:id,nome')->whereIn('id', $mensagens_id)->orderBy('id', 'desc')->paginate(10);
                break;
            case 2: //Escola
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_escola_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::with('remetente_resp:id,nome')->whereIn('id', $mensagens_id)->orderBy('id', 'desc')->paginate(10);
                //TODO Não exibir na caixa de entrada as mensagens que a escola envia à escola
                break;
            case 3: //Professor
                $id_user = Professor::where('user_id', '=', $id_usuario)->first();
                $id_user = $id_user->id;
                $mensagens_id = MensagemDestinatario::where('destinatario_professor_id', '=', $id_user)->pluck('mensagem_id')->toArray();
                $mensagens = Mensagem::select('*')->whereIn('id', $mensagens_id)->orderBy('id', 'desc')->paginate(10);
                break;
        }

        return view('mensagem.index', compact('mensagens'));
    }

    public function view($id)
    {
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $mensagens = Mensagem::where('id', $id)->get();
        switch ($tipo_usuario){
            case 4:// Responsavel
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_escola_id != NULL){
                        $remetente =  Escola::select('id', 'nome')->where('id', $mensagem->remetente_escola_id)->get()->toArray();
                    }elseif ($mensagem->remetente_professor_id != NULL){
                        $remetente =  Professor::select('id', 'nome')->where('id', $mensagem->remetente_professor_id)->get()->toArray();
                    }
                }
                break;
            case 2: //Escola
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_responsavel_id != NULL){
                        $remetente = Responsavel::select('id', 'nome')->where('id', $mensagem->remetente_responsavel_id)->get()->toArray();
//                        dd($remetente);
                    }
                    if ($mensagem->remetente_escola_id != NULL){
                        $remetente =  Escola::select('id', 'nome')->where('id', $mensagem->remetente_escola_id)->get()->toArray();
                    }
                }
                break;
            case 3:
                foreach ($mensagens as $mensagem) {
                    if ($mensagem->remetente_responsavel_id != NULL){
                        $remetente = Responsavel::select('id', 'nome')->where('id', $mensagem->remetente_responsavel_id)->get()->toArray();
                    }
                }
                break;
        }
//        dd($remetente);
        $mensagem = Mensagem::find($id);
        $tem_resposta = Mensagem::select('id', 'mensagem_id')->where('id', $id)->get()->toArray();
        $mensagem_id = $tem_resposta[0]["mensagem_id"];

        if ($mensagem_id != NULL) {
            $i = 0;
            while ($mensagem_id != NULL) {
                $arrayMensagens[] = Mensagem::where('id', $mensagem_id)->get();
                $mensagem_id = $arrayMensagens[$i][0]->mensagem_id;
                $i++;
            }
            $arrayMensagens = array_reverse($arrayMensagens);
            foreach ($arrayMensagens as $arrayMensagen) {
                foreach ($arrayMensagen as $item) {
                    if ($item->remetente_escola_id != NULL){
                        $item->remetente_escola_id =  Escola::where('id', $item->remetente_escola_id)->pluck('nome')->toArray();
                    }elseif($item->remetente_responsavel_id != NULL){
                        $item->remetente_responsavel_id = Responsavel::where('id', $item->remetente_responsavel_id)->pluck('nome')->toArray();
                    }elseif ($item->remetente_professor_id != NULL){
                        $remetenteHistorico[] =  Professor::select('id', 'nome')->where('id', $item->remetente_professor_id)->get()->toArray();
                    }
                }
            }
        }else {
            $arrayMensagens = null;
        }

        $nomeTurmas = array();
        $nomePais = array();
        $escola = "";
        $professor = "";
        $destinatarios = MensagemDestinatario::where('mensagem_id', '=', $id)->get(); //obtem quem foi o destinatario: turma, responsavel, escola ou professor.
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

        return view('mensagem.visualizar', compact('mensagem', 'destinatarios', 'remetente', 'nomeTurmas', 'nomePais', 'escola', 'professor', 'tipo_usuario', 'arrayMensagens', 'remetenteHistorico'));
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
            case 2: //Escola
                $id_user = Escola::where('user_id', '=', $id_usuario)->first();
                $id_escola = $id_user->id;
                break;
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
        // Escola recebe mensagem de pais
        $dados = $request->all();
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;

        $dados['remetente_escola_id'] = null;
        $dados['remetente_professor_id'] = null;
        $dados['remetente_responsavel_id'] = null;
        $dados['destinatario_id'] = null;
        $dados['remetente_professor_id'] = null;

        switch ($tipo_usuario) {
            case 2:
                $remetente = Escola::where('user_id', '=', $id_usuario)->first();
                $escola_id = $remetente->id;
                break;
            case 4:
                $remetente = Responsavel::where('user_id', '=', $id_usuario)->first();
                $dados['remetente_responsavel_id'] = $remetente->id;
                $escola_id = $remetente->escola_id;
                $destinatario['destinatario_escola_id']  = $escola_id;
                break;
        }

        $mensagem_id = null;
        if (isset($dados['mensagem_id'])) {
            $mensagem_id = $dados['mensagem_id'];
            $dados['remetente_escola_id'] = $escola_id;
            $destinatario['destinatario_id'] = $request->destinatario[0];
        }
        $dados['mensagem_id'] = $mensagem_id;

        $mensagem = Mensagem::create($dados);
        $destinatario['mensagem_id'] = $mensagem->id;
        $destinatario['destinatario_escola_id']  = $escola_id;
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
        $dados = $request->all();
//        $user_logado = $request->user()->id;
        $user_logado = Auth::user()->id;
        $tipo_usuario = Auth::user()->permission_id;
        $id_usuario = $user_logado;
        $remetente_escola = null;
        $remetente_professor = null;
        $remetente_responsavel = null;
        switch ($tipo_usuario) {
            case 4:
                $remetente = Responsavel::where('user_id', '=', $id_usuario)->first();
                $remetente_responsavel = $remetente->id;
                $escola_id = $remetente->escola_id;
                $escola_nome = Escola::where('id', $escola_id)->pluck('nome');
                $escola_nome = $escola_nome[0];
                break;
            case 2:
                $remetente = Escola::where('user_id', $id_usuario)->first();
                $remetente_escola = $remetente->id;
                $escola_nome = $remetente->nome;
                $escola_id = $remetente_escola;
                break;
            case 3:
                $remetene = Professor::where('user_id', $id_usuario)->first();
                $remetente_professor = $remetene->id;
                $escola_id = $remetene->escola_id;
                $escola_nome = Escola::where('id', $escola_id)->pluck('nome');
                $escola_nome = $escola_nome[0];
                break;
        }

        $dados['escola_id'] = $escola_id;
        $dados['remetente_escola_id'] = $remetente_escola;
        $dados['remetente_professor_id'] = $remetente_professor;
        $dados['remetente_responsavel_id'] = $remetente_responsavel;
        $dados['tipo_remetente'] = $tipo_usuario;

        $responsaveis = Responsavel::select('email')->whereIn('id', $request->destinatario)->get()->toArray();
        $mensagem = Mensagem::create($dados);
        if ($mensagem) {
            foreach ($responsaveis as $responsavel) {
                $email = $responsavel['email'];
                require (base_path() . '\app\SendGrid\sendgrid.php');
            }
        }
        $mensagem_id = $mensagem->id;
        $destinatario['destinatario_escola_id']  = $escola_id;
        $destinatario['destinatario_id']  = null;

        switch ($tipo_usuario) {
            case 4:
                foreach ($request->destinatario as $item) {
                    $destinatario['destinatario_escola_id']  = $item;
                    $destinatario['tipo_destinatario'] = 4;

                }
            break;
        }

        $destinatario['mensagem_id'] = $mensagem_id;
        MensagemDestinatario::create($destinatario);
        return redirect()->route('mensagens');
    }

    public function turma()
    {
        $usuario = Auth::user();
//        echo $usuario->id;
        if($usuario->permission_id == 2) {
            $escola_id = Escola::where('user_id', '=', $usuario->id)->pluck('id');
//            echo "<pre>";
//            print_r($escola_id);
            $turmas = Escola::find($escola_id)->turmas()->get();
//            print_r($turmas);
        }
        if ($usuario->permission_id == 3) {
            $professor_id = Professor::where('user_id', '=', $usuario->id)->pluck('id');
//            echo "<pre>";
//            print_r($professor_id);
            $turmas = Professor::find($professor_id)->turmas()->get();
        }

//        return;
        return view('mensagem.turma.enviar', compact('turmas'));
    }

    public function salvarMensagemTurma(MensagemRequest $request)
    {
        $dados = $request->all();
        echo "<pre>";
        print_r($dados);
        $user_logado = Auth::user();
        $tipo_usuario = $user_logado->permission_id;
        $id_usuario = $user_logado->id;
        $dados['remetente_escola_id'] = null;
        $dados['remetente_professor_id'] = null;
        $dados['remetente_responsavel_id'] = null;

        switch ($tipo_usuario) {
            case 2:
                $escola = Escola::where('user_id', '=', $id_usuario)->first();
                $escola_id = $escola->id;
                $dados['remetente_escola_id'] = $escola_id;
                break;
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
