@extends('layout.site')

@section('titulo', 'Alunos')

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
                        <div class="box-header with-border"><h3 class="box-title">Lista de Alunos com responsáveis</h3></div>
                        <div class="box-body">
                            <table class="table table-hover table-bordered table-aluno">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Alunos</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ?>
                                @foreach($dados as $registro)
                                    <tr data-toggle="collapse" data-target="#accordion{{$i}}" class="clickable" role="button">
                                        <td>{{$registro->id}}</td>
                                        <td>{{ $registro->nome }}</td>
                                    </tr>
                                    <tr id="accordion{{$i}}" class="collapse">
                                        <td></td><td>
                                        @foreach($registro->responsaveiss as $nome)

                                             {{ $nome->nome}}<br>
                                        @endforeach
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
