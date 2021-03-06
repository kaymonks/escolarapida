@extends('layout.site')

@section('titulo', 'Editar Turma')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Turmas</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('turmas') }}"> Turmas</a></li>
                <li class="active">Editar</li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Turma</h3>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('turma.atualizar', $turmas->id) }}" enctype="multipart/form-data">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('turma._form')
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o "></i> Atualizar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
