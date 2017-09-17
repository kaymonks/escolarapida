@extends('layout.site')

@section('titulo', 'Listar Escola')

@section('conteudo')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"><h3 class="box-title">Listar Escola</h3></div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Escola</th>
                                    <th>Telefone</th>
                                    <th>Login</th>
                                    <th>Senha</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($registros as $registro)
                                    <tr>
                                        <td>{{$registro->id}}</td>
                                        <td>{{ $registro->nome }}</td>
                                        <td>{{$registro->telefone}}</td>
                                        <td>{{$registro->login}}</td>
                                        <td>{{$registro->senha}}</td>
                                        <td>
                                            <a href="{{ route('turma.editar',$registro->id) }}">Editar</a>
                                            <a href="{{ route('turma.deletar',$registro->id) }}">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <a href="{{ route('escola.adicionar') }}">Adicionar escola</a>

        </section>
    </div>
@endsection
