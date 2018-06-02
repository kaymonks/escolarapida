@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <legend>Dados Gerais</legend>
    <div class="form-group">
        <label for="inputNome" class="col-sm-4 control-label">Unidade</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="nome" id="inputNome" class="form-control" placeholder="Unidade" value="{{isset($registro->nome) ? $registro->nome : old('nome')}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputDiretor" class="col-sm-4 control-label">Diretor</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="diretor" id="inputDiretor" class="form-control" placeholder="Diretor" value="{{isset($registro->diretor) ? $registro->diretor : ''}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputTelefone" class="col-sm-4 control-label">Telefone</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="telefone" id="inputTelefone" class="form-control" placeholder="Telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-8 col-md-5">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" value="{{isset($registro->email) ? $registro->email : ''}}">
        </div>
    </div>
</div>
<hr>
<div class="col-md-12">
    <legend>Endereço</legend>
    <div class="form-group">
        <label for="inputEndereco" class="col-sm-4 control-label">Endereço</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputCEP" class="col-sm-4 control-label">CEP</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputNumero" class="col-sm-4 control-label">Número</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="numero" id="inputNumero" class="form-control" placeholder="Numero" value="{{ isset($registro->numero) ? $registro->numero : '' }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEstado" class="col-sm-4 control-label">Estado</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputCidade" class="col-sm-4 control-label">Cidade</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="{{ isset($registro->cidade) ? $registro->cidade : '' }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputBairro" class="col-sm-4 control-label">Bairo</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="{{ isset($registro->bairro) ? $registro->bairro : '' }}">
        </div>
    </div>
</div>
<hr>
<div class="col-md-12">
    <legend>Login</legend>
    <div class="form-group">
        <label for="inputLogin" class="col-sm-4 control-label">Login</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" name="login" id="inputLogin" class="form-control" placeholder="login" value="{{isset($registro->login) ? $registro->login : ''}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputSenha" class="col-sm-4 control-label">Senha</label>
        <div class="col-sm-8 col-md-5">
            <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha">
        </div>
    </div>
</div>
