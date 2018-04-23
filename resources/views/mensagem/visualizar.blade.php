@extends('layout.site')

@section('titulo', 'Visualizar Mensagem')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Mensagens</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('mensagens') }}"> Mensagens</a></li>
                <li class="active">Editar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if(isset($arrayMensagens))
                        @foreach($arrayMensagens as $mensagen)
                            @foreach($mensagen as $ms)
                                <div id="accordion">
                                    <div class="box box-primary">
                                        <div class="mailbox-read-info">
                                            {{--data-toggle="collapse" data-target="#demo"--}}
                                            <h3>
                                                {{ $ms->titulo }}
                                                <div class="pull-right">
                                                <span class="mailbox-read-time" style="line-height: 2.5">
                                                    {{ $ms->data = date('d/m/Y H:i:s', strtotime($ms->data)) }}
                                                </span>
                                                </div>
                                            </h3>

                                            <h5>De: @if(!is_null($ms->remetente_responsavel_id[0]))
                                                        {{ $ms->remetente_responsavel_id[0] }}
                                                        @elseif(!is_null($ms->remetente_escola_id[0]))
                                                            {{ $ms->remetente_escola_id[0] }}
                                                        @else
                                                            {{ $ms->remetente_professor_id[0] }}
                                                    @endif
                                            </h5>
                                        </div>
                                        <div class="box-body" style="display: none;">
                                            {{ $ms->corpo }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                    <div class="box box-primary">
                        <div class="mailbox-read-info">
                            <h3>{{  isset($mensagem->titulo) ? $mensagem->titulo : '' }}
                                <div class="pull-right">
                                    <span class="mailbox-read-time" style="line-height: 2.5">
                                        {{ $mensagem->data = date('d/m/Y H:i:s', strtotime($mensagem->data)) }}
                                        <button title="Responder" id="exibirResposta" class="btn btn-primary"><i class="fa fa-mail-reply"></i></button>
                                    </span>
                                </div>
                            </h3>
                            <h5>De:
                                @if(isset($remetente))
                                    @foreach($remetente as $rt)
                                        {{ $rt['nome']  }}
                                    @endforeach
                                @endif
                            </h5>
                        </div>

                        <div class="box-body no-padding">
                            @include('mensagem._form')
                        </div>
                    </div>

                    <div class="box" id="nova_mensagem">
                        <form action="@if($tipo_usuario == 4 or $tipo_usuario == 3){{ route('mensagem.responsavel.enviar') }} @else {{ route('mensagem.escola.enviar') }} @endif" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <input type="hidden" name="mensagem_id" value="{{ $mensagem->id }}">
                                <div class="form-group">
                                    @if(isset($remetente))
                                        @foreach($remetente as $rt)
                                            <p>Para: {{ $rt['nome'] }}</p>
                                            <input type="hidden" name="destinatario[]" value="{{$rt['id']}}">
                                        @endforeach
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="">Titulo</label>
                                    <input type="text" name="titulo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea name="corpo" id="mensagem" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <a class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
