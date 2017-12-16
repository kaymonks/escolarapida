@extends('layout.site')

@section('titulo', 'Visualizar Evento')

@section('conteudo')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Eventos</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('eventos') }}"> Eventos</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="">{{ $eventos->titulo }}</h2>
                        </div>
                        <div class="box-body">
                            @if (@isset ($escolas))
                                <div class="form-group">
                                    <label>Escola</label>
                                    <select class="form-control"  name="destinatario" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($escolas as $escola)
                                            <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
                                        @endforeach
                                    </select>
                                    @endisset
                                    {{-- expr --}}
                                </div>
                            @endif

                            <div>
                                <h4>Data: {{ $eventos->date }}</h4>
                            </div>
                            <div>
                                <h4>Hora: {{ $eventos->time }}</h4>
                            </div>
                            <hr>
                            <div>
                                <p>{{ $eventos->descricao }}</p>
                            </div>
                            {{--<hr>--}}
                                {{--<a href="" class="btn btn-primary">Confirmar presença</a>--}}
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
