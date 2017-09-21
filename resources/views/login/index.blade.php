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

            <form method="post" action="{{ route('login.entrar') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Lermbrar-me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
