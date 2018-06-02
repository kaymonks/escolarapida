@extends('layout.site')

@section('titulo', 'Criar evento')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Escola</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('eventos') }}"> Evento</a></li>
                <li><a href="{{ route('escolas') }}"> Escolas</a></li>
                <li class="active">Criar</li>
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
                        <form class="form-horizontal" method="post" action="{{ route('evento.escola.enviar') }}">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('evento.escola._form')
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary  pull-right"><i class="fa fa-paper-plane"></i> Salvar</button>
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