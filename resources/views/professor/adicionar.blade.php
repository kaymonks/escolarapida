@extends('layout.site')

@section('titulo', 'Adicionar Professor')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Professor</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('professores') }}"><i class="fa fa-dashboard"></i> Professores</a></li>
                <li class="active">Adicionar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar Professor</h3>
                        </div>
                        <form method="post" action="{{ route('professor.salvar') }}">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('professor._form')
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
