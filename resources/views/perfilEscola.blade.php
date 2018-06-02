@extends('layout.site')

@section('titulo', 'Perfil')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Escolas</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('escolas') }}"> Escolas</a></li>
                <li class="active">Perfil</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title">Perfil</h2>
                            <a href="{{ route('escola.editar', $id) }}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-edit"></i> Editar</a>
                        </div>

                        <div class="box-body">
                            <div id="accordion" class="box-group">
                                <div class="panel box box-primary">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a href="#collapseOne" class="collapsed" data-toggle="collapse" data-parent="#accordion">Dados gerais</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel panel-collapse collapse">
                                        <div class="box-body">
                                            <table class="table">
                                                <tr><td width="200px">Unidade</td><td>{{ $registro->nome }}</td></tr>
                                                <tr><td>Diretor</td><td>{{ $registro->diretor }}</td></tr>
                                                <tr><td>Telefone</td><td>{{ $registro->telefone }}</td></tr>
                                                <tr><td>Email</td><td>{{ $registro->email }}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-primary">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-parent="#accordion">Endereço</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel panel-collapse collapse">
                                        <div class="box-body">
                                            <table class="table">
                                                <tr><td width="200px">Rua</td><td>{{ $registro->endereco }}</td></tr>
                                                <tr><td>Número</td><td>{{ $registro->numero }}</td></tr>
                                                <tr><td>Estado</td><td>{{ $registro->estado }}</td></tr>
                                                <tr><td>Cidade</td><td>{{ $registro->cidade }}</td></tr>
                                                <tr><td>Bairro</td><td>{{ $registro->bairro }}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-primary">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-parent="#accordion">Login</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel panel-collapse collapse">
                                        <div class="box-body">
                                            <table class="table">
                                                <tr><td width="200px">Login</td><td>{{ $registro->login }}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection