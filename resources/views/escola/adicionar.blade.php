@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Escolas</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('escolas') }}"> Escolas</a></li>
                <li class="active">Adicionar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar Escola</h3>
                        </div>
                        <form method="post" action="{{ route('escola.salvar') }}">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('escola._form')
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
