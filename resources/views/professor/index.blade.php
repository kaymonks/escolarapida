@extends('layout.site')

@section('titulo', 'Listar Professor')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Professor
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Professores</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border"><h3 class="box-title">Listar Professores</h3></div>
                        <div class="box-body table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Professor</th>
                                    <th>Telefone</th>
                                    <th>Login</th>
                                    <th>Senha</th>
                                    <th style="width: 150px">Ação</th>
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
                                            <a class="btn btn-success btn-sm"  href="{{ route('professor.editar',$registro->id) }}">Editar</a>
                                            <a class="btn btn-danger btn-sm"  href="{{ route('professor.deletar',$registro->id) }}">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('professor.adicionar') }}">Adicionar professor</a>
                </div>
            </div>
        </section>
    </div>
@endsection