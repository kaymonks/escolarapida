@extends('layout.site')

@section('titulo', 'Listar Professor')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <h3>Listar Professor</h3>

            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Professor</th>
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
                            <a href="{{ route('professor.editar',$registro->id) }}">Editar</a>
                            <a href="{{ route('professor.deletar',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('professor.adicionar') }}">Adicionar professor</a>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>

@endsection