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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border"><h3 class="box-title">Caixa de Entrada</h3></div>
                        <div class="box-body table-responsive" style="max-height: 700px; overflow-y: auto">
                            <table class="table table-hover table-bordered" id="datatablesOrderByCad">
                                <thead>
                                    <tr class="hidden">
                                        <th style="width: 100px">#</th>
                                        <th>Remetente</th>
                                        <th>Assunto</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($mensagens as $mensagem)
                                    <tr>
                                        <td style="width: 300px">
                                            @if ($mensagem->remetente_escola!=NULL)
                                                {{ $mensagem->remetente_escola->nome }}
                                            @elseif($mensagem->remetente_resp!=NULL)
                                                {{ $mensagem->remetente_resp->nome }}

                                            @endif
                                        </td>
                                        <td>{{ $mensagem->titulo }}</td>
                                        <td style="width: 100px"> {{ $mensagem->data = date('d/m/Y', strtotime($mensagem->data)) }}</td>
                                        <td style="text-align: center; width: 60px">
                                            <a title="Visualizar" class="btn btn-primary btn-sm"  href="{{ route('mensagem.view',$mensagem->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection