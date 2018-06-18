@extends('layout.site')

@section('titulo', 'Criar Evento')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Turmas</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('eventos') }}"> Eventos</a></li>
                <li><a href="{{ route('turmas') }}"> Turmas</a></li>
                <li class="active">Enviar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Criar evento</h3>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal" action="{{ route('evento.turma.enviar') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('evento.turma._form')
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Enviar</button>
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