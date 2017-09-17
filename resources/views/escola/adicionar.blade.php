@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>Olá Super Admin</h3>
            <h2>Adicionar Escola</h2>
            <form method="post" action="{{ route('escola.salvar') }}">
                {{ csrf_field() }}
                @include('escola._form')
                <button>Salvar</button>
            </form>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>
@endsection
