@extends('layout.site')

@section('titulo', 'Adicionar Responsável')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Responsáveis</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('responsaveis') }}"> Responsáveis</a></li>
                <li class="active">Adicionar</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Responsável</h3>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('responsavel.salvar') }}">
                    <div class="box-body">
                        {{ csrf_field() }}
                        @include('responsavel._form')
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o "></i> Salvar</button>
                    </div>
                </form>
            </div>

        </section>
    </div>

@endsection
