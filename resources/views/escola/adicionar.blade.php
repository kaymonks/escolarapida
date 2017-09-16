@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <h3>Olá Super Admin</h3>
    <h2>Adicionar Escola</h2>
    <form method="post" action="{{ route('escola.salvar') }}">
        {{ csrf_field() }}
        @include('escola._form')
        <button>Salvar</button>
    </form>

@endsection
