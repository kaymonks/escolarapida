@extends('layout.site')

@section('titulo', 'Adicionar Aluno')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Alunos</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('alunos') }}"> Alunos</a></li>
                <li class="active">Adicionar</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Adicionar Aluno</h2>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('aluno.salvar') }}">
                    <div class="box-body">
                        {{ csrf_field() }}
                        @include('aluno._form')
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o "></i> Salvar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
