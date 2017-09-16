@extends('layout.site')

@section('titulo', 'Listar Escola')

@section('conteudo')
    <h3>Listar Escola</h3>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Escola</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{ $registro->nome }}</td>
                    <td>{{$registro->telefone}}</td>
                    <td>
                        <a href="{{ route('escola.editar',$registro->id) }}">Editar</a>
                        <a href="{{ route('escola.deletar',$registro->id) }}">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
