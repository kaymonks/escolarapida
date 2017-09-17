@extends('layout.site')

@section('titulo', 'Adicionar Professor')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>Olá Escola</h3>
            <h2>Adicionar Professor</h2>
            <form method="post" action="{{ route('professor.salvar') }}">
                {{ csrf_field() }}
                @include('professor._form')
                <button>Salvar</button>
            </form>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>

@endsection
