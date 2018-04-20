@extends('layout.login')

@section('titulo', 'Escola Rápida - Login')
@section('login', 'login-page')

@section('conteudo')

    <div class="login-box">
        <div class="login-logo">
            <a href="">Escola<b>Rápida</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Entre para iniciar sua sessão</p>

            <form role="form" method="post" action="{{ route('login.entrar') }}">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group {{ ($errors->first('email')) ? 'has-error'  :''}}">
                        <label for="inputEmail1">Login</label>
                        <input type="text" id="inputEmail1" class="form-control" placeholder="Email" name="email">
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
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
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
