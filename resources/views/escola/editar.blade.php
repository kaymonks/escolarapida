@extends('layout.site')

@section('titulo', 'Editar Escola')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Escolas</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('escolas') }}"> Escolas</a></li>
                <li class="active">Editar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title">Editar Escola</h2>
                        </div>
                        <form method="post" action="{{ route('escola.atualizar', $registro->id) }}" enctype="multipart/form-data">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                @include('escola._form')
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o "></i> Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
