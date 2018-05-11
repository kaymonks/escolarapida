@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <legend>Dados pessoais</legend>
    <div class="form-group">
        <label for="inputNome" class="col-sm-4 control-label">Nome</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : old('nome')}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputDataNascimento" class="col-sm-4 control-label">Data de Nascimento</label>
        <div class="col-sm-4 col-md-2">
            <input type="text" name="data_nascimento" placeholder="Data de Nascimento" class="form-control" id="date" value="{{isset($registro->data_nascimento) ? $registro->data_nascimento : old('data_nascimento')}}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputTelefone" class="col-sm-4 control-label">Telefone</label>
        <div class="col-sm-4 col-md-3 col-lg-2">
            <input type="text" name="telefone" placeholder="Telefone" class="form-control" id="inputTelefone" value="{{isset($telefone->telefone) ? $telefone->telefone : old('telefone')}}">
            <input type="hidden" name="telefone_id" value="{{ isset($registro->telefone) ? $registro->telefone_id : old('telefone_id') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Sexo</label>
        <div class="col-sm-2">
            <div class="radio">
                <label>
                    <input type="radio" name="sexo" id="sexoRadio" value="m" @if(isset($registro) and ($registro->sexo == 'm')) checked @else {{ old('sexo') == "m" ? 'checked' : '' }} @endif>Masculino
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="sexo" id="sexoRadio2" value="f" @if(isset($registro) and $registro->sexo == 'f') checked @else {{ old('sexo')=="f" ? 'checked' : '' }} @endif>Feminino
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-5">
            <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" value="{{ isset($registro->email) ? $registro->email : old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEndereco" class="col-sm-4 control-label">Endereço</label>
        <div class="col-sm-5">
            <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : old('endereco') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputCEP" class="col-sm-4 control-label">CEP</label>
        <div class="col-sm-3 col-md-2">
            <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : old('cep') }}">
        </div>
    </div>
</div>

<hr>

<div class="col-md-12">
    <fieldset>
        <legend>Login</legend>
        <div class="row">
            <div class="form-group">
                <label for="inputLogin" class="col-sm-4 control-label">Login</label>
                <div class="col-sm-4 col-md-3">
                    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Login" value="{{isset($registro->login) ? $registro->login : old('login') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSenha" class="col-sm-4 control-label">Senha</label>
                <div class="col-sm-4 col-md-3">
                    <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha">
                </div>
            </div>
        </div>
    </fieldset>
</div>