@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <h3>Olá Super Admin</h3>
    <h2>Editar Escola</h2>
    <form method="post" action="{{ route('escola.atualizar', $registro->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('escola._form')
        <button>Atualizar</button>
    </form>

@endsection
