@extends('layout.site')

@section('titulo', 'Adicionar Pai')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Pais</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('pais') }}"> Pais</a></li>
                <li class="active">Adicionar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar Pai</h3>
                        </div>
                        <form method="post" action="{{ route('pai.salvar') }}">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('pai._form')
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
