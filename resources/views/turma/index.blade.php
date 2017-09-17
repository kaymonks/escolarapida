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
            <h3>Listar Turma</h3>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Turma</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{$registro->id}}</td>
                            <td>{{ $registro->ano }}</td>
                            <td>
                                <a href="{{ route('turma.editar',$registro->id) }}">Editar</a>
                                <a href="{{ route('turma.deletar',$registro->id) }}">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('turma.adicionar') }}">Adicionar turma</a>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>
@endsection
