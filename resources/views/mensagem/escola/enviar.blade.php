@extends('layout.site')
@section('titulo', 'Enviar mensagem')
@section('conteudo')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title">Nova mensagem</h2>
                        </div>
                        <form class="form-horizontal" action="{{ route('mensagem.escola.enviar') }}" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                @include('mensagem.escola._form')
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <a href="{{ route('mensagens') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Enviar</button>
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