@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>Olá Escola</h3>
            <h2>Editar Professor</h2>
            <form method="post" action="{{ route('professor.atualizar', $registro->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('professor._form')
                <button>Atualizar</button>
            </form>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>
@endsection
