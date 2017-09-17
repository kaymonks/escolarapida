@extends('layout.site')

@section('titulo', 'Adicionar Escola')

@section('conteudo')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>Olá Super Admin</h3>
            <h2>Editar Escola</h2>
            <form method="post" action="{{ route('escola.atualizar', $registro->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('escola._form')
                <button>Atualizar</button>
            </form>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
    </div>
@endsection
