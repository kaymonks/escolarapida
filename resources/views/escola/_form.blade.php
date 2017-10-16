<fieldset>
    <legend>Dados Gerais</legend>
    {{--<div class="col-md8 col-md-offset-2">--}}
        <div class="form-group">
            <label for="inputNome">Unidade</label>
            <input type="text" name="nome" id="inputNome" class="form-control" placeholder="Unidade" value="{{isset($registro->nome) ? $registro->nome : ''}}">
        </div>
        <div class="form-group">
            <label for="inputTelefone">Telefone</label>
            <input type="text" name="telefone" id="inputTelefone" class="form-control" placeholder="Telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" value="{{isset($registro->email) ? $registro->email : ''}}">
        </div>
        <div class="form-group">
            <label for="inputDiretor">Diretor</label>
            <input type="text" name="diretor" id="inputDiretor" class="form-control" placeholder="Diretor" value="{{isset($registro->diretor) ? $registro->diretor : ''}}">
        </div>
    {{--</div>--}}
</fieldset>
<fieldset>
    <legend>Endereço</legend>
    <div class="form-group">
        <label for="inputEndereco">Endereço</label>
        <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
    </div>
    <div class="form-group">
        <label for="inputCEP">CEP</label>
        <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
    </div>
    <div class="form-group">
        <label for="inputNumero">Número</label>
        <input type="text" name="numero" id="inputNumero" class="form-control" placeholder="Numero" value="{{ isset($registro->numero) ? $registro->numero : '' }}">
    </div>
    <div class="form-group">
        <label for="inputBairro">Bairo</label>
        <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="{{ isset($registro->bairro) ? $registro->bairro : '' }}">
    </div>
    <div class="form-group">
        <label for="inputEstado">Estado</label>
        <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
    </div>
    <div class="form-group">
        <label for="inputCidade">Cidade</label>
        <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="{{ isset($registro->cidade) ? $registro->cidade : '' }}">
    </div>
</fieldset>
{{--<div class="form-group">--}}
    {{--<label for="inputLogin">Login</label>--}}
    {{--<input type="text" name="login" id="inputLogin" class="form-control" placeholder="login" value="{{isset($registro->login) ? $registro->login : ''}}">--}}
{{--</div>--}}
{{--<div class="form-group">--}}
    {{--<label for="inputSenha">Senha</label>--}}
    {{--<input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha" value="{{isset($registro->senha) ? $registro->senha : ''}}">--}}
{{--</div>--}}
