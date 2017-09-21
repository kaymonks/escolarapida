@extends('layout.site')

@section('titulo', 'Listar Pais')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Pais
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pais</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"><h3 class="box-title">Listar Pais</h3></div>
                        <div class="box-body table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">Id</th>
                                        <th>Pai</th>
                                        <th style="width: 150px">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registros as $registro)
                                        <tr>
                                            <td>{{$registro->id}}</td>
                                            <td>{{ $registro->nome }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="{{ route('pai.editar',$registro->id) }}">Editar</a>
                                                <a class="btn btn-danger btn-sm" href="{{ route('pai.deletar',$registro->id) }}">Deletar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('pai.adicionar') }}">Adicionar pai</a>
                </div>
            </div>
        </section>
    </div>
@endsection
