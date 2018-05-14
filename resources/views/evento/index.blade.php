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
                            <table class="table table-hover table-bordered" id="datatablesOrderByCad">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Título</th>
                                    <th style="width: 100px">Data</th>
                                    <th style="width: 100px">Horário</th>
                                    <th style="width: 121px">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($registros as $registro)
                                    <tr>
                                        <td>{{$registro->id}}</td>
                                        <td>{{ $registro->titulo }}</td>
                                        <td>{{date( 'd/m/Y' , strtotime($registro->date ) )}}</td>
                                        <td>{{$registro->time}}</td>
                                        <td>
                                            <a title="Visualizar" class="btn btn-primary btn-sm"  href="{{ route('evento.visualizar',$registro->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @if($tipo_usuario == 2)
                                                <a title="Editar" class="btn btn-primary btn-sm"  href="{{ route('evento.editar',$registro->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a title="Excluir" class="btn btn-danger btn-sm excluirRegistro"  href="{{ route('evento.deletar',$registro->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" align="center">
                            {{--{{ $registros->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection