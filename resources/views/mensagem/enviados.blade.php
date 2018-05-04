@extends('layout.site')

@section('titulo', 'Listar Mensagens')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Mensagens
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Mensagens</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border"><h3 class="box-title">Caixa de Entrada</h3></div>
                        <div class="box-body table-responsive"  style="max-height: 700px; overflow-y: auto">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                @forelse($mensagensDestinatarios as $mensagem)
                                    <tr>
                                        <td style="width: 300px">
                                            Para:
                                            @if ($mensagem->destinatario_escola != NULL)
                                                {{ $mensagem->destinatario_escola->nome }}
                                            @elseif($mensagem->destinatario_resp != NULL)
                                                {{ $mensagem->destinatario_resp->nome }}
                                            @elseif($mensagem->destinatario_prof != null)
                                                {{ $mensagem->destinatario_prof->nome }}
                                            @elseif($mensagem->destinatario_turma != null)
                                                Turma {{ $mensagem->destinatario_turma->ano }}
                                            @endif
                                        </td>
                                        <td>{{ $mensagem->mensagens->titulo }}</td>
                                        <td style="width: 135px"> {{ date('d/m/Y H:i:s', strtotime($mensagem->mensagens->created_at)) }}</td>
                                        </td>
                                        <td style="text-align: center; width: 60px">
                                            <a title="Visualizar" class="btn btn-primary btn-sm"  href="{{ route('mensagem.view',$mensagem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Não há mensagens.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row" align="center">
                            {{ $mensagensDestinatarios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection