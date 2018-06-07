@extends('layout.site')

@section('titulo', 'Listar Turmas')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 455px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Turmas
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Turmas</li>
            </ol>
        </section>
        <section class="content">
            @if(session('success'))
                <div class="alert bg-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border"><h3 class="box-title">Lista de Turmas</h3></div>
                        <div class="box-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Turma</th>

                                        <th style="width: 52px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turmas as $registro)
                                        <tr>
                                            <td>{{$registro->id}}</td>
                                            <td>{{ $registro->ano }}</td>
                                            <td>
                                                <a title="Alunos" class="btn btn-primary btn-sm" href="{{ route('turma.alunos', $registro->id) }}"><i class="fa fa-users" aria-hidden="true"></i></a>
                                            @if ($turmas->permission_id == 2)
                                                    <a title="Editar" class="btn btn-primary btn-sm" href="{{ route('turma.editar',$registro->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a title="Excluir" class="btn btn-danger excluirRegistro btn-sm"  href="{{ route('turma.deletar',$registro->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" align="center">
                            {{ $turmas->links() }}
                        </div>
                    </div>
                    @if ($turmas->permission_id == 2)
                        <a class="btn btn-success" href="{{ route('turma.adicionar') }}"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar turma</a>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
