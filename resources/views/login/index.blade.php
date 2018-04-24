@extends('layout.login')

@section('titulo', 'Escola Rápida - Login')
@section('login', 'login-page')

@section('conteudo')

    <div class="login-box">
        <div class="login-logo">
            <img style="" src="{{ asset("/images/logo2.jpg") }}" alt="Escola Rápida">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body box box-solid box-default">

            <form role="form" method="post" action="{{ route('login.entrar') }}">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group {{ ($errors->first('login')) ? 'has-error'  :''}}">
                        <label for="inputLogin">Login</label>
                        <input type="text" id="inputLogin" class="form-control" placeholder="Login" name="login">
                        {!! $errors->first('login', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ ($errors->first('senha')) ? 'has-error'  :''}}">
                        <label for="inputSenha">Senha</label>
                        <input type="password" id="inputSenha" class="form-control" placeholder="Senha" name="senha">
                        {!! $errors->first('senha', '<span class="help-block">:message</span>') !!}
                    </div>

                    {{--<div class="checkbox"><label><input type="checkbox"> Lermbrar-me</label>--}}
                    {{--</div>--}}

                </div>
                <div class="box-footer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
