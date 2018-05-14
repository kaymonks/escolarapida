@extends('layout.site')

@section('titulo', 'Criar Evento')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title">Novo Evento</h2>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal" action="{{ route('evento.responsavel.enviar') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('evento.responsavel._form')
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Salvar</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box-primary -->
                </div>
            </div>
        </section>
    </div>
@endsection