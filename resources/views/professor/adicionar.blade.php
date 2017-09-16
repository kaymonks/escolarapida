@extends('layout.site')

@section('titulo', 'Adicionar Professor')

@section('conteudo')
    <h3>Olá Escola</h3>
    <h2>Adicionar Professor</h2>
    <form method="post" action="{{ route('professor.salvar') }}">
        {{ csrf_field() }}
        @include('professor._form')
        <button>Salvar</button>
    </form>
@endsection
