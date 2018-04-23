@extends('layout.site')

@section('titulo', 'Editar Responsável')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Responsável</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('responsaveis') }}"> Pais</a></li>
                <li class="active">Editar</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Editar Responsável</h2>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('responsavel.atualizar', $registro->id) }}" enctype="multipart/form-data">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        @include('responsavel._form')
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o "></i> Atualizar</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
