@extends('layout.site')

@section('titulo', 'Criar Evento')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Pais</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('eventos') }}"> Eventos</a></li>
                <li><a href="{{ route('pais') }}"> Pais</a></li>
                <li class="active">Criar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Criar Evento</h3>
                        </div>
                        <!-- /.box-header -->
                        <form action="{{ route('responsavel') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('evento.pai._form')
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="pull-right">
                                    <a href="{{ route('eventos') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Salvar</button>
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