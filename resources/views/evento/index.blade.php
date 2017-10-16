@extends('layout.site')

@section('titulo', 'Listar Eventos')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Eventos
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Eventos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border"><h3 class="box-title">Listar Eventos</h3></div>
                        <div class="box-body table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Título</th>
                                    <th>Data</th>
                                    <th>Horário</th>
                                    <th style="width: 150px">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eventos as $evento)
                                    <tr>
                                        <td>{{$evento->id}}</td>
                                        <td>{{ $evento->titulo }}</td>
                                        <td>{{date( 'd/m/Y' , strtotime($evento->date ) )}}</td>
                                        <td>{{$evento->time}}</td>
                                        <td>
                                            <a title="Editar" class="btn btn-primary btn-sm"  href="{{ route('evento.editar',$evento->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection