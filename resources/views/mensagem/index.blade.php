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
                        <div class="box-body table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    {{--<th style="width: 70px">#</th>--}}
                                    <th  style="width: 280px">Remetente</th>
                                    <th style=" ">Título</th>
                                    <th style="width: 110px">Data</th>
                                    <th style="width: 80px">Visualizar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($mensagens as $mensagem)
                                    <tr>
                                        {{--<td>{{$mensagem->id}}</td>--}}
{{--                                        <td>{{ $mensagem->remetente_resp->nome  }}--}}
                                        <td>
                                            @if ($mensagem->remetente_escola!=NULL)
                                                {{ $mensagem->remetente_escola->nome }}
                                            @elseif($mensagem->remetente_resp!=NULL)
                                                {{ $mensagem->remetente_resp->nome }}
                                            @else
                                                    {{ $mensagem->remetente->nome }}

                                            @endif
                                        </td>
                                        <td>{{ $mensagem->titulo }}</td>
                                        <td> {{ $mensagem->data = date('d/m/Y', strtotime($mensagem->data)) }}</td>
                                        </td>
                                        <td style="text-align: center">
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
                            {{ $mensagens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection