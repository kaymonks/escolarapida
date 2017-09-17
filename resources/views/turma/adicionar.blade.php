@extends('layout.site')

@section('titulo', 'Adicionar Turma')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>Olá Escola</h3>
            <h2>Adicionar Turma</h2>
            <form method="post" action="{{ route('turma.salvar') }}">
                {{ csrf_field() }}
                @include('turma._form')
                <button>Salvar</button>
            </form>
            @foreach($registros as $registro)
                {{ $registro->nome }}
                {{ $registro->id }}
            @endforeach
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>

@endsection
