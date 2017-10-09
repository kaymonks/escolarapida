@extends('layout.site')

@section('titulo', 'Enviar mensagem')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Pais</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('mensagens') }}"> Mensagens</a></li>
                <li><a href="{{ route('pais') }}"> Pais</a></li>
                <li class="active">Enviar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Escrever nova mensagem</h3>
                        </div>
                        <!-- /.box-header -->

                        <form action="{{ route('mensagem.pai.enviar') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('mensagem.pai._form')
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box-primary -->
                </div>
            </div>
        </section>
    </div>
@endsection