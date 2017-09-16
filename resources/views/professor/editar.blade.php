@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <h3>Olá Escola</h3>
    <h2>Editar Professor</h2>
    <form method="post" action="{{ route('professor.atualizar', $registro->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('professor._form')
        <button>Atualizar</button>
    </form>

@endsection
